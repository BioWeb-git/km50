<?php

return array(
	'label' => array(
		'en' => array('Slider Navigation', 'Creates a slider navigation with a button element'),
		'de' => array('Slider Navigation', 'Erzeugt eine Slider-Navigation mit Button'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'sliderId' => array(
			'label' => array(
				'en' => array('Slider ID', 'HTML-ID of the slider element that should be controlled.'),
				'de' => array('Slider-ID', 'HTML-ID des Slider-Elements das gesteuert werden soll.'),
			),
			'inputType' => 'text',
		),
		'buttonIcon' => array(
			'label' => array(
				'en' => array('Button-Icon'),
				'de' => array('Button-Icon'),
			),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => '', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
		),
		'buttonVariation' => array(
			'label' => array(
				'en' => array('Button variation'),
				'de' => array('Button-Variante'),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-secondary',
				'-tertiary',
			),
			'reference' => array(
				'' => array('en' => 'Default', 'de' => 'Standard'),
				'-secondary' => array('en' => 'Button 2', 'de' => 'Button 2'),
				'-tertiary' => array('en' => 'Button 3', 'de' => 'Button 3'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'buttonSize' => array(
			'label' => array(
				'en' => array('Button size'),
				'de' => array('Button-Größe'),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-small',
				'-medium',
				'-large',
				'-super-size',
			),
			'reference' => array(
				'' => array('en' => 'Default', 'de' => 'Standard'),
				'-small' => array('en' => 'Small', 'de' => 'Klein'),
				'-medium' => array('en' => 'Medium', 'de' => 'Mittel'),
				'-large' => array('en' => 'Large', 'de' => 'Groß'),
				'-super-size' => array('en' => 'Supersize', 'de' => 'Supersize'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'buttonLabel' => array(
			'label' => array(
				'en' => array('Button caption'),
				'de' => array('Button-Beschriftung'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'buttonUrl' => array(
			'label' => array(
				'en' => array('Button URL', 'Examples: {{link_url::pagealias}} (Alias, ID or other Insert tag), http://example.com'),
				'de' => array('Button-URL', 'Beispiele: {{link_url::seitenalias}} (Alias, ID oder anderer Inserttag), http://example.com'),
			),
			'inputType' => 'url',
			'eval' => array('tl_class' => 'w50'),
		),
		'newWindow' => array(
			'label' => $GLOBALS['TL_LANG']['MSC']['target'],
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
	),
);
