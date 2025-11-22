<?php

return array(
	'label' => array(
		'en' => array('Icon list', 'Creates a icon list with optional columns'),
		'de' => array('Iconliste', 'Erzeugt eine Iconliste wahlweise mit mehreren Spalten'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'headline'),
	'fields' => array(
		'lists' => array(
			'label' => array(
				'en' => array('Lists', ''),
				'de' => array('Listen', ''),
			),
			'elementLabel' => array(
				'en' => 'List %s',
				'de' => 'Liste %s',
			),
			'inputType' => 'list',
			'fields' => array(
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'icon' => array(
					'label' => array(
						'en' => array('Default list icon', 'This icon will be shown next to the bullet points by default.'),
						'de' => array('Listen-Icon (Standard)', 'Dieses Icon wird standardmäßig für alle Punkte dieser Liste verwendet.'),
					),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array(
						'tl_class' => 'clr',
						'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'
					),
				),
				'items' => array(
					'label' => array(
						'en' => array('List items', ''),
						'de' => array('Auflistungspunkte', ''),
					),
					'elementLabel' => array(
						'en' => 'Item %s',
						'de' => 'Punkt %s',
					),
					'inputType' => 'list',
					'fields' => array(
						'icon' => array(
							'label' => array(
								'en' => array('Icon', 'Overwrites the default list icon.'),
								'de' => array('Icon', 'Überschreibt das Standard-Icon der Liste.'),
							),
							'inputType' => 'rocksolid_icon_picker',
							'eval' => array('tl_class' => '', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
						),
						'label' => array(
							'label' => array(
								'en' => array('Label', ''),
								'de' => array('Label', ''),
							),
							'inputType' => 'text',
							'eval' => array('tl_class' => 'w50'),
						),
						'text' => array(
							'label' => array(
								'en' => array('Text', ''),
								'de' => array('Text', ''),
							),
							'inputType' => 'text',
							'eval' => array('tl_class' => 'w50'),
						),
						'url' => array(
							'label' => array(
								'en' => array('Link text', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
								'de' => array('Text verlinken', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
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
