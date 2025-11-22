<?php

return array(
	'label' => array(
		'en' => array('Oneo Logo', 'Logo image'),
		'de' => array('Oneo Logo', 'Logo-Grafik'),
        'fr' => array('Oneo Logo', 'Image du logo'),
    ),
	'types' => array('module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'image' => array(
			'label' => array(
				'en' => array('Logo image', ''),
				'de' => array('Logo-Grafik', ''),
                'fr' => array('Image du logo', ''),
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
                'fr' => array('Alt text', 'Texte alternatif pour les moteurs de recherche ou le navigateur sans support d\'image.'),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'url' => array(
			'label' => array(
				'en' => array('Link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
				'de' => array('Link-URL', 'URL der Seite auf die das Logo verlinkt. Lassen Sie dieses Feld leer um auf die Startseite zu verlinken. Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                'fr' => array('URL du lien', 'URL de la page vers laquelle renvoie le logo. Laissez ce champ vide pour accéder à la page d\'accueil. Exemples: #contact, {{link_url::pagealias}} vers l\'alias, ID ou autre insert tag, http://example.com'),
			),
			'inputType' => 'url',
			'eval' => array('tl_class' => 'w50'),
		),
	),
);
