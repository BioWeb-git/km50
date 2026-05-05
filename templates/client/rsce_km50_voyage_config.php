<?php

return array(
    'label' => array(
        'fr' => array('Voyage', 'Gère l\'affichage d\'un voyage en mode liste et fiche détaillée.'),
    ),
    'types' => array('content'),
    'standardFields' => array('cssID', 'space'),
    'fields' => array(
        array(
            'inputType' => 'group',
            'label' => array('fr' => array('Configuration générale')),
        ),
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
        'assurance_destination' => array(
            'label'     => array('fr' => array('Assurance', 'Choisir le lien pour l\'assurance.')),
            'inputType' => 'select',
            'options'   => array(
                'none'     => 'Non renseigné',
                'annulation'   => 'Assurance annulation',
                'multirisk' => 'Assurance Multirisque',
            ),
            'eval'      => array('tl_class' => 'w50 clr'),
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
        array(
            'inputType' => 'group',
            'label' => array('fr' => array('Informations temporelles')),
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
            'eval' => array('tl_class' => 'clr', 'mandatory' => true, 'minItems' => 1),
        ),
        'prix_detaille' => array(
            
            'label' => array('fr' => array('Prix détaillé', 'Détails TTC : chambre double/twin, individuelle, triple.')),
            
            'elementLabel' => 'Prix %s',
            'inputType' => 'list',
            'fields' => array(
                'titre_prix' => array(
                    'label' => array('fr' => array('Titre du tarif', 'Choisissez ou entrez un tarif')),
                    'inputType' => 'select',
                    'options' => array(
                        'Tarif pilote en chambre partagée (lit double ou 2 lits simples)' => 'Tarif pilote en chambre partagée (lit double ou 2 lits simples)',
                        'Tarif pilote en chambre individuelle (lit double)' => 'Tarif pilote en chambre individuelle (lit double)',
                        'Tarif passager en chambre partagée' => 'Tarif passager en chambre partagée',
                        'custom' => 'Autre tarif (préciser)',
                    ),
                    'eval' => array('tl_class' => 'w50'),
                ),
                'titre_prix_custom' => array(
                    'label' => array('fr' => array('Titre personnalisé', 'Précisez le titre du tarif')),
                    'inputType' => 'text',
                    'eval' => array('tl_class' => 'w50'),
                    'dependsOn' => array(
                        'field' => 'titre_prix',
                        'value' => 'custom',
                    ),
                ),
                'prix' => array(
                    'label' => array('fr' => array('Prix', 'Ex: 450 €/personne')),
                    'inputType' => 'text',
                    'eval' => array('tl_class' => 'clr'),
                ),
            ),
            'eval' => array('tl_class' => 'clr', 'mandatory' => true, 'minItems' => 1),
        ),
        
        array(
            'inputType' => 'group',
            'label' => array('fr' => array('Tarification')),
        ),
        'mention_prix' => array(
            'label' => array('fr' => array('Mention du tarif', 'Ex: remplace la mention "Possibilité de règlement en plusieurs fois : 50% d\'acompte à la réservation" présente dans le template.')),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        array(
            'inputType' => 'group',
            'label' => array('fr' => array('Inclusions')),
        ),
        'ce_prix_comprend_labels' => array(
            'label' => array('fr' => array('Ce prix comprend (Prestations standards)', 'Cochez les prestations incluses par défaut.')),
            'inputType' => 'checkbox',
            'options' => array(
                'conception' => 'La Conception et l’organisation du séjour par <strong>KM50</strong>',
                'accompagnement' => 'L’accompagnement de <strong>KM50</strong>',
                'traces' => 'Les tracés et le roadbook',
                'pauses' => 'Les pauses café pendant les balades motos',
                'assurance_annul' => 'L’assurance annulation et interruption de voyage (sans franchise)',
                'assurance_multi' => 'L’assurance multirisques (annulation & frais médicaux - sans franchise)',
                'accompagnement_concession' => 'L’accompagnement de la concession',

            ),
            'eval' => array('multiple' => true, 'tl_class' => 'clr', 'allowHtml' => true),
        ),
      
        'ce_prix_comprend_extra' => array(
            'label' => array('fr' => array('Ce prix comprend (Extras)', 'Ajoutez d\'autres prestations incluses spécifiques à ce voyage.')),
            'elementLabel' => array('fr' => 'Prestation %s'),
            'inputType' => 'list',
            'fields' => array(
                'text' => array(
                    'label' => array('fr' => array('Libellé', 'Vous pouvez utiliser la notation ***texte gras*** pour mettre en gras.')),
                    'inputType' => 'text',
                    'eval' => array('allowHtml' => true, 'tl_class' => 'w100'),
                ),
            ),
            'eval' => array('tl_class' => 'clr', 'minItems' => 1),
        ),
          
        array(
            'inputType' => 'group',
            'label' => array('fr' => array('Exclusions')),
        ),
        'ce_prix_ne_comprend_pas_labels' => array(
            'label' => array('fr' => array('Ce prix ne comprend pas (Standards)', 'Cochez les exclusions par défaut.')),
            'inputType' => 'checkbox',
            'options' => array(
                'carburant' => 'Le carburant',
                'peages' => 'Les péages éventuels',
                'depenses' => 'Les dépenses personnelles',
                'dejeuner' => 'Les déjeuners',
                'boissons' => 'Les boissons pendant les repas',
            ),
            'eval' => array('multiple' => true, 'tl_class' => 'clr', 'allowHtml' => true),
        ),
        'ce_prix_ne_comprend_pas_extra' => array(
            'label' => array('fr' => array('Ce prix ne comprend pas (Extras)', 'Ajoutez d\'autres exclusions spécifiques à ce voyage.')),
            'elementLabel' => array('fr' => 'Exclusion %s'),
            'inputType' => 'list',
            'fields' => array(
                'text' => array(
                    'label' => array('fr' => array('Libellé', 'Vous pouvez utiliser des balises <strong>...</strong> pour le gras.')),
                    'inputType' => 'text',
                    'eval' => array('allowHtml' => true, 'tl_class' => 'w100'),
                ),
            ),
            'eval' => array('tl_class' => 'clr', 'minItems' => 1),
        ),
          
        array(
            'inputType' => 'group',
            'label' => array('fr' => array('Documents')),
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