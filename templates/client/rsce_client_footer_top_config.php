<?php

return array(
	'label' => array(
		'en' => array('Oneo footer to top link', 'To top link in the footer'),
		'de' => array('Oneo Footer-Top-Link', 'Top-Link in der Fußzeile'),
        'fr' => array('Oneo footer Retour en haut', 'Lien vers haut de page dans le pied de page'),
    ),
	'types' => array('module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'text' => array(
			'label' => array(
				'en' => array('Top link caption', ''),
				'de' => array('Top-Link-Text', ''),
                'fr' => array('Légende du lien supérieur', ''),
            ),
			'inputType' => 'text',
		),
	),
);
