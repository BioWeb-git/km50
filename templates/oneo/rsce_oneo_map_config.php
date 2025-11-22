<?php

return array(
	'label' => array(
		'en' => array('Google Map (iframe)', 'Creates a Google Map'),
		'de' => array('Google Map (iframe)', 'Erzeugt eine Google Map'),
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
		'mapRatio' => array(
			'label' => array(
				'en' => array('Optional: Aspect ratio', 'e.g. 16x9. Aspect ratio value of the map seperated by an x.'),
				'de' => array('Optional: Seitenverhältnis', 'Seitenverhältnis getrennt mit \'x\' der Map z. B. 16x9.'),
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
