<?php

return array(
	'label' => array(
		'en' => array('Tab start', 'Creates a tab'),
		'de' => array('Tab Anfang', 'Erzeugt einen Tab'),
        'fr' => array('Onglet Début', 'Crée un onglet'),
    ),
	'types' => array('content', 'module'),
	'standardFields' => array('cssID', 'space'),
	'wrapper' => array(
		'type' => 'start',
	),
	'fields' => array(
		'border' => array(
			'label' => array(
				'en' => array('Enclose with border', 'Creates a border around the content of the tab.'),
				'de' => array('Rahmen um Inhalt anzeigen', 'Umschließt den Inhalt des Tabs mit einem Rahmen.'),
                'fr' => array('Joindre avec bordure', 'Crée une bordure autour du contenu de l\'onglet.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 clr m12'),
		),
	),
);
