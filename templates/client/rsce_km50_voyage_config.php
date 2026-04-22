<?php

return array(
    'label' => array(
        'fr' => array('Voyage', 'Gère l\'affichage d\'un voyage en mode liste et fiche détaillée.'),
    ),
    'types' => array('content'),
    'standardFields' => array('cssID', 'space'),
    'fields' => array(
        'type_voyage' => array(
            'label'     => array('fr' => array('Type de voyage', 'Choisissez le mode de transport')),
            'inputType' => 'select',
            'options'   => array(
                'auto' => 'Voyage Auto',
                'moto' => 'Voyage Moto'
            ),
            'eval'      => array('mandatory' => true, 'includeBlankOption' => true),
            'sql'       => "varchar(16) NOT NULL default ''"
        ),
        
        'disponibilite' => array(
            'label'     => array('fr' => array('Disponibilité', 'Sélectionnez le type de disponibilité')),
            'inputType' => 'select',
            'options'   => array(
                'complet'          => 'Complet',
                'last'  => 'Dernières places',
            ),
            'eval'      => array('tl_class' => 'w50', 'includeBlankOption' => true),
            'sql'       => "blob NULL"
        ),
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
        'nb_jours' => array(
            'label'     => array('fr' => array('Nombre de jours', '')),
            'inputType' => 'text',
            'eval'      => array('tl_class' => 'w50', 'rgxp' => 'digit'),
            'sql'       => "int(10) unsigned NOT NULL default '0'"
        ),
        'nb_nuits' => array(
            'label'     => array('fr' => array('Nombre de nuits', '')),
            'inputType' => 'text',
            'eval'      => array('tl_class' => 'w50', 'rgxp' => 'digit'),
            'sql'       => "int(10) unsigned NOT NULL default '0'"
        ),
        'prix_partir_de' => array(
            'label' => array('fr' => array('Prix "A partir de"', 'Laisser vide pour calculer automatiquement depuis les tarifs détaillés.')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50', 'rgxp' => 'digit'),
        ),
       'logement' => array(
            'label'     => array('fr' => array('Logement', 'Sélectionnez le ou les types d\'hébergement')),
            'inputType' => 'checkbox',
            'options'   => array(
                'gite'          => 'Gîte',
                'chambre_hote'  => 'Chambre d\'hôtes',
                'maison_privee' => 'Maison Privée',
                'hotel_2'       => 'Hotel **',
                'hotel_3'       => 'Hotel ***',
                'hotel_4'       => 'Hotel ****',
                'hotel_5'       => 'Hotel *****',
                'chateau'       => 'Château',
                'tente'         => 'Tente',
            ),
            'eval'      => array('tl_class' => 'w50', 'multiple' => true),
            'sql'       => "blob NULL"
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
         'photos_organisateur' => array(
            'label' => array('fr' => array('Logo de l\'organisateur', 'Sélectionnez une images.')),
            'inputType' => 'fileTree',
            'eval' => array(
                'multiple' => false,
                'fieldType' => 'radio',
                'filesOnly' => true,
                'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')),
                'tl_class' => 'clr',
            ),
        ),
        'description_fiche' => array(
            'label' => array('fr' => array('Description', 'Ajouter un texte intro (Selectionner texte puis Menu > Format > Formats > Text intro) - Paragraphe d\'introduction du séjour complet.')),
            'inputType' => 'textarea',
            'eval' => array('tl_class' => 'clr', 'rte' => 'tinyMCE'),
        ),
        'programme' => array(
            'label' => array('fr' => array('Programme du Voyage', 'Détail jour par jour.')),
            'elementLabel' => 'Jour %s',
            'inputType' => 'list',
            'fields' => array(
                'titre_jour' => array(
                    'label' => array('fr' => array('Titre du Jour', 'Exemple : Arrivée à Aubrac et Dégustation')),
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
        'mention_prix' => array(
            'label' => array('fr' => array('Mention du tarif', 'Ex: remplace la mention "Possibilité de règlement en plusieurs fois : 50% d\'acompte à la réservation" présente dans le template.')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
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
            'label'     => array('fr' => array('Documents indispensables', 'Sélectionnez les documents requis')),
            'inputType' => 'checkbox',
            'options'   => array(
                'permis'    => 'Permis',
                'assurance' => 'Assurance',
                'cni'       => 'Carte d\'identité',
                'passeport' => 'Passeport',
                'visa'      => 'Visa',
            ),
            'eval'      => array('tl_class' => 'clr', 'multiple' => true),
            'sql'       => "blob NULL"
        ),
    ),
);