<?php

return array(
	'label' => array(
		'en' => array('Horizontal ruler w/ icon/headline', 'Creates a horizontal line with optional headline'),
		'de' => array('Trennlinie mit Icon/Überschrift', 'Erzeugt eine horizontale Linie mit einer optionalen Überschrift'),
	),
	'types' => array('content', 'module'),
	'standardFields' => array('cssID', 'headline', 'space'),
	'fields' => array(
		'hrVariation' => array(
			'label' => array(
				'en' => array('Variation', ''),
				'de' => array('Anzeigevariante', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-hr-dotted',
				'-hr-shadow',
			),
			'reference' => array(
				'' => array('en' => 'Default', 'de' => 'Standard'),
				'-hr-dotted' => array('en' => 'Dotted', 'de' => 'Gepunkted'),
				'-hr-shadow' => array('en' => 'Drop shadow', 'de' => 'Mit Schatten'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'align' => array(
			'label' => array(
				'en' => array('Align', ''),
				'de' => array('Ausrichtung', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-centered',
				'-align-right',
			),
			'reference' => array(
				'' => array('en' => 'Left', 'de' => 'Links'),
				'-centered' => array('en' => 'Centered', 'de' => 'Zentriert'),
				'-align-right' => array('en' => 'Right', 'de' => 'Rechts'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'icon' => array(
			'label' => array(
				'en' => array('Icon', ''),
				'de' => array('Icon', ''),
			),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => 'clr', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
		),
	),
);
