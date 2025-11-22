<?php

return array(
	'label' => array(
		'en' => array('Icon boxes', 'Creates boxes with icons next to each other'),
		'de' => array('Icon-Boxen', 'Erzeugt nebeneinander dargestellte Boxen mit Icons'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'headline', 'columns'),
	'fields' => array(
		'textAlign' => array(
			'label' => array(
				'en' => array('Align', ''),
				'de' => array('Ausrichtung', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-align-left',
				'-align-right',
			),
			'reference' => array(
				'' => array('en' => 'Centered', 'de' => 'Zentriert'),
				'-align-left' => array('en' => 'Left', 'de' => 'Links'),
				'-align-right' => array('en' => 'Right', 'de' => 'Rechts'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'iconType' => array(
			'label' => array(
				'en' => array('Icon variation', ''),
				'de' => array('Anzeigevariante der Icons', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-inverted-icon',
				'-headline-icon',
			),
			'reference' => array(
				'' => array('en' => 'Default', 'de' => 'Standard'),
				'-inverted-icon' => array('en' => 'Icons inverted', 'de' => 'Icons invertiert'),
				'-headline-icon' => array('en' => 'Icons next to headline', 'de' => 'Icons neben den Überschriften'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'linkVariation' => array(
			'label' => array(
				'en' => array('Button variation', ''),
				'de' => array('Buttonvariante', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'-link',
				'button',
				'button -secondary',
			),
			'reference' => array(
				'-link' => array('en' => 'Link', 'de' => 'Link'),
				'button' => array('en' => 'Button 1', 'de' => 'Button 1'),
				'button -secondary' => array('en' => 'Button 2', 'de' => 'Button 2'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'iconColor' => array(
			'label' => array(
				'en' => array('Icon color', ''),
				'de' => array('Icon-Farbe', ''),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
		'backgroundColor' => array(
			'label' => array(
				'en' => array('Box background color', ''),
				'de' => array('Hintergrundfarbe der Boxen', ''),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
		'colorInverted' => array(
			'label' => array(
				'en' => array('Invert text color', 'Lighter text color for dark backgrounds and images.'),
				'de' => array('Textfarbe invertieren', 'Helle Textfarbe für dunkle Hintergründe und Fotos.'),
			),
			'inputType' => 'checkbox',
			'eval' => array(
				'tl_class' => 'w50 m12',
			),
		),
		'boxes' => array(
			'label' => array(
				'en' => array('Boxes', ''),
				'de' => array('Boxen', ''),
			),
			'elementLabel' => '%s. Box',
			'inputType' => 'list',
			'fields' => array(
				'icon' => array(
					'label' => array(
						'en' => array('Icon', ''),
						'de' => array('Icon', ''),
					),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array('tl_class' => 'clr', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
				),
				'iconColor' => array(
					'label' => array(
						'en' => array('Icon color', ''),
						'de' => array('Icon-Farbe', ''),
					),
					'inputType' => 'text',
					'eval' => array(
						'colorpicker' => true,
						'tl_class' => 'w50 wizard',
					),
				),
				'backgroundColor' => array(
					'label' => array(
						'en' => array('Background color', ''),
						'de' => array('Hintergrundfarbe', ''),
					),
					'inputType' => 'text',
					'eval' => array(
						'colorpicker' => true,
						'tl_class' => 'w50 wizard',
					),
				),
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'long clr'),
				),
				'text' => array(
					'label' => array(
						'en' => array('Text', ''),
						'de' => array('Text', ''),
					),
					'inputType' => 'textarea',
					'eval' => array('rte' => 'tinyMCE'),
				),
				'url' => array(
					'label' => array(
						'en' => array('Link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Link-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
					),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
				),
				'linkLabel' => array(
					'label' => array(
						'en' => array('Link caption', ''),
						'de' => array('Link-Bezeichnung', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'newWindow' => array(
					'label' => $GLOBALS['TL_LANG']['MSC']['target'],
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'clr'),
				),
			),
		),
	),
);
