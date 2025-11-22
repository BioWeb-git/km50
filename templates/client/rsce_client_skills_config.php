<?php

return array(
	'label' => array(
		'en' => array('Bars', 'Creates bars with values'),
		'de' => array('Bars', 'Erzeugt Balken mit Werten'),
        'fr' => array('Barres', 'Crée des barres avec des valeurs'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'skills' => array(
			'label' => array(
				'en' => array('Bars', ''),
				'de' => array('Balken', ''),
                'fr' => array('Barres', ''),
            ),
			'elementLabel' => array(
				'en' => 'Bar %s',
				'de' => 'Balken %s',
                'fr' => 'Barre %s',
            ),
			'inputType' => 'list',
			'fields' => array(
				'label' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
                        'fr' => array('Titre', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'long', 'basicEntities' => true),
				),
				'size' => array(
					'label' => array(
						'en' => array('Size of the bar', 'Between 0 and 100.'),
						'de' => array('Größe des Balkens', 'Zwischen 0 und 100.'),
                        'fr' => array('Taille de la barre', 'Entre 0 et 100.'),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'value' => array(
					'label' => array(
						'en' => array('Value', 'Value shown above the bar.'),
						'de' => array('Wert', 'Wird über dem Balken angezeigt.'),
                        'fr' => array('Valeur', 'Valeur affichée au-dessus de la barre.'),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'url' => array(
					'label' => array(
						'en' => array('Link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Link-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                        'fr' => array('URL du lien', 'Example: #contact, {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
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
                        'fr' => array('Couleur de la barre', ''),
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
