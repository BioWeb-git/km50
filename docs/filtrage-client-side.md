# Migration vers filtrage client-side — km50.fr (v5)

> [!IMPORTANT]
> Plan v5 — réécriture complète. Les v3/v4 empilaient des patchs contradictoires.
> Quatre contradictions résolues avant exécution :
> 1. **nginx** : le 410 va dans `sites-enabled/km50.fr`, pas dans `site.conf`
> 2. **Cohérence 100% JS** : plus aucun lien `/voyages/categorie/*` généré nulle part
> 3. **robots.txt** : pas de `Disallow` — incompatible avec 410 (Google ne voit jamais le 410 si le crawl est bloqué)
> 4. **IDs confirmés** : Voyages=**294**, Actualités=**297** (crawlé par le bot par fallback), Reader=/voyage/*=**306**

---

## Contexte et décision

**Problème** : `codefog/contao-news_categories` génère des URLs `/voyages/categorie/a__b__c` par combinaison de filtres → espace de crawl 2^40, botnet actif, ~195 requêtes SQL par HTTP request.

**Solution** : filtrage 100% client-side. On charge les 41 voyages une fois, le JS filtre par show/hide. Zéro requête SQL par combinaison de filtres.

**SEO** : migration totale sans risque. Le sitemap ne contient aucune URL `/voyages/categorie/*`. Site neuf.

**Architecture cible** :
- `/voyages` (id=294) → page unique, 41 voyages, filtrage 100% JS via query string
- `?organisateur=km50&region=normandie` → état filtre JS, `canonical=/voyages`, `noindex`
- `/voyages/categorie/*` → **410 Gone** nginx (module Contao désactivé)
- `/voyages/categorie/*__*` → **410 Gone** nginx + rate-limit (botnet)

---

## Analyse du vhost nginx — où mettre le 410

Le fichier `sites-enabled/km50.fr` (généré par Forge) contient **déjà** deux `location` déclarées **avant** l'`include forge-conf/2942385/site.conf` :

```nginx
location ~* /categorie/[^/]*__ {
    limit_req zone=catcombo burst=15 nodelay;
    limit_req_status 429;
    try_files /share/$host${uri}index.html $uri /index.php$is_args$args;
}
location ~* /categorie/ {
    limit_req zone=categories_limit burst=5 nodelay;
    try_files /share/$host${uri}index.html $uri /index.php$is_args$args;
}
```

**Règle nginx** : pour les regex, la **première déclarée qui matche** gagne. Les locations dans `site.conf` (inclus après) ne sont **jamais consultées** pour ces URLs. C'est pourquoi les modifications précédentes dans `site.conf` ne mordaient pas.

> [!WARNING]
> `sites-enabled/km50.fr` est **généré par Forge** à chaque redeploy — modifications manuelles écrasées. `site.conf` lui est éditable via le panel Forge "Custom Nginx". Gérer le risque en notant la modification dans le panel Forge pour la réappliquer si besoin, ou via un include depuis `forge-conf/2942385/km50.fr/before/`.

---

## Étapes d'implémentation

### Étape 0 — nginx : 410 Gone dans `sites-enabled/km50.fr`

**À faire en premier**, avant tout changement PHP/template.

```nginx
# AVANT
location ~* /categorie/[^/]*__ {
    limit_req zone=catcombo burst=15 nodelay;
    limit_req_status 429;
    try_files /share/$host${uri}index.html $uri /index.php$is_args$args;
}
location ~* /categorie/ {
    limit_req zone=categories_limit burst=5 nodelay;
    try_files /share/$host${uri}index.html $uri /index.php$is_args$args;
}

# APRÈS
location ~* /categorie/[^/]*__ {
    # Botnet : rate-limit + 410 immédiat, PHP jamais appelé
    limit_req zone=catcombo burst=5 nodelay;
    limit_req_status 429;
    return 410;
}
location ~* /categorie/ {
    # Toutes les URLs /categorie/* : module désactivé → 410
    return 410;
}
```

`return 410` court-circuite PHP et FPM entièrement → coût quasi nul.
410 Gone = Google déréférence plus vite qu'un 404.
Le rate-limit reste sur `__` : filet de sécurité réseau.

**Pas de `Disallow` dans robots.txt** : si robots.txt bloque le crawl, Google ne voit jamais le 410 et ne déréférence pas. Le 410 seul suffit.

---

### Étape 1 — `news_voyages.html5` : `data-categories` + supprimer les liens `/categorie/*`

#### [MODIFY] [news_voyages.html5](file:///home/forge/km50.fr/templates/client/news_voyages.html5)

```php
<?php
// Variables locales uniquement — pas de $GLOBALS, pas de fuite entre cartes
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

        $catClasses[] = 'cat-' . $alias;

        // Texte brut sans <a> — /voyages/categorie/* retourne 410
        $label = '<span class="category-' . $id . '">' . $title . '</span>';

        if ($pid === 2)       { $organisateur = $label; }
        elseif ($pid === 3)  { $region       = $label; }
        elseif ($pid === 9)  { $thematique   = $label; }
        elseif ($pid === 37) { $experience   = $label; }
    }
}
$dataCatAttr = htmlspecialchars(implode(' ', $catClasses), ENT_QUOTES, 'UTF-8');
?>
```

Div wrapper :
```html
<div class="voyages-master block<?= $this->class ?>" data-categories="<?= $dataCatAttr ?>">
```

> [!CAUTION]
> Même remplacement `$link → $label` à faire dans [news_voyage_full.html5](file:///home/forge/km50.fr/templates/client/news_voyage_full.html5) (même pattern ligne 16).

---

### Étape 2 — Désactiver les modules `newscategories` dans le backend Contao

Désactiver ou supprimer de la mise en page :
- Module `mod_newscategories_cumulativehierarchical` (CustomCumulativeFilterModule)
- Module `mod_newscategories_cumulative` (template [mod_newscategories_cumulative.html5](file:///home/forge/km50.fr/templates/client/mod_newscategories_cumulative.html5) — actif, génère des liens `__`)

Ces modules seront remplacés par les boutons JS de l'Étape 3.

---

### Étape 3 — Boutons de filtre JS

Structure HTML cible (à injecter via article Contao ou template RSCE) :

```html
<div class="voyage-filters" id="voyage-filters">
    <button class="filter-reset-all" data-filter-reset="all">Tous les voyages</button>

    <div class="filter-group" data-group="organisateur">
        <span class="filter-group-label">Organisateur</span>
        <div class="filter-group-buttons">
            <button data-filter-reset="organisateur" class="active">Tous</button>
            <button data-filter-group="organisateur" data-filter-value="km50">KM50</button>
            <!-- ... -->
        </div>
    </div>

    <div class="filter-group" data-group="region">
        <span class="filter-group-label">Région</span>
        <div class="filter-group-buttons">
            <button data-filter-reset="region" class="active">Toutes</button>
            <button data-filter-group="region" data-filter-value="normandie">Normandie</button>
            <!-- ... -->
        </div>
    </div>

    <!-- idem thematique, experience -->

    <div class="filter-results">
        <span id="voyage-count">41</span> voyage(s)
    </div>
</div>
<div id="voyage-no-results" style="display:none">Aucun résultat.</div>
```

> [!NOTE]
> **Q3 — `$item['pid']` disponible ?** Si on génère les boutons depuis le module hiérarchique modifié, vérifier avec `dump($item)` dans `nav_newscategories_hierarchical.html5`. Si `pid` absent : lookup par alias (les aliases racines sont fixes : `organisateur`, `région`, `thématique-univers`, `expériences`).

---

### Étape 4 — [NEW] `files/client/js/voyage-filter.js`

```javascript
/**
 * Voyage client-side filter — km50.fr
 * Vanilla JS, zéro dépendance, zéro requête SQL par combinaison.
 */
(function () {
    'use strict';

    var GROUPS = ['organisateur', 'region', 'thematique', 'experience'];
    var activeFilters = {};
    GROUPS.forEach(function (g) { activeFilters[g] = null; });

    function loadFromUrl() {
        var params = new URLSearchParams(window.location.search);
        GROUPS.forEach(function (g) { activeFilters[g] = params.get(g) || null; });
    }

    function updateUrl() {
        var params = new URLSearchParams();
        GROUPS.forEach(function (g) { if (activeFilters[g]) params.set(g, activeFilters[g]); });
        var qs = params.toString();
        history.replaceState(null, '', window.location.pathname + (qs ? '?' + qs : ''));
    }

    function applyFilters() {
        var cards = document.querySelectorAll('.voyages-master');
        var count = 0;
        cards.forEach(function (card) {
            var cats = (card.getAttribute('data-categories') || '').split(' ');
            var visible = GROUPS.every(function (g) {
                if (!activeFilters[g]) return true;
                return cats.indexOf('cat-' + activeFilters[g]) !== -1;
            });
            card.style.display = visible ? '' : 'none';
            if (visible) count++;
        });
        var counter = document.getElementById('voyage-count');
        if (counter) counter.textContent = count;
        var noResult = document.getElementById('voyage-no-results');
        if (noResult) noResult.style.display = (count === 0) ? '' : 'none';
    }

    function updateButtons() {
        document.querySelectorAll('[data-filter-group][data-filter-value]').forEach(function (btn) {
            var g = btn.getAttribute('data-filter-group');
            var v = btn.getAttribute('data-filter-value');
            btn.classList.toggle('active', activeFilters[g] === v);
        });
        document.querySelectorAll('[data-filter-reset]').forEach(function (btn) {
            var g = btn.getAttribute('data-filter-reset');
            btn.classList.toggle('active', g === 'all'
                ? GROUPS.every(function (g2) { return !activeFilters[g2]; })
                : !activeFilters[g]
            );
        });
    }

    document.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-filter-group][data-filter-value]');
        if (btn) {
            var g = btn.getAttribute('data-filter-group');
            var v = btn.getAttribute('data-filter-value');
            activeFilters[g] = (activeFilters[g] === v) ? null : v;
            updateUrl(); updateButtons(); applyFilters();
            return;
        }
        var reset = e.target.closest('[data-filter-reset]');
        if (reset) {
            var g = reset.getAttribute('data-filter-reset');
            if (g === 'all') { GROUPS.forEach(function (g2) { activeFilters[g2] = null; }); }
            else { activeFilters[g] = null; }
            updateUrl(); updateButtons(); applyFilters();
        }
    });

    loadFromUrl();
    updateButtons();
    applyFilters();
})();
```

---

### Étape 5 — [MODIFY] `fe_page.html5` : canonical + chargement conditionnel JS

```php
<?php
// IDs confirmés : Voyages=294, Actualités=297 (≠), Reader /voyage/*=306
$isVoyagesPage  = ((int)$this->pageId === 294);
$hasQueryFilter = !empty($_GET['organisateur']) || !empty($_GET['region'])
               || !empty($_GET['thematique'])  || !empty($_GET['experience']);
?>
<?php if ($isVoyagesPage && $hasQueryFilter): ?>
<link rel="canonical" href="<?= $this->base ?>voyages">
<meta name="robots" content="noindex, follow">
<?php endif; ?>
<?php if ($isVoyagesPage): ?>
<script src="/files/client/js/voyage-filter.js" defer></script>
<?php endif; ?>
```

---

### Étape 6 — [MODIFY] `shared.js` : supprimer le listener `js-cat-link`

Supprimer les lignes 58–71 de [shared.js](file:///home/forge/km50.fr/files/client/js/shared.js) — plus aucun élément `.js-cat-link` ne sera généré après la migration.

---

## robots.txt — rien à changer

```
# Pas de Disallow sur /voyages/categorie/* :
# Ces URLs retournent 410 Gone via nginx.
# Google visite → voit le 410 → déréférence.
# Disallow bloquerait la visite → Google ne verrait jamais le 410 → pas de déréférencement.
```

---

## Récapitulatif des fichiers modifiés

| Fichier | Action | Priorité |
|---|---|---|
| `sites-enabled/km50.fr` (via Forge) | Étape 0 — 410 Gone nginx | **1er** |
| `templates/client/news_voyages.html5` | Étape 1 — data-categories, suppr. liens | 2 |
| `templates/client/news_voyage_full.html5` | Étape 1 — suppr. liens /categorie | 2 |
| Backend Contao — modules newscategories | Étape 2 — désactiver | 3 |
| `files/client/js/voyage-filter.js` | Étape 4 — nouveau fichier | 4 |
| `templates/client/fe_page.html5` | Étape 5 — canonical + JS conditionnel | 4 |
| `files/client/js/shared.js` | Étape 6 — suppr. listener js-cat-link | 5 |

---

## Open Questions

> ~~**Q1 — Search Console**~~ : Fermée. Aucune URL `/voyages/categorie/*` dans le sitemap.

> ~~**Q2 — IDs pages**~~ : Fermée. Voyages=**294**, Actualités=**297**, Reader=**306**.

> [!NOTE]
> **Q3 — `$item['pid']` dans le template de navigation ?** Vérifier avec `dump($item)`. Détermine la méthode de génération des boutons (Étape 3).

> ~~**Q4 — Isotope vs show/hide**~~ : 41 voyages → vanilla JS suffit.

> ~~**Q5 — mod_newscategories_cumulative actif**~~ : Actif, à désactiver (Étape 2).
