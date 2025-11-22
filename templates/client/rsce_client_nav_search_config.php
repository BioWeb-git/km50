<?php

return array(
	'label' => array(
		'en' => array('Navigation search', 'Search form for the main navigation'),
		'de' => array('Navigationssuche', 'Suchformular für die Hauptnavigation'),
        'fr' => array('Menu de recherche', 'Formulaire de recherche pour la navigation principale'),
    ),
	'types' => array('module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'search' => array(
			'label' => array(
				'en' => array('Redirect page', 'Choose the search page.'),
				'de' => array('Weiterleitungsseite', 'Wählen Sie die Suchseite aus.'),
                'fr' => array('Page de redirection', 'Choisissez la page de recherche.'),
            ),
			'inputType' => 'pageTree',
		),
		'label' => array(
			'label' => array(
				'en' => array('Search caption', 'Caption of the search field.'),
				'de' => array('Suchfeld-Bezeichnung', 'Bezeichnung des Suchfeldes.'),
                'fr' => array('Légende de recherche', 'Légende du champ de recherche.'),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
		),
		'buttonLabel' => array(
			'label' => array(
				'en' => array('Button caption', 'Caption of the search button.'),
				'de' => array('Button-Bezeichnung', 'Bezeichnung der Schaltfläche.'),
                'fr' => array('Légende du bouton', 'Légende du bouton de recherche.'),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
		),
	),
);
