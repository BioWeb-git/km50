<?php

return array(
	'label' => array(
		'en' => array('Google Map with custom colors', 'Creates a colourable Google Map'),
		'de' => array('Google Map mit eigenen Farben', 'Erzeugt eine eingefärbte Google Map'),
	),
	'types' => array('content', 'module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'mapAddress' => array(
			'label' => array(
				'en' => array('Address or coordinates of the map', 'e.g. "Berlin, Germany" or "Spandauer Straße 1, Berlin, Germany"'),
				'de' => array('Adresse oder Koordinaten der GoogleMap', 'z.B.: "Berlin, Deutschland" oder "Spandauer Straße 1, Berlin, Deutschland"'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'apiKey' => array(
			'label' => array(
				'en' => array('Google Maps API key', 'Get a free API key on <a style="text-decoration: underline" href="https://developers.google.com/maps/documentation/javascript/get-api-key#key" target="_blank" rel="noopener">developers.google.com</a>.'),
				'de' => array('Google Maps API-Key', 'Fordern Sie einen API-Key auf <a style="text-decoration: underline" href="https://developers.google.com/maps/documentation/javascript/get-api-key#key" target="_blank" rel="noopener">developers.google.com</a> an.'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'zoomLevel' => array(
			'label' => array(
				'en' => array('Zoom level', 'Default: 15. Possible values: From 0 (whole world) to 21 (single buildings).'),
				'de' => array('Zoomstufe', 'Standard: 15. Mögliche Eingaben: Von 0 (ganze Welt) bis 21 (einzelne Gebäude).'),
			),
			'inputType' => 'select',
			'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21),
			'eval' => array('tl_class' => 'w50'),
		),
		'invertLightness' => array(
			'label' => array(
				'en' => array('Invert color', 'Create a dark version of the map'),
				'de' => array('Farben invertieren', 'Erzeugt eine dunkle Variante der Karte.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'hue' => array(
			'label' => array(
				'en' => array('Color tone', ''),
				'de' => array('Farbton', ''),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 clr',
			),
		),
		'saturation' => array(
			'label' => array(
				'en' => array('Saturation', 'between -100 and 100'),
				'de' => array('Sättigung', 'zwischen -100 und 100'),
			),
			'inputType' => 'text',
			'eval' => array(
				'tl_class' => 'w50',
			),
		),
		'lightness' => array(
			'label' => array(
				'en' => array('Lightness', 'between -100 and 100'),
				'de' => array('Helligkeit', 'zwischen -100 und 100'),
			),
			'inputType' => 'text',
			'eval' => array(
				'tl_class' => 'w50',
			),
		),
		'gamma' => array(
			'label' => array(
				'en' => array('Gamma', 'between 0 and 10. Default: 1'),
				'de' => array('Gamma', 'zwischen 0 und 10. Standardwert: 1'),
			),
			'inputType' => 'text',
			'eval' => array(
				'tl_class' => 'w50',
			),
		),
		'activateLinkLabel' => array(
			'label' => array(
				'en' => array('Activate link label', 'With the activate link the google maps get loaded only after the user clicks it.'),
				'de' => array('Aktivierungslink-Bezeichnung', 'Durch den Aktivierungslink wird die Google-Map erst bei Klick des Besuchers geladen.'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
	),
);
