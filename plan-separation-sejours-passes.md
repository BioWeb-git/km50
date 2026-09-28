# Plan d'implémentation : Séparation des séjours passés (km50.fr)

> [!IMPORTANT]
> **Environnement de Production** : Aucune modification destructive ne doit être appliquée sans validation préalable. Toute modification de template ou de configuration doit garantir la rétrocompatibilité immédiate de l'affichage existant. Ne pas faire de commit/push sans demande explicite.

---

## 1. Contexte & Problématique

### Demande client
> *« 2. Séparer les séjours qui sont passés : je ne voudrais pas les enlever parce que ça permet d'avoir un contenu et des références pour les clients qui arrivent et veulent voir ce que nous proposons. »*

### Constat technique sur km50.fr
1. **Module & Type d'éléments** :
   - Les séjours sont gérés via le bundle **News** de Contao (archives `7` "Échappée", `8` "Roadtrip", `9` "Inédit").
   - L'affichage sur la page `/voyages` (ID `294`) repose sur le module **News List** `id=252` (*Voyages List Boxed*), qui utilise le template [`templates/client/news_voyages.html5`](file:///home/forge/km50.fr/templates/client/news_voyages.html5).
   - Les données détaillées de chaque voyage (prix, dates, durée, limite d'inscription, options) sont stockées dans un élément RockSolid Custom Element (**`rsce_km50_voyage`**) dans `tl_content.rsce_data`.

2. **Limite native du module News de Contao** :
   - Le système de News standard de Contao ne gère pas de notion d'événements futurs ou passés (contrairement au module `calendar` avec `cal_upcoming` et `cal_past`).
   - La date native `tl_news.date` correspond à la date de création/publication de l'article dans le back-office, et non aux dates réelles du séjour.
   - Par défaut, le module `newslist` liste tous les séjours publiés sans distinction temporelle.

3. **État actuel des champs temporels dans les séjours** :
   - `dates_liste` : liste de textes libres (ex: *"Du 18 au 20 septembre 2026"*). Format non normalisé, inexploitable pour un tri/filtrage SQL direct.
   - `date_limite` : timestamp UNIX (champ datepicker Contao) représentant la date limite de réservation. **Ce champ est déjà renseigné sur 100% des 17 séjours actuellement publiés**.
   - `disponibilite` : liste d'états actuels (`complet`, `last`).

---

## 2. Définition du critère « Séjour passé »

Il existe trois façons de déterminer qu'un séjour est passé :

| Approche | Mécanisme | Avantages | Inconvénients |
|---|---|---|---|
| **A. Automatique via `date_limite` (Recommandé immédiat)** | Comparaison `date_limite < time()`. Si la date limite d'inscription est dépassée, le séjour passe en statut "passé". | **Zéro saisie manuelle**, 100% des séjours actuels ont déjà ce champ rempli. | Un séjour dont les inscriptions ferment 2 semaines avant le départ bascule avant le déroulement effectif. |
| **B. Automatique via `date_fin` (Date de fin réelle)** | Ajout d'un champ datepicker `date_fin` dans `rsce_km50_voyage_config.php`. | Précision totale : le séjour reste "en cours" jusqu'au dernier jour du voyage. | Nécessite de renseigner cette date sur les voyages passés et futurs. |
| **C. Manuelle / Éditoriale** | Ajout d'une option `past` dans le champ `disponibilite` du RSCE (ex: *"Séjour passé / Référence"*). | Contrôle manuel total par l'administrateur. | Risque d'oubli si l'administrateur ne met pas à jour le statut. |

> [!TIP]
> **Approche hybride recommandée** :
> 1. Détection automatique basée sur `date_limite` (ou `date_fin` si renseignée).
> 2. Possibilité de surcharger manuellement via le champ `disponibilite` (ex: forcer un séjour en "Séjour passé").

---

## 3. Options d'affichage & d'architecture technique

### Option 1 — Deux modules News List sur la même page (Approche Back-office Contao)

* **Architecture** :
  - **Module A (Haut)** : *Voyages à venir* (filtre les séjours non échus).
  - **Module B (Bas)** : *Voyages passés / Nos références* (filtre les séjours échus).
  - Dans Contao, sur l'article de la page `/voyages` (article ID `406`), on place :
    1. Module A (*Voyages à venir*)
    2. Élément de contenu Titre / Séparateur (*« Nos précédents séjours »* ou *« Ils ont voyagé avec nous »* avec texte d'accroche)
    3. Module B (*Voyages passés*)
* **Implémentation technique du filtrage** :
  - Utilisation du hook Contao `newsListFetchItems` / `newsListCountItems` via un Event Listener Symfony dans `src/EventListener/VoyageTimeFilterListener.php`.
  - Le hook détecte la classe CSS du module :
    - Si le module a la classe `voyages-upcoming` : requête SQL filtrant `date_limite >= NOW`.
    - Si le module a la classe `voyages-past` : requête SQL filtrant `date_limite < NOW`.
* **Points forts** :
  - Structure éditoriale très claire dans Contao.
  - La cliente peut librement insérer des blocs de texte marketing entre les deux listes.
  - Possibilité d'adapter le template d'affichage (ex: retirer le bouton de réservation sur les anciens voyages, afficher un badge *"Édition passée"*).

---

### Option 2 — Séparation au sein du template / Filtrage dynamique (Approche Frontend)

* **Architecture** :
  - Un seul module `newslist` (le module actuel `252`).
  - Le template de liste ou chaque carte voyage reçoit un attribut de données :
    - `data-voyage-status="upcoming"`
    - `data-voyage-status="past"`
  - **Déclinaison 2A (Sous-sections statiques)** :
    - Le template [news_voyages.html5](file:///home/forge/km50.fr/templates/client/news_voyages.html5) ou un template de module personnalisé classe les résultats en deux conteneurs distincts dans le flux HTML (haut = séjours à venir, bas = séjours passés).
  - **Déclinaison 2B (Onglets / Toggle interactif)** :
    - En haut de la grille de voyages, ajout de boutons d'onglets :
      - `[ Séjours disponibles ]` (actif par défaut)
      - `[ Séjours passés / Références ]`
      - `[ Tous les séjours ]`
    - S'intègre directement avec le système de filtrage client-side documenté dans [filtrage-client-side.md](file:///home/forge/km50.fr/docs/filtrage-client-side.md).
* **Points forts** :
  - Zéro création de module dans le back-office, zéro risque de collision d'IDs.
  - Expérience utilisateur moderne et fluide (aucun rechargement de page).
  - Réduction de la charge SQL (une seule requête pour tous les voyages).

---

## 4. Comparatif des options

| Critère | Option 1 : Deux modules Contao | Option 2A : Deux sections template | Option 2B : Onglets interactifs |
|---|---|---|---|
| **Clarté pour l'administrateur** | Très haute (visible dans Contao) | Moyenne (géré dans le code) | Moyenne (géré dans le code) |
| **Souplesse éditoriale (textes intercalaires)** | Maximale (éléments Contao standards) | Limitée au template | Limitée au template |
| **Impact sur les requêtes SQL** | 2 requêtes de liste | 1 requête | 1 requête |
| **Cohérence avec les filtres catégories** | Requiert synchronisation | Immédiate | Immédiate (filtrage JS) |
| **Risque en production** | Très faible si testé isolément | Nul (purement visuel) | Nul (purement visuel) |

---

## 5. Plan d'exécution étape par étape

### Phase 0 — Sécurisation préalable (Avant tout code)
- [x] Création d'un backup de la base de données de production (`php8.3 vendor/bin/contao-console contao:backup:create`).
- [x] Sauvegarde et commit/push de l'état initial et du plan d'intervention avant de commencer.

### Phase 1 — Validation des choix (Réalisée)
- [x] Ergonomie validée : **Option 2B (Onglets / Toggle interactif)** avec compteurs en amont de la liste.
- [x] Règle temporelle validée : Détection automatique via `date_limite < aujourd'hui 23:59:59` avec possibilité de forçage manuel via l'option `past` ("Séjour passé / Référence") dans `disponibilite`.

### Phase 2 — Préparation technique (Réalisée)
- [x] Mise à jour de [`templates/client/rsce_km50_voyage_config.php`](file:///home/forge/km50.fr/templates/client/rsce_km50_voyage_config.php) : ajout de `'past' => 'Séjour passé / Référence'` dans le champ `disponibilite`.
- [x] Mise à jour de [`templates/client/rsce_km50_voyage.html5`](file:///home/forge/km50.fr/templates/client/rsce_km50_voyage.html5) :
  - Détection `$isPast` automatique et manuelle.
  - Définition des GLOBALS (`voyage_status`, `voyage_status_class`, `disponibilite`).
  - Insertion du bloc *"Inscriptions closes"* en mode preview tout en conservant le formulaire Tally standard pour la vue publique.
- [x] Mise à jour de [`templates/client/news_voyages.html5`](file:///home/forge/km50.fr/templates/client/news_voyages.html5) :
  - Ajout des attributs `data-status="upcoming|past"` et classes CSS sur `.voyages-master`.
  - Libellé par défaut conservé à *"Afficher le voyage"* pour la vue publique.
- [x] Mise à jour de [`templates/client/news_voyage_full.html5`](file:///home/forge/km50.fr/templates/client/news_voyage_full.html5) : compatibilité vue détaillée.

### Phase 3 — Mise en place de la séparation & Mode Prévisualisation (Réalisée)
- [x] Implémentation du filtrage interactif dans [`files/client/js/shared.js`](file:///home/forge/km50.fr/files/client/js/shared.js) :
  - Détection automatique et calcul des compteurs : *Séjours disponibles*, *Séjours passés*, *Tous les séjours*.
  - Gestion de l'historique URL par hash (`#past`, `#all`, et URL propre sans hash pour les disponibles).
  - Préservation du statut actif lors du clic sur les filtres de catégories (`.js-cat-link`).
  - Gestion du message d'absence avec bouton de bascule vers les séjours passés.
  - **Mode Prévisualisation sécurisé** : activation via `?preview=1` (persisté en `localStorage`), désactivation via `?preview=0`.
- [x] Intégration des styles CSS dans [`files/client/css/fixes.scss`](file:///home/forge/km50.fr/files/client/css/fixes.scss) :
  - Boutons d'onglets ergonomiques avec badges compteurs et couleur KM50 `#7fa171`.
  - Conditionnement strict à `body.km50-preview` : la fonctionnalité est **100% invisible pour le client et les visiteurs publics** tant que le devis n'est pas validé.

### Phase 4 — Contrôle Qualité & Recette
- [x] Test de la répartition temporelle (1 séjour disponible, 13 passés, 3 fiches de référence/éditions passées sur 17 voyages).
- [x] Test de la navigation par catégorie (ex: *Ducati Groupe Priod* reste sur l'onglet disponible avec message d'absence adapté et bouton vers les passés).
- [x] Test de l'isolation du mode prévisualisation :
  - **Vue publique** (`https://www.km50.fr/voyages`) : affichage d'origine à 100%, zéro onglet, tous les séjours visibles.
  - **Vue dev / prévisualisation** (`https://www.km50.fr/voyages?preview=1`) : barre d'onglets active, filtrage dynamique fonctionnel.
- [ ] Présentation du devis à la cliente.
- [ ] Après acceptation du devis : retrait du conditionnement preview pour ouverture publique.
- [ ] Création du backup BDD de clôture (`contao:backup:create`).
- [ ] Validation de l'utilisateur avant le commit/push final sur `origin main`.
