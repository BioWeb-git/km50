<?php

return array(
	'label' => array(
		'en' => array('Icon list', 'Creates a icon list with optional columns'),
		'de' => array('Iconliste', 'Erzeugt eine Iconliste wahlweise mit mehreren Spalten'),
        'fr' => array('Liste des icones', 'Crée une liste d\'icônes avec des colonnes facultatives'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID', 'headline'),
	'fields' => array(
		'lists' => array(
			'label' => array(
				'en' => array('Lists', ''),
				'de' => array('Listen', ''),
                'fr' => array('Listes', ''),
            ),
			'elementLabel' => array(
				'en' => 'List %s',
				'de' => 'Liste %s',
                'fr' => 'Liste %s',
            ),
			'inputType' => 'list',
			'fields' => array(
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
                        'fr' => array('Titre', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'icon' => array(
					'label' => array(
						'en' => array('Default list icon', 'This icon will be shown next to the bullet points by default.'),
						'de' => array('Listen-Icon (Standard)', 'Dieses Icon wird standardmäßig für alle Punkte dieser Liste verwendet.'),
                        'fr' => array('Icônes de liste par défaut', 'Cette icones sera affichée à côté des puces par défaut.'),
                    ),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array(
						'tl_class' => 'clr',
						'iconFont' => 'files/client/fonts/rocksolid-icons.svg'
					),
				),
				'items' => array(
					'label' => array(
						'en' => array('List items', ''),
						'de' => array('Auflistungspunkte', ''),
                        'fr' => array('Éléments de la liste', ''),
                    ),
					'elementLabel' => array(
						'en' => 'Item %s',
						'de' => 'Punkt %s',
                        'fr' => 'Elément %s',
                    ),
					'inputType' => 'list',
					'fields' => array(
						'icon' => array(
							'label' => array(
								'en' => array('Icon', 'Overwrites the default list icon.'),
								'de' => array('Icon', 'Überschreibt das Standard-Icon der Liste.'),
                                'fr' => array('Icône', 'Remplace l\'icone de liste par défaut.'),
                            ),
							'inputType' => 'rocksolid_icon_picker',
							'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
						),
						'label' => array(
							'label' => array(
								'en' => array('Label', ''),
								'de' => array('Label', ''),
                                'fr' => array('Label', ''),
                            ),
							'inputType' => 'text',
							'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
						),
						'text' => array(
							'label' => array(
								'en' => array('Text', ''),
								'de' => array('Text', ''),
                                'fr' => array('Texte', ''),
                            ),
							'inputType' => 'text',
							'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
						),
						'url' => array(
							'label' => array(
								'en' => array('Link text', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
								'de' => array('Text verlinken', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                                'fr' => array('URL du lien', 'Exemples: #contact, {{link_url::pagealias}} vers l\'alias, ID ou autre insert tag, http://example.com'),
                            ),
							'inputType' => 'url',
							'eval' => array('tl_class' => 'w50'),
						),
						'newWindow' => array(
							'label' => $GLOBALS['TL_LANG']['MSC']['target'],
							'inputType' => 'checkbox',
							'eval' => array('tl_class' => 'w50 m12'),
						),
					),
				),
			),
		),
	),
);
