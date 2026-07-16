# Migration vers filtrage client-side — km50.fr

> [!CAUTION]
> Plan corrigé (v4) — Q1 SEO fermée : **migration totale 100% JS confirmée.** Le sitemap ne contient aucune URL `/voyages/categorie/*`, le site est neuf, zéro trafic SEO à protéger sur ces URLs. Pas de stratégie hybride.

## Analyse comparative : The Event House vs km50

### Ce que fait The Event House réellement

**Ce n'est PAS du filtrage JS sur les news Contao.** C'est un module sur-mesure (`mod_prestation_list` en Twig, bundle `bioweb-bundle`) qui :

1. **Charge toutes les prestations en PHP** dans le template, les rend en HTML avec des classes CSS comme `cat-decoration-evenementielle` et `tag-mariage`
2. **Utilise Isotope.js** (`data-isotope-grid`) pour le layout masonry et le filtrage côté client
3. **Écrit l'état des filtres dans l'URL** via `URLSearchParams` + `history.pushState` → forme `?categorie=decoration-evenementielle` (query string, **pas** de path)
4. **Relit l'URL au chargement** via `loadFiltersFromUrl()` pour restaurer l'état
5. **N'utilise pas du tout** `codefog/contao-news_categories` pour le filtrage — les catégories viennent d'une relation Doctrine/DB custom

**TEH ne gère pas les sous-catégories hiérarchiques.** Les categories sont plates, pas d'imbrication.

---

### Structure km50 — ce qui existe déjà

**Hiérarchie des catégories** (3 niveaux) :

```
Voyages (id:12)
├── Organisateurs (id:2)  ← pid=12
│   ├── KM50 (id:35)
│   ├── Harley-Davidson Grand Lyon (id:5)
│   ├── Honda Lyon (id:4)
│   └── ... (8 organisateurs)
├── Régions (id:3)  ← pid=12
│   ├── Les Canaries (id:45)
│   ├── Rhône-Alpes (id:42)
│   └── ... (13 régions)
├── Thématique (id:9)  ← pid=12
│   ├── Moto & nature (id:44)
│   └── ... (8 thématiques)
└── Expériences (id:37)  ← pid=12
    ├── Échappée (id:38)
    ├── Inédit (id:39)
    └── Road trip (id:40)
```

**Données déjà disponibles dans les templates** :
- `news_voyages.html5` reçoit `$this->categories` (tableau avec `id`, `pid`, `alias`, `title`)
- Les catégories sont triées par `pid` (2=Organisateurs, 3=Régions, 9=Thématique, 37=Expériences)
- Les liens actuels hardcodent `/voyages/categorie/<alias>`

**Ce qui n'existe pas encore** :
- Aucun `data-categories` ou `data-filter` sur les cartes voyages → pas de hook JS pour Isotope
- Pas d'Isotope ni de JS de filtrage client-side

---

## Q4 — SEO : la décision qui tranche tout

### Analyse de la situation actuelle

Les URLs `/voyages/categorie/<alias>` sont **mono-catégorie** et peuvent être indexées. La question est : ont-elles du trafic réel ?

> [!IMPORTANT]
> **À vérifier en Search Console avant de trancher** :
> 1. Ouvrir Search Console → Performances → Filtrer par URL contenant `/voyages/categorie/`
> 2. Combien d'URLs ont des impressions > 0 sur les 3 derniers mois ?
> 3. Combien ont des clics > 0 ?
> 4. Quelles sont les requêtes qui amènent du trafic sur ces URLs ?
>
> Si réponse = 0 clics sur toutes les URLs `/voyages/categorie/*` → migration totale en JS + redirections 301 sans risque SEO.
> Si réponse = trafic réel sur certaines URLs → stratégie hybride (voir ci-dessous).

### Recommandation : **migration totale 100% JS**

**Q1 fermée.** Le sitemap (`https://www.km50.fr/sitemap.xml`) ne contient que :
- `/`, `/a-propos`, `/voyages`, `/contact`
- Les pages individuelles `/voyage/<alias>` (21 voyages)

**Aucune URL `/voyages/categorie/*` n'est indexée, ni dans le sitemap ni en Search Console** (site neuf). Zéro risque SEO. La stratégie hybride (server-side pour mono-catégorie + JS pour multi) est inutile et ajoute de la complexité sans bénéfice.

**Architecture cible simplifiée :**
- `/voyages` → page unique, 41 voyages chargés, filtrage 100% JS via query string
- `/voyages?organisateur=km50&region=normandie` → état filtre JS, `canonical` → `/voyages`, `noindex`
- `/voyages/categorie/<alias>` → **plus généré** (module désactivé) → 410 Gone via nginx
- `__` multi-catégories → 410 Gone via nginx (déjà en place, à upgrader)

---

## Plan de migration fichier par fichier

### Étape 1 — Ajouter `data-categories` sur chaque carte voyage

#### [MODIFY] [news_voyages.html5](file:///home/forge/km50.fr/templates/client/news_voyages.html5)

Remplacer le bloc PHP d'initialisation (lignes 1-30) pour construire un attribut `data-categories` utilisé par le filtre JS :

> [!CAUTION]
> **Bug corrigé** : Le plan précédent déclarait `$organisateur = null;` (variable locale) mais assignait `$GLOBALS['organisateur'] = $link;`. Le template lisait ensuite la variable locale, toujours vide. De plus, `$GLOBALS` persistant entre les cartes d'un même rendu de liste causait une fuite de données entre items. Correction : variables locales uniquement, sans `$GLOBALS`.

```php
<?php
// Variables locales — pas de $GLOBALS, pas de fuite entre cartes
$catClasses   = [];
$organisateur = null;
$region       = null;
$thematique   = null;
$experience   = null;

if ($this->categories && is_array($this->categories)) {
    foreach ($this->categories as $category) {
        $pid   = (int)$category['pid'];
        $title = htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8');
        $alias = htmlspecialchars($category['alias'], ENT_QUOTES, 'UTF-8');
        $id    = (int)$category['id'];

        // Classe CSS pour le filtre JS
        $catClasses[] = 'cat-' . $alias;

        // Lien affiché dans la carte (lecture en template avec $organisateur, $region, etc.)
        $link = '<a href="/voyages/categorie/' . $alias . '" class="category-' . $id . '">' . $title . '</a>';

        if ($pid === 2)       { $organisateur = $link; }
        elseif ($pid === 3)  { $region       = $link; }
        elseif ($pid === 9)  { $thematique   = $link; }
        elseif ($pid === 37) { $experience   = $link; }
    }
}
$dataCatAttr = htmlspecialchars(implode(' ', $catClasses), ENT_QUOTES, 'UTF-8');
?>
```

Puis sur la div wrapper, ajouter l'attribut :
```html
<div class="voyages-master block<?= $this->class ?>" data-categories="<?= $dataCatAttr ?>">
```

---

### Étape 2 — Créer le module de filtre JS (nouveau fichier)

#### [NEW] `files/client/js/voyage-filter.js`

Vanilla JS pur, pas de dépendance Isotope (41 items = show/hide CSS suffit, pas besoin de masonry).

```javascript
/**
 * Voyage client-side filter — km50.fr
 * Lit ?organisateur=alias&region=alias&thematique=alias depuis l'URL
 * Met à jour l'URL via history.replaceState (query string, pas de path)
 * Zéro requête SQL par combinaison
 */
(function () {
    'use strict';

    var FILTER_GROUPS = ['organisateur', 'region', 'thematique', 'experience'];
    var activeFilters = {};
    FILTER_GROUPS.forEach(function (g) { activeFilters[g] = null; });

    // --- Lecture de l'URL initiale ---
    function loadFromUrl() {
        var params = new URLSearchParams(window.location.search);
        FILTER_GROUPS.forEach(function (g) {
            var val = params.get(g);
            activeFilters[g] = val || null;
        });
    }

    // --- Mise à jour de l'URL ---
    function updateUrl() {
        var params = new URLSearchParams();
        FILTER_GROUPS.forEach(function (g) {
            if (activeFilters[g]) params.set(g, activeFilters[g]);
        });
        var qs = params.toString();
        var newUrl = window.location.pathname + (qs ? '?' + qs : '');
        history.replaceState(null, '', newUrl);
    }

    // --- Application du filtre ---
    function applyFilters() {
        var cards = document.querySelectorAll('.voyages-master');
        var count = 0;

        cards.forEach(function (card) {
            var cats = (card.getAttribute('data-categories') || '').split(' ');
            var visible = FILTER_GROUPS.every(function (g) {
                if (!activeFilters[g]) return true; // pas de filtre sur ce groupe
                return cats.indexOf('cat-' + activeFilters[g]) !== -1;
            });
            card.style.display = visible ? '' : 'none';
            if (visible) count++;
        });

        // Affichage du compteur
        var counter = document.getElementById('voyage-count');
        if (counter) counter.textContent = count;
        
        // Message "aucun résultat"
        var noResult = document.getElementById('voyage-no-results');
        if (noResult) noResult.style.display = (count === 0) ? '' : 'none';
    }

    // --- Mise à jour du DOM des boutons ---
    function updateButtons() {
        document.querySelectorAll('[data-filter-group][data-filter-value]').forEach(function (btn) {
            var group = btn.getAttribute('data-filter-group');
            var value = btn.getAttribute('data-filter-value');
            btn.classList.toggle('active', activeFilters[group] === value);
        });
        document.querySelectorAll('[data-filter-reset]').forEach(function (btn) {
            var group = btn.getAttribute('data-filter-reset');
            btn.classList.toggle('active', !activeFilters[group]);
        });
    }

    // --- Clic sur un bouton de filtre ---
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-filter-group][data-filter-value]');
        if (btn) {
            var group = btn.getAttribute('data-filter-group');
            var value = btn.getAttribute('data-filter-value');
            // Toggle : re-clic sur actif = reset ce groupe
            activeFilters[group] = (activeFilters[group] === value) ? null : value;
            updateUrl();
            updateButtons();
            applyFilters();
            return;
        }
        var reset = e.target.closest('[data-filter-reset]');
        if (reset) {
            var group = reset.getAttribute('data-filter-reset');
            if (group === 'all') {
                FILTER_GROUPS.forEach(function (g) { activeFilters[g] = null; });
            } else {
                activeFilters[group] = null;
            }
            updateUrl();
            updateButtons();
            applyFilters();
        }
    });

    // --- Init ---
    loadFromUrl();
    updateButtons();
    applyFilters();
})();
```

---

### Étape 3 — Créer le template de filtre Contao

Au lieu du module `newscategories_cumulativehierarchical`, on utilise un **RSCE custom** ou un **article Contao** qui génère les boutons de filtre par groupe.

#### [NEW] `templates/client/rsce_km50_voyage_filter.html5`

```html
<?php
// Groupes de catégories et leurs pids
$groups = [
    'organisateur' => ['label' => 'Organisateur', 'pid' => 2],
    'region'       => ['label' => 'Région',       'pid' => 3],
    'thematique'   => ['label' => 'Thématique',   'pid' => 9],
    'experience'   => ['label' => 'Expérience',   'pid' => 37],
];

// Récupérer toutes les catégories publiées (on les a déjà chargées côté PHP)
// Passer les catégories depuis le contexte Contao via un hook ou RSCE
$allCategories = $this->categories ?? [];
$byGroup = [];
foreach ($allCategories as $cat) {
    foreach ($groups as $key => $group) {
        if ((int)$cat['pid'] === $group['pid']) {
            $byGroup[$key][] = $cat;
        }
    }
}
?>
<div class="voyage-filters" id="voyage-filters">
    <button class="filter-reset-all" data-filter-reset="all">Tous les voyages</button>
    
    <?php foreach ($groups as $key => $group): ?>
        <?php if (!empty($byGroup[$key])): ?>
        <div class="filter-group" data-group="<?= $key ?>">
            <span class="filter-group-label"><?= $group['label'] ?></span>
            <div class="filter-group-buttons">
                <button data-filter-reset="<?= $key ?>" class="active">Tous</button>
                <?php foreach ($byGroup[$key] as $cat): ?>
                    <button 
                        data-filter-group="<?= $key ?>" 
                        data-filter-value="<?= htmlspecialchars($cat['alias'], ENT_QUOTES) ?>"
                    >
                        <?= htmlspecialchars($cat['title'], ENT_QUOTES) ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <div class="filter-results">
        <span id="voyage-count"><?= count($this->allCards ?? []) ?></span> voyage(s)
    </div>
</div>
<div id="voyage-no-results" style="display:none">Aucun voyage ne correspond à vos critères.</div>
```

> [!IMPORTANT]
> Ce template RSCE a besoin des catégories injectées. Deux options :
> **A)** Conserver le module `newscategories_cumulativehierarchical` uniquement pour fournir les catégories à un template qui génère les boutons (pas de liens server-side, juste la liste des catégories avec leurs aliases)
> **B)** Créer un `EventListener` Contao qui injecte les catégories dans le template via `$GLOBALS`
>
> **Option A est la moins invasive** — elle réutilise l'infrastructure existante, mais retire toute la logique de génération d'URL du template.

---

### Étape 4 — Modifier le module Contao existant

**Option : conserver `CustomCumulativeFilterModule`** mais lui faire générer des boutons `data-filter-group` au lieu de liens `/voyages/categorie/__alias`.

#### [MODIFY] [nav_newscategories_hierarchical.html5](file:///home/forge/km50.fr/templates/client/nav_newscategories_hierarchical.html5)

Remplacer les `<span class="js-cat-link" data-href="...">` par des `<button data-filter-group="..." data-filter-value="...">` :

```html
<?php
// Déterminer le groupe (organisateur / region / thematique / experience) à partir du pid
$pidToGroup = [2 => 'organisateur', 3 => 'region', 9 => 'thematique', 37 => 'experience'];
$group = $pidToGroup[$item['pid'] ?? 0] ?? 'other';
?>
<button 
    class="<?= $item['class'] ?> <?= $hideInList ?>"
    data-filter-group="<?= $group ?>"
    data-filter-value="<?= htmlspecialchars($item['alias'] ?? '', ENT_QUOTES) ?>"
    <?php if ($item['subitems']): ?> aria-haspopup="true"<?php endif; ?>
>
    <span class="name" itemprop="name"><?= $item['link'] ?></span>
    <?php if ($this->showQuantity): ?>
        <span class="quantity"><?= $item['quantity'] ?></span>
    <?php endif; ?>
</button>
```

> [!NOTE]
> Le `pid` n'est pas exposé par défaut dans `$item`. Il faudra l'ajouter dans `generateItem()` du bundle — soit via un patch, soit via un `EventListener` sur `TemplateListener`.
> **Alternative plus simple** : injecter les groupes via le `alias` lui-même (les aliases de groupes sont uniques : `organisateur`, `région`, `thématique-univers`, `expériences`) en faisant un lookup côté JS.

---

### Étape 5 — Charger `voyage-filter.js`

#### [MODIFY] [fe_page.html5](file:///home/forge/km50.fr/templates/client/fe_page.html5)

Ou via le layout Contao (fichiers JS), ajouter uniquement sur la page voyages :

```php
<?php if ($this->pageId === 294): // ID de la page /voyages ?>
    <script src="/files/client/js/voyage-filter.js" defer></script>
<?php endif; ?>
```

Ou mieux, via `$GLOBALS['TL_JAVASCRIPT']` dans un template de page conditionnel.

---

## Q5 — Robots.txt et canonical

> [!CAUTION]
> **Deux bugs corrigés** dans le plan précédent :
> 1. Il proposait à la fois `Disallow: /voyages?` dans robots.txt ET `<meta name="robots" content="noindex">` sur les mêmes URLs. **Ces deux directives sont mutuellement exclusives.** Si robots.txt bloque le crawl, Google ne lit jamais le `noindex` — il peut indexer l'URL sans contenu. **Règle** : `Disallow` = Google ignore le contenu **mais peut quand même indexer l'URL** si elle est linkée. `noindex` = Google la visite mais ne l'indexe pas. Pour des pages qu'on veut non-indexées mais visitables, c'est `noindex` seul. Pour des pages que personne ne doit voir, c'est `Disallow` seul.
> 2. La ligne `Disallow: /voyages$` était active avec un commentaire « Non : on veut que /voyages soit indexée » — directive contradictoire avec son propre commentaire. Supprimée.
> 3. Le `Disallow` sur les query strings est de toute façon **inutile** : les `?organisateur=alias` sont générés par `history.replaceState` en JS. **Aucun lien HTML ne les expose.** Googlebot ne les découvrira jamais organiquement. On bloque une porte invisible.

### Config robots.txt correcte

Le robots.txt ne doit rien changer pour les query strings (invisibles au crawl). Il peut en revanche **exclure les anciennes URLs `__`** si elles ont été indexées :

```
User-agent: *
# Exclure les combinaisons multi-catégories (ancien format __ qui génère du spam)
Disallow: /voyages/categorie/*__
```

C'est tout. `/voyages` et `/voyages/categorie/<alias>` restent crawlables.

### Canonical dans `fe_page.html5` — uniquement pour les query strings

Dans [`fe_page.html5`](file:///home/forge/km50.fr/templates/client/fe_page.html5) :

```php
<?php
// Page voyages (id=294 confirmé)
$isVoyagesPage  = ((int)$this->pageId === 294);
$hasQueryFilter = !empty($_GET['organisateur']) || !empty($_GET['region'])
               || !empty($_GET['thematique'])  || !empty($_GET['experience']);
if ($isVoyagesPage && $hasQueryFilter):
?>
<link rel="canonical" href="<?= $this->base ?>voyages">
<meta name="robots" content="noindex, follow">
<?php endif; ?>
```

Pas de `Disallow` dans robots.txt pour ces URLs — elles ne seront jamais crawlées car générées uniquement par `history.replaceState`.

Pour `/voyages/categorie/<alias>`, une fois le module désactivé, toutes ces URLs retourneront **410 Gone via nginx** (voir section suivante) — pas besoin de canonical, le 410 suffit.

---

## Stratégie complémentaire : 410 Gone pour les URLs `__` (botnet)

> [!IMPORTANT]
> **Point manquant dans les plans précédents.** Après la migration JS, plus aucun lien `__` ne sera généré dans le HTML. Mais le botnet a **déjà son index** de ces URLs. Il continuera de les taper pendant des mois, voire des années. La règle `limit_req zone=catcombo` nginx actuelle (ligne 20-24 de `site.conf`) continuera de les throttler — elle doit **rester en place**.
>
> En complément, retourner **410 Gone** sur les `__` signale explicitement à Google (et aux bots respectueux) que ces URLs n'existent plus et ne doivent plus être crawlées. Google déréférencera plus vite avec un 410 qu'avec un 404.

### Modification nginx — `site.conf` (deux blocs à fusionner)

Le bloc actuel (lignes 20-24) gère uniquement les `__`. Après la migration, `/voyages/categorie/*` en totalité doit retourner 410. Remplacer le bloc actuel par :

```nginx
# AVANT (actuel)
location ~* ^/voyages/categorie/[^/]*__ {
    limit_req zone=catcombo burst=15 nodelay;
    limit_req_status 429;
    try_files $uri /index.php$is_args$args;
}
```

Par :

```nginx
# APRÈS — 410 Gone sur TOUTES les URLs /voyages/categorie/* (module désactivé)
# Les __ restent gérées par rate-limit + 410 en priorité
location ~* ^/voyages/categorie/[^/]*__ {
    limit_req zone=catcombo burst=5 nodelay;
    limit_req_status 429;
    return 410;
}
# Toutes les autres URLs /voyages/categorie/* (mono-catégorie) — plus de module, 410
location ~* ^/voyages/categorie/ {
    return 410;
}
```

**Ordre important** : le bloc `__` doit être déclaré **avant** le bloc `/voyages/categorie/` pour que nginx matche d'abord la règle la plus spécifique (avec rate-limit) avant la générique.

**Pourquoi `return 410` avant `try_files`** : le `return` court-circuite PHP entièrement — pas de spawn FPM, pas de requête SQL, coût = quasi nul. Le botnet obtient sa réponse en microsecondes.

**Pourquoi garder `limit_req`** : le 410 est cheap mais un bot agressif peut quand même saturer les connexions nginx. Le rate limit est un filet de sécurité réseau, le 410 est la réponse sémantique correcte. Les deux sont complémentaires.

> [!NOTE]
> **site.conf géré par Laravel Forge ?** Le fichier `/etc/nginx/forge-conf/2942385/site.conf` a un commentaire `# Custom Nginx Template (19188)` — il est édité via le panel Forge ("Custom Nginx Configuration"). Les modifications doivent donc être faites **dans le panel Forge**, pas directement sur le fichier, pour éviter qu'un redeploy les écrase.

---

---

## État de `mod_newscategories_cumulative.html5` (Q5 fermée)

Le template [mod_newscategories_cumulative.html5](file:///home/forge/km50.fr/templates/client/mod_newscategories_cumulative.html5) **existe et est actif**. Il rend les `activeCategories` et `inactiveCategories` via les sous-templates `nav_newscategories.html5` — qui, eux, génèrent bien des liens `__` (via `js-cat-link` et base64 pour les liens inactifs, et un `<strong>` pour les actifs).

**Action requise** : ce module doit être désactivé dans le backend Contao, ou son template modifié simultanément à `nav_newscategories_hierarchical.html5`. **Sinon les `__` continuent d'être générés** depuis ce module en parallèle.

---

## Q2 — Différences structurelles km50 vs TEH

| | The Event House | km50.fr |
|---|---|---|
| **Module** | Bundle custom Bioweb (Twig) | `codefog/contao-news_categories` |
| **Filtrage** | Isotope.js (masonry layout) | À migrer vers vanilla JS show/hide |
| **Catégories** | Plates, pas de hiérarchie | 3 niveaux (groupes → sous-catégories) |
| **URL filter** | `?categorie=alias&type=alias` | Actuellement `/categorie/alias__alias2` |
| **URL cible** | `?categorie=alias&type=alias` | `?organisateur=alias&region=alias` |
| **Données** | Classes CSS `cat-alias tag-alias` | `data-categories="cat-alias cat-alias2"` |
| **codefog bundle** | Non utilisé pour le filtrage | Peut rester pour les pages mono-catégorie |

**La différence clé** : TEH a des catégories plates → un seul paramètre suffit. km50 a 4 groupes thématiques → 4 paramètres query string distincts, un par groupe.

---

## Q3 — Garde-t-on le bundle codefog ?

**Oui, pour les pages mono-catégorie server-side.** Le bundle continue de rendre `/voyages/categorie/<alias>` avec filtrage SQL proper (une seule catégorie à la fois = pas de N+1 pathologique).

**Non, pour le filtrage multi-critères.** On ne l'utilise plus pour générer les liens `__` combinatoires.

Le `limit_req` nginx peut être levé une fois que le template `nav_newscategories_hierarchical.html5` ne génère plus de liens `__`.

---

---

## Open Questions

> ~~**Q1 — Search Console**~~ : **Fermée.** Sitemap vérifié : aucune URL `/voyages/categorie/*`. Site neuf, zéro trafic SEO sur ces URLs. **Migration totale 100% JS confirmée.**

> ~~**Q2 — ID page voyages**~~ : **Fermée.** ID=**294** confirmé (`/voyages`). Page reader individuel = **306** (`/voyage/<alias>`). La logique conditional s'applique uniquement sur ID=294.

> [!NOTE]
> **Q3 — pid absent de `$item`** : Pour distinguer les groupes dans `nav_newscategories_hierarchical.html5`, il faut le `pid` de chaque catégorie dans `$item`. À vérifier avec `dump($item)` dans le template.

> [!NOTE]
> **Q4 — Isotope vs show/hide** : Avec 41 voyages et une grille CSS (pas masonry), vanilla JS `display:none` est suffisant.

> ~~**Q5 — mod_newscategories_cumulative actif ?**~~ : **Fermée.** Template actif, génère des liens `__`. Doit être désactivé dans le backend Contao ou modifié simultanément.
