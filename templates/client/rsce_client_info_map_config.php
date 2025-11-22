<?php

return array(
	'label' => array(
		'en' => array('Google Map with custom colors', 'Creates a colourable Google Map'),
		'de' => array('Google Map mit eigenen Farben', 'Erzeugt eine eingefärbte Google Map'),
        'fr' => array('Google Map avec des couleurs personnalisées', 'Crée une carte Google thématisable'),
    ),
	'types' => array('content', 'module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'mapAddress' => array(
			'label' => array(
				'en' => array('Address or coordinates of the map', 'e.g. "Berlin, Germany" or "Spandauer Straße 1, Berlin, Germany"'),
				'de' => array('Adresse oder Koordinaten der GoogleMap', 'z.B.: "Berlin, Deutschland" oder "Spandauer Straße 1, Berlin, Deutschland"'),
                'fr' => array('Adresse ou coordonnées de la carte', 'e.g. "Paris, France" or "55 Rue du Faubourg Saint-Honoré, 75008 Paris"'),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'apiKey' => array(
			'label' => array(
				'en' => array('Google Maps API key', 'Get a free API key on <a style="text-decoration: underline" href="https://developers.google.com/maps/documentation/javascript/get-api-key#key" target="_blank" rel="noopener">developers.google.com</a>.'),
				'de' => array('Google Maps API-Key', 'Fordern Sie einen API-Key auf <a style="text-decoration: underline" href="https://developers.google.com/maps/documentation/javascript/get-api-key#key" target="_blank" rel="noopener">developers.google.com</a> an.'),
                'fr' => array('Google Maps API key', 'Obtenez une clé API gratuite sur <a style="text-decoration: underline" href="https://developers.google.com/maps/documentation/javascript/get-api-key#key" target="_blank" rel="noopener">developers.google.com</a>.'),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'zoomLevel' => array(
			'label' => array(
                'en' => array('Zoom level', 'Default: 15. Possible values: From 0 (whole world) to 21 (single buildings).'),
                'de' => array('Zoomstufe', 'Standard: 15. Mögliche Eingaben: Von 0 (ganze Welt) bis 21 (einzelne Gebäude).'),
                'fr' => array('Niveau de zoom', 'Default: 15. Valeur possible: De 0 (Monde entier) à 21 (Bâtiment).'),
            ),
			'inputType' => 'select',
			'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21),
			'eval' => array('tl_class' => 'w50'),
		),
		'invertLightness' => array(
			'label' => array(
				'en' => array('Invert color', 'Create a dark version of the map'),
				'de' => array('Farben invertieren', 'Erzeugt eine dunkle Variante der Karte.'),
                'fr' => array('Inverser la couleur', 'Créer une version sombre de la carte'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'hue' => array(
			'label' => array(
				'en' => array('Color tone', ''),
				'de' => array('Farbton', ''),
                'fr' => array('Teinte', ''),
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
                'fr' => array('Saturation', 'entre -100 and 100'),
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
                'fr' => array('Luminosité', 'entre -100 and 100'),
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
                'fr' => array('Gamma', 'entre 0 et 10. Défault: 1'),
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
                'fr' => array('Activer le libellé du lien', 'Avec le lien d\'activation, Google Maps n\'est chargé qu\'après que l\'utilisateur ait cliqué dessus.'),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
	),
);
