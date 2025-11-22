<?php

return array(
	'label' => array(
		'en' => array('Area navigation', 'Creates a fixed navigation with anchor links'),
		'de' => array('Bereichsnavigation', 'Erzeugt eine fixierte Navigation mit Sprungmarken'),
	),
	'types' => array('content', 'module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'changeUrl' => array(
			'label' => array(
				'en' => array('Change URL on scroll', 'Changes the URL to match the active state.'),
				'de' => array('URL beim scrollen verändern', 'Ändert die URL damit sie mit dem Aktivstatus übereinstimmt.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => ''),
		),
		'links' => array(
			'label' => array(
				'en' => array('Links', ''),
				'de' => array('Links', ''),
			),
			'elementLabel' => '%s. Link',
			'inputType' => 'list',
			'fields' => array(
				'label' => array(
					'label' => array(
						'en' => array('Label', ''),
						'de' => array('Bezeichnung', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'url' => array(
					'label' => array(
						'en' => array('Link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Link-URL', 'Beispiele: #kontakt, {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
					),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
				),
				'invertControls' => array(
					'label' => array(
						'en' => array('Invert controls', 'Inverts the control elements for this section.'),
						'de' => array('Kontrollelemente invertieren', 'Invertiert die Kontrollelemente über diesem Bereich.'),
					),
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'w50'),
				),
			),
		),
	),
);
