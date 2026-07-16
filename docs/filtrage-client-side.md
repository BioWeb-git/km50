# Migration vers filtrage client-side — km50.fr (v6)

> [!IMPORTANT]
> Plan v6 — cinq corrections du v5 :
> 1. **Regex nginx ancrée** : `^/voyages/categorie/` au lieu de `/categorie/` (non-ancrée = tue aussi les Actualités et autres archives)
> 2. **Ordre inversé** : templates + JS d'abord → 410 nginx en dernier (pas l'inverse)
> 3. **`forge-conf/before/` inutilisable** pour des `location` — hors bloc `server{}`, ignoré
> 4. **Q3 fermée** : `$item['pid']` disponible (`category->row()` expose toutes les colonnes de `tl_news_category`)
> 5. **Q3 bloquait aussi l'Étape 1** (pas seulement l'Étape 3) — précisé dans le plan

---

## Contexte

**Problème** : le bundle `codefog/contao-news_categories` génère des URLs `/voyages/categorie/a__b__c`. Le bot lit les ~40 alias valides dans le HTML, compose toutes les permutations → chacune retourne 200 + ~195 requêtes SQL. `limit_req zone=catcombo` tient le botnet pendant la migration.

**Solution** : filtrage 100% client-side. 41 voyages chargés une fois, JS filtre par show/hide. Zéro SQL par combinaison.

**SEO** : migration totale sans risque (sitemap vérifié — aucune URL `/voyages/categorie/*`).

**IDs confirmés** :
- `/voyages` → page id=**294**
- `/voyage/<alias>` reader → page id=**306**
- id=**297** = Actualités (module `id=245`, archive `id=6`) — non ciblé

**Modules km50 concernés** (base confirmée) :
- `id=245` — type `newscategories`, archive `[6]` → Actualités — **à laisser intact**
- `id=254` — type `newscategories_cumulativehierarchical`, archives `[7,8,9]` → Voyages — **à laisser activé** (son template modifié `nav_newscategories_hierarchical.html5` génère les `<button>` et fournit les catégories au chargement)

---

## Analyse nginx — pourquoi les locations dans `site.conf` ne mordent pas

`sites-enabled/km50.fr` déclare ces deux blocs **avant** l'`include forge-conf/2942385/site.conf` :

```nginx
location ~* /categorie/[^/]*__ { ... }  # ← matche en premier
location ~* /categorie/ { ... }          # ← matche en premier
# include forge-conf/2942385/site.conf ← jamais consulté pour /categorie/*
```

Nginx : pour les regex (`~*`), **première déclarée qui matche = gagne**. Les locations dans `site.conf` sont ignorées pour ces URLs.

> [!WARNING]
> `sites-enabled/km50.fr` = généré par Forge à chaque redeploy (risque d'écrasement).
> `forge-conf/2942385/site.conf` = éditable via panel Forge "Custom Nginx".
> `forge-conf/2942385/km50.fr/before/` = hors du bloc `server{}` → **impossible d'y déclarer une `location`**.
>
> **Seul levier** : modifier directement `sites-enabled/km50.fr`. Documenter la modification dans Forge pour la réappliquer après redeploy.

---

## Ordre d'exécution (inversé par rapport au v5)

> [!CAUTION]
> Le v5 proposait nginx en premier. **Erreur** : à ce moment, les modules génèrent encore des `<a href="/voyages/categorie/alias">`. Les vrais visiteurs cliquent → 410 immédiat → site cassé pendant la migration.
>
> **Ordre correct** : les templates et le JS d'abord. Les visiteurs continuent d'utiliser les liens existants (server-side) pendant que la nouvelle expérience JS est déployée. Une fois le JS validé et les liens supprimés du HTML, les 410 nginx sont activés — rien ne pointe plus vers ces URLs.

```
Étape 1 → Étape 2 → Étape 3 → Étape 4 → Étape 5 → Étape 6 → Étape 7 (nginx)
Templates  Boutons   JS        fe_page   shared.js  Backend   410 nginx
```

---

## Étapes d'implémentation

### Étape 1 — `news_voyages.html5` : `data-categories` + supprimer les liens

> [!NOTE]
> **Q3 fermée** : `$item['pid']` est disponible car `generateItem()` fait `$data = $category->row()` (ligne 330 de `NewsModule.php`), qui expose **toutes les colonnes** de `tl_news_category`, dont `pid`. Cela débloque aussi le `data-categories` (Étape 1), pas seulement les boutons (Étape 3).

#### [MODIFY] [news_voyages.html5](file:///home/forge/km50.fr/templates/client/news_voyages.html5)

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

        $catClasses[] = 'cat-' . $alias;

        // Texte brut — plus de <a href="/voyages/categorie/..."> (futur 410)
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
> Même suppression `$link → $label` dans [news_voyage_full.html5](file:///home/forge/km50.fr/templates/client/news_voyage_full.html5) (même pattern ligne 16).

---

### Étape 2 — Garder le module 254 activé

Le module `id=254` (type `newscategories_cumulativehierarchical`) doit **rester activé**. Son template modifié (`nav_newscategories_hierarchical.html5`) ne génèrera plus de liens `__`, mais des `<button data-filter-*>` statiques. Cela permet :
1. De charger et lister les catégories sémantiques au chargement de la page (1 seule requête SQL).
2. D'avoir les boutons prêts dans le DOM pour le JS.

Désactiver ou retirer de la mise en page tout autre module cumulatif de catégories inutile (par exemple `mod_newscategories_cumulative` s'il est présent en parallèle).

#### [MODIFY] [nav_newscategories_hierarchical.html5](file:///home/forge/km50.fr/templates/client/nav_newscategories_hierarchical.html5)

`$item['pid']` est disponible. Mapping pid → groupe :

```php
<?php
$pidToGroup = [2 => 'organisateur', 3 => 'region', 9 => 'thematique', 37 => 'experience'];
$group = $pidToGroup[(int)($item['pid'] ?? 0)] ?? null;
?>
```

Pour les items non-actifs (remplacer le `<span class="js-cat-link">`) :
```html
<?php if ($group): ?>
<button
    class="<?= $item['class'] ?>"
    data-filter-group="<?= $group ?>"
    data-filter-value="<?= htmlspecialchars($item['alias'] ?? '', ENT_QUOTES) ?>"
    <?php if ($item['subitems']): ?> aria-haspopup="true"<?php endif; ?>
>
    <span class="name"><?= $item['link'] ?></span>
    <?php if ($this->showQuantity): ?><span class="quantity"><?= $item['quantity'] ?></span><?php endif; ?>
</button>
<?php else: ?>
<!-- item sans groupe connu : afficher normalement -->
<span class="<?= $item['class'] ?>"><?= $item['link'] ?></span>
<?php endif; ?>
```

---

### Étape 3 — [NEW] `files/client/js/voyage-filter.js`

#### [NEW] [voyage-filter.js](file:///home/forge/km50.fr/files/client/js/voyage-filter.js)

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

### Étape 4 — [MODIFY] `fe_page.html5` : canonical + chargement conditionnel

```php
<?php
// Voyages=294, Actualités=297 (différent !), Reader=306
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

### Étape 5 — [MODIFY] `shared.js` : supprimer le listener `js-cat-link`

Supprimer les lignes 58–71 de [shared.js](file:///home/forge/km50.fr/files/client/js/shared.js) — plus aucun `.js-cat-link` après la migration.

---

### Étape 6 — Backend Contao : nettoyer la mise en page

Vérifier la mise en page de la page Voyages (page 294) :
- S'assurer que le module `id=254` est bien présent (pour générer les boutons).
- Désactiver ou retirer tout autre module cumulatif (comme un module basé sur `mod_newscategories_cumulative.html5` s'il y en avait un de configuré).

**Laisser intact** le module `id=245` (`newscategories`, archive `[6]` = Actualités) sur les autres pages.

---

### Étape 7 — nginx : 410 Gone dans `sites-enabled/km50.fr`

**En dernier**, une fois le filtrage JS validé et les liens `/categorie/*` supprimés du HTML.

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

# APRÈS — regex ancrées sur ^/voyages/ pour ne pas toucher /actualites/categorie/*
location ~* ^/voyages/categorie/[^/]*__ {
    limit_req zone=catcombo burst=5 nodelay;
    limit_req_status 429;
    return 410;
}
location ~* ^/voyages/categorie/ {
    return 410;
}
# /actualites/categorie/* et toute autre archive : laisser passer (try_files inchangé)
location ~* /categorie/ {
    limit_req zone=categories_limit burst=5 nodelay;
    try_files /share/$host${uri}index.html $uri /index.php$is_args$args;
}
```

**Pas de `Disallow` dans robots.txt** : si Googlebot est bloqué par robots.txt, il ne voit jamais le 410 → pas de déréférencement. Le 410 seul suffit et est le signal correct.

---

## Récapitulatif des fichiers

| Ordre | Fichier | Action |
|---|---|---|
| 1 | `templates/client/news_voyages.html5` | data-categories, suppr. `<a>` /categorie |
| 1 | `templates/client/news_voyage_full.html5` | Même suppression |
| 2 | `templates/client/nav_newscategories_hierarchical.html5` | `<button data-filter-*>` |
| 3 | `files/client/js/voyage-filter.js` | Nouveau fichier |
| 4 | `templates/client/fe_page.html5` | Canonical + chargement JS conditionnel |
| 5 | `files/client/js/shared.js` | Suppr. listener js-cat-link (L58-71) |
| 6 | Backend Contao | Garder 254 actif, retirer autres modules cumulatifs |
| **7 (dernier)** | `sites-enabled/km50.fr` | **410 Gone ancrés sur ^/voyages/categorie/** |

---

## Open Questions

> ~~**Q1**~~ Fermée. ~~**Q2**~~ Fermée. ~~**Q3**~~ **Fermée** — `$item['pid']` disponible via `category->row()`. ~~**Q4**~~ Fermée. ~~**Q5**~~ Fermée.

Aucune question ouverte bloquante. Plan prêt à exécuter.
