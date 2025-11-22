<?php

return array(
	'label' => array(
		'en' => array('Oneo Logo', 'Logo image'),
		'de' => array('Oneo Logo', 'Logo-Grafik'),
	),
	'types' => array('module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'image' => array(
			'label' => array(
				'en' => array('Logo image', ''),
				'de' => array('Logo-Grafik', ''),
			),
			'inputType' => 'fileTree',
			'eval' => array(
				'fieldType' => 'radio',
				'filesOnly' => true,
				'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')),
			),
		),
		'alt' => array(
			'label' => array(
				'en' => array('Alt text', 'Alt text for search engines or browser without image support.'),
				'de' => array('Logo-Text', 'Alternativtext für Suchmaschinen und Browser ohne Bildunterstützung.'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'url' => array(
			'label' => array(
				'en' => array('Link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
				'de' => array('Link-URL', 'URL der Seite auf die das Logo verlinkt. Lassen Sie dieses Feld leer um auf die Startseite zu verlinken. Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
			),
			'inputType' => 'url',
			'eval' => array('tl_class' => 'w50'),
		),
	),
);
