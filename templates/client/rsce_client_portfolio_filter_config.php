<?php

return array(
	'label' => array(
		'en' => array('News- and portfolio filter', 'Creates navigation to filter news archives'),
		'de' => array('News- und Portfolio-Filter', 'Erzeugt eine Navigation zum Filtern von Newsarchiven'),
        'fr' => array('Navigation d\'actualités', 'Crée une navigation pour filtrer les archives d\'actualités'),
    ),
	'types' => array('module'),
	'standardFields' => array('headline','cssID'),
	'fields' => array(
		'multipleSelection' => array(
			'label' => array(
				'en' => array('Activate multiple selection', ''),
				'de' => array('Mehrfachauswahl aktivieren', ''),
                'fr' => array('Activer la sélection multiple', ''),
            ),
			'inputType' => 'checkbox',
		),
		'links' => array(
			'label' => array(
				'en' => array('Filter links', ''),
				'de' => array('Filter-Links', ''),
                'fr' => array('Filtrer les liens', ''),
            ),
			'elementLabel' => '%s. Link',
			'inputType' => 'list',
			'fields' => array(
				'icon' => array(
					'label' => array(
						'en' => array('Icon', ''),
						'de' => array('Icon', ''),
                        'fr' => array('Icône', ''),
                    ),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
				),
				'label' => array(
					'label' => array(
						'en' => array('Label', 'Caption of the filter button.'),
						'de' => array('Bezeichnung', 'Bezeichnung der Filterschaltfläche.'),
                        'fr' => array('Label', 'Légende du bouton de filtre.'),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'tag' => array(
					'label' => array(
						'en' => array('Tag', 'ID of the news archive to be filtered.'),
						'de' => array('Tag', 'Bezeichnung des zu filternden Tags bzw. der zu filternden Kategorie.'),
                        'fr' => array('Tag', 'ID de l\'archive d\'actualités à filtrer.'),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
			),
		),
	),
);
