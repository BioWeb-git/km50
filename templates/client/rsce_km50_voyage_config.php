<?php

// Liste des régions françaises pour le champ Région
$regions = array(
    'Auvergne-Rhône-Alpes',
    'Bourgogne-Franche-Comté',
    'Bretagne',
    'Centre-Val de Loire',
    'Corse',
    'Grand Est',
    'Hauts-de-France',
    'Île-de-France',
    'Normandie',
    'Nouvelle-Aquitaine',
    'Occitanie',
    'Pays de la Loire',
    'Provence-Alpes-Côte d\'Azur',
);

// Liste des catégories de séjour
$categories = array(
    'échappée' => 'Échappée',
    'roadtrip' => 'Roadtrip',
    'inedit' => 'Inédit',
);

return array(
    'label' => array(
        'fr' => array('Voyage', 'Gère l\'affichage d\'un voyage en mode liste et fiche détaillée.'),
    ),
    'types' => array('content'),
    'standardFields' => array('cssID', 'space'),
    'fields' => array(

        'dates_liste' => array( // CHANGEMENT APPLIQUÉ ICI : Passage à inputType 'list'
            'label' => array('fr' => array('Dates disponibles', 'Ajoutez les différentes dates ou périodes de séjour.')),
            'elementLabel' => 'Date %s',
            'inputType' => 'list',
            'fields' => array(
                'date_range' => array(
                    'label' => array('fr' => array('Période de voyage', 'Ex: Du 19 au 21 juin 2036')),
                    'inputType' => 'text',
                    'eval' => array('tl_class' => 'w50'),
                ),
            ),
            'eval' => array('tl_class' => 'clr'),
        ),
        'duree' => array(
            'label' => array('fr' => array('Durée', 'Ex: 3 jours/2 nuits')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'region_select' => array(
            'label' => array('fr' => array('Région', 'Choix parmi les régions françaises.')),
            'inputType' => 'select',
            'options' => $regions,
            'eval' => array('includeBlankOption' => true, 'tl_class' => 'w50'),
        ),
        'region_custom' => array(
            'label' => array('fr' => array('Région (personnalisée)', 'Surcharge le choix ci-dessus si renseigné.')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'prix_liste' => array(
            'label' => array('fr' => array('Prix', 'Ex: TTC (à partir de)')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'participants' => array(
            'label' => array('fr' => array('Nombre de participants', 'Ex: Mini 8 / Maxi 12')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'logement' => array(
            'label' => array('fr' => array('Logement', 'Ex: Chambre d\'hôtes / hôtel 3* / maison privée...')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'marque_select' => array(
            'label' => array('fr' => array('Marque', 'Constructeur / Assureur...')),
            'inputType' => 'select',
            'options' => array('Honda', 'Harley-Davidson', 'Ducati'),
            'eval' => array('includeBlankOption' => true, 'tl_class' => 'w50'),
        ),
        'marque_custom' => array(
            'label' => array('fr' => array('Marque (personnalisée)', 'Surcharge le choix ci-dessus si renseigné.')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'thematique_select' => array(
            'label' => array('fr' => array('Thématique / Univers', 'Choix prédéfini.')),
            'inputType' => 'select',
            'options' => array('Moto & gastronomie', 'Moto & rugby', 'Aventure', 'Détente'),
            'eval' => array('includeBlankOption' => true, 'tl_class' => 'w50'),
        ),
        'thematique_custom' => array(
            'label' => array('fr' => array('Thématique (personnalisée)', 'Surcharge le choix ci-dessus si renseigné.')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'categorie_sejour' => array(
            'label' => array('fr' => array('Catégorie de séjour', 'Échappée / Roadtrip / Inédit.')),
            'inputType' => 'select',
            'options' => $categories,
            'eval' => array('tl_class' => 'w50'),
        ),
        'description_liste' => array(
            'label' => array('fr' => array('Description (Aperçu)', 'Aperçu du séjour affiché sur la liste. Tronqué à l\'affichage.')),
            'inputType' => 'textarea',
            'eval' => array('tl_class' => 'clr', 'rows' => 4, 'rte' => 'tinyMCE'),
        ),


        // --- GROUPEMENT : Affichage Fiche Détaillée ---
        array(
            'inputType' => 'group',
            'label' => array('fr' => array('Affichage Fiche Détaillée')),
        ),
        'photos_fiche' => array(
            'label' => array('fr' => array('Photos du séjour (Galerie)', 'Sélectionnez plusieurs images pour la galerie de la fiche détaillée.')),
            'inputType' => 'fileTree',
            'eval' => array(
                'multiple' => true,
                'fieldType' => 'checkbox',
                'filesOnly' => true,
                'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')),
                'tl_class' => 'clr',
            ),
        ),
        'description_fiche' => array(
            'label' => array('fr' => array('Description (Fiche)', 'Paragraphe d\'introduction du séjour complet.')),
            'inputType' => 'textarea',
            'eval' => array('tl_class' => 'clr', 'rte' => 'tinyMCE'),
        ),
        'programme' => array(
            'label' => array('fr' => array('Programme du Voyage', 'Détail jour par jour.')),
            'elementLabel' => 'Jour %s',
            'inputType' => 'list',
            'fields' => array(
                'titre_jour' => array(
                    'label' => array('fr' => array('Titre du Jour', 'Ex: Jour 1: Arrivée à Aubrac et Dégustation')),
                    'inputType' => 'text',
                    'eval' => array('maxlength' => 255, 'tl_class' => 'w50'),
                ),
                'description_jour' => array(
                    'label' => array('fr' => array('Détail du Jour')),
                    'inputType' => 'textarea',
                    'eval' => array('rte' => 'tinyMCE', 'tl_class' => 'clr'),
                ),
            ),
            'eval' => array('tl_class' => 'clr', 'mandatory' => true),
        ),
        'prix_detaille' => array(
            'label' => array('fr' => array('Prix détaillé', 'Détails TTC : chambre double/twin, individuelle, triple.')),
            'inputType' => 'textarea',
            'eval' => array('tl_class' => 'clr', 'rows' => 5),
        ),
        'ce_prix_comprend' => array(
            'label' => array('fr' => array('Ce prix comprend', 'Liste des prestations incluses (utiliser une liste à puce).')),
            'inputType' => 'textarea',
            'eval' => array('tl_class' => 'clr', 'rte' => 'tinyMCE'),
        ),
        'ce_prix_ne_comprend_pas' => array(
            'label' => array('fr' => array('Ce prix ne comprend pas', 'Liste des prestations non incluses (utiliser une liste à puce).')),
            'inputType' => 'textarea',
            'eval' => array('tl_class' => 'clr', 'rte' => 'tinyMCE'),
        ),
        'documents_indispensables' => array(
            'label' => array('fr' => array('Documents indispensables', 'Ex: permis, CNI/Passeport, visa.')),
            'inputType' => 'textarea',
            'eval' => array('tl_class' => 'clr', 'rows' => 3),
        ),
    ),
);