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
        'reservation_tally_id' => array(
            'label' => array('fr' => array('ID Tally', 'Génération du formulaire de réservation externe.')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'youtube_video' => array(
            'label' => array('fr' => array('Vidéo YouTube', 'Id de la vidéo à intégrer (ex: xxxxxx).')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'min_participants' => array(
            'label' => array('fr' => array('Nombre minimum de participants', 'Nombre requis pour confirmer le séjour.')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50', 'rgxp' => 'digit'),
        ),
        'max_participants' => array(
            'label' => array('fr' => array('Nombre maximum de participants', 'Capacité maximale du groupe.')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50', 'rgxp' => 'digit'),
        ),
        'date_limite' => array(
            'label' => array('fr' => array('Date limite de réservation', 'Date au-delà de laquelle les inscriptions ferment.')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50', 'datepicker' => true, 'rgxp' => 'date'),
        ),
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
        'logement' => array(
            'label' => array('fr' => array('Logement', 'Ex: Chambre d\'hôtes / hôtel 3* / maison privée...')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'categorie_sejour' => array(
            'label' => array('fr' => array('Catégorie de séjour', 'Échappée / Roadtrip / Inédit.')),
            'inputType' => 'select',
            'options' => $categories,
            'eval' => array('tl_class' => 'w50'),
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
                    'label' => array('fr' => array('Titre du Jour', 'Arrivée à Aubrac et Dégustation')),
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
            
            'elementLabel' => 'Prix %s',
            'inputType' => 'list',
            'fields' => array(
                'titre_prix' => array(
                    'label' => array('fr' => array('Titre du tarif', 'Ex: Tarif en chambre double/twin')),
                    'inputType' => 'text',
                    'eval' => array('tl_class' => 'w50'),
                ),
                'prix' => array(
                    'label' => array('fr' => array('Prix', 'Ex: 450 €/personne')),
                    'inputType' => 'text',
                    'eval' => array('tl_class' => 'clr'),
                ),
            ),
            'eval' => array('tl_class' => 'clr', 'mandatory' => true),
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