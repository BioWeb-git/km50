<?php

return array(
	'label' => array(
		'en' => array('Icon boxes with counter', 'Creates boxes with icon, label and counter'),
		'de' => array('Icon-Boxen mit Zähler', 'Erzeugt nebeneinander dargestellte Boxen mit Icon, Label und einer Zahl'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'columns'),
	'fields' => array(
		'deactivateCounter' => array(
			'label' => array(
				'en' => array('Deactivate counter animation', 'Disables the animation of the numbers.'),
				'de' => array('Zähleranimation deaktivieren', 'Deaktiviert die Animation der Zahlen.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50'),
		),
		'repeatCounter' => array(
			'label' => array(
				'en' => array('Restart counter animation', 'Restarts the animation if the element returns into the view port.'),
				'de' => array('Zähleranimation wiederholen', 'Startet die Animation neu sobald das Element erneut sichtbar wird.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50'),
		),
		'boxes' => array(
			'label' => array(
				'en' => array('Boxes', ''),
				'de' => array('Boxen', ''),
			),
			'elementLabel' => 'Box %s',
			'inputType' => 'list',
			'fields' => array(
				'icon' => array(
					'label' => array(
						'en' => array('Icon', ''),
						'de' => array('Icon', ''),
					),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array('tl_class' => '', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
				),
				'number' => array(
					'label' => array(
						'en' => array('Number', ''),
						'de' => array('Zahl', ''),
					),
					'inputType' => 'text',
				),
				'name' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'url' => array(
					'label' => array(
						'en' => array('Link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Link-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
					),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
				),
				'newWindow' => array(
					'label' => $GLOBALS['TL_LANG']['MSC']['target'],
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'clr'),
				),
			),
		),
	),
);
