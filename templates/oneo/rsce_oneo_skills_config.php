<?php

return array(
	'label' => array(
		'en' => array('Skills', 'Creates bars with values'),
		'de' => array('Skills', 'Erzeugt Balken mit Werten'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'skills' => array(
			'label' => array(
				'en' => array('Bars', ''),
				'de' => array('Balken', ''),
			),
			'elementLabel' => array(
				'en' => 'Bar %s',
				'de' => 'Balken %s',
			),
			'inputType' => 'list',
			'fields' => array(
				'label' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'long'),
				),
				'size' => array(
					'label' => array(
						'en' => array('Size of the bar', 'Between 0 and 100.'),
						'de' => array('Größe des Balkens', 'Zwischen 0 und 100.'),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'value' => array(
					'label' => array(
						'en' => array('Value', 'Value shown above the bar.'),
						'de' => array('Wert', 'Wird über dem Balken angezeigt.'),
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
					'eval' => array('tl_class' => 'clr w50'),
				),
				'newWindow' => array(
					'label' => $GLOBALS['TL_LANG']['MSC']['target'],
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'w50 m12'),
				),
				'color' => array(
					'label' => array(
						'en' => array('Bar color', ''),
						'de' => array('Balkenfarbe', ''),
					),
					'inputType' => 'text',
					'eval' => array(
						'colorpicker' => true,
						'tl_class' => 'clr wizard',
					),
				),
			),
		),
	),
);
