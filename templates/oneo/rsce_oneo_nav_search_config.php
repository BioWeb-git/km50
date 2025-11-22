<?php

return array(
	'label' => array(
		'en' => array('Navigation search', 'Search form for the main navigation'),
		'de' => array('Navigationssuche', 'Suchformular für die Hauptnavigation'),
	),
	'types' => array('module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'search' => array(
			'label' => array(
				'en' => array('Redirect page', 'Choose the search page.'),
				'de' => array('Weiterleitungsseite', 'Wählen Sie die Suchseite aus.'),
			),
			'inputType' => 'pageTree',
		),
		'label' => array(
			'label' => array(
				'en' => array('Search caption', 'Caption of the search field.'),
				'de' => array('Suchfeld-Bezeichnung', 'Bezeichnung des Suchfeldes.'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'buttonLabel' => array(
			'label' => array(
				'en' => array('Button caption', 'Caption of the search button.'),
				'de' => array('Button-Bezeichnung', 'Bezeichnung der Schaltfläche.'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
	),
);
