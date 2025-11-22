<?php

return array(
	'label' => array(
		'en' => array('Google Map (embed)', 'Creates a Google Map'),
		'de' => array('Google Map (embed)', 'Erzeugt eine Google Map'),
        'fr' => array('Google Map (embed)', 'Crée une carte Google'),
    ),
	'types' => array('content', 'module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'mapSrc' => array(
			'label' => array(
				'en' => array('Src from googlemap embed code', ''),
				'de' => array('Src aus dem Googlemap-Einbettungscode', ''),
                'fr' => array('Src provenant du code embed de la googlemap', ''),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'mapRatio' => array(
            'label' => array(
                'en' => array('Ratio', 'e.g. 16/9 Default 16/9'),
                'de' => array('Ratio', 'Z. B. 16/9 Standard 16/9'),
                'fr' => array('Ratio', 'e.g. 16/9 Defaut 16/9'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
		),
        'minHeight' => array(
            'label' => array(
                'en' => array('Minimum height', 'e.g. 50%, 100px, 10em,... Default 400px'),
                'de' => array('Mindesthöhe', 'Z. B. 50%, 100px, 10em,... Standard 400px'),
                'fr' => array('Hauteur minimum', 'e.g. 50%, 100px, 10em,... Defaut 400px'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'maxHeight' => array(
            'label' => array(
                'en' => array('Maximum height', 'e.g. 50%, 100px, 10em,... Default 600px'),
                'de' => array('Maximale Höhe', 'Z. B. 50%, 100px, 10em,... Standard 600px'),
                'fr' => array('Hauteur maximum', 'e.g. 50%, 100px, 10em,... Defaut 600px'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
	),
);
