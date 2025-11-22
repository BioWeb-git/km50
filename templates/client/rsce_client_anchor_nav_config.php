<?php

return array(
	'label' => array(
		'en' => array('Anchor navigation', 'Creates a navigation with jump labels'),
		'de' => array('Sprungnavigation', 'Erzeugt eine Navigation mit Sprungmarken'),
	),
	'types' => array('module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'changeUrl' => array(
			'label' => array(
				'fr' => array('Modifie l\'Url pendant le scrolll', 'Modifie l\'URL pour qu\'elle corresponde à l\'état actif.'),
				'en' => array('Change URL on scroll', 'Changes the URL to match the active state.'),
				'de' => array('URL beim scrollen verändern', 'Ändert die URL damit sie mit dem Aktivstatus übereinstimmt.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => ''),
		),
		'links' => array(
			'label' => array(
				'fr' => array('Liens', ''),
				'en' => array('Links', ''),
				'de' => array('Links', ''),
			),
			'elementLabel' => '%s. Link',
			'inputType' => 'list',
			'fields' => array(
				'icon' => array(
					'label' => array(
						'fr' => array('Icône', ''),
						'en' => array('Icon', ''),
						'de' => array('Icon', ''),
					),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
				),
				'label' => array(
					'label' => array(
						'fr' => array('Label', ''),
						'en' => array('Label', ''),
						'de' => array('Bezeichnung', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'url' => array(
					'label' => array(
                        'fr' => array('Link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
                        'en' => array('Link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Link-URL', 'Beispiele: #kontakt, {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
					),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
				),
				'highlight' => array(
					'label' => array(
						'en' => array('Mettre en avant', 'Met en surbrillance visuellement l\'élément du menu.'),
						'de' => array('Hervorgehoben', 'Hebt den Menüpunkt optisch hervor.'),
					),
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'w50'),
				),
			),
		),
	),
);
