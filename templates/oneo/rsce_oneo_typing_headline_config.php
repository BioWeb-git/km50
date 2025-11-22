<?php

return array(
	'label' => array(
		'en' => array('Animated headline', 'Create one or two headlines featuring a typewriter effect'),
		'de' => array('Animierte Überschrift', 'Erzeugt ein oder zwei Überschriften mit einer Schreibanimation'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'space'),
	'fields' => array(
		'textAlign' => array(
			'label' => array(
				'en' => array('Text align', ''),
				'de' => array('Textausrichtung', ''),
			),
			'inputType' => 'select',
			'options' => array('', '-align-left', '-align-right'),
			'reference' => array(
				'' => array('en' => 'Centered', 'de' => 'Zentriert'),
				'-align-left' => array('en' => 'Left', 'de' => 'Linksbündig'),
				'-align-right' => array('en' => 'Right', 'de' => 'Rechtsbündig'),
			),
		),
		'headline' => array(
			'label' => array(
				'en' => array('Headline'),
				'de' => array('Überschrift'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'long'),
		),
		'subheadline' => array(
			'label' => array(
				'en' => array('Headline 2'),
				'de' => array('Überschrift 2'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'long'),
		),
		'text' => array(
			'label' => array(
				'en' => array('Text'),
				'de' => array('Text'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'long'),
		),
		'headlineColor' => array(
			'label' => array(
				'en' => array('Headline color', 'Leave empty to use the default color.'),
				'de' => array('Headline-Farbe', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
		'subHeadlineColor' => array(
			'label' => array(
				'en' => array('Headline color 2', 'Leave empty to use the default color.'),
				'de' => array('Headline-Farbe 2', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
		'textColor' => array(
			'label' => array(
				'en' => array('Text color', 'Leave empty to use the default color.'),
				'de' => array('Textfarbe', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
		'headlineSize' => array(
			'label' => array(
				'en' => array('Headline size', 'Font size of the headline.'),
				'de' => array('Headline-Größe', 'Schriftgröße der Headline.'),
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
		'notBold' => array(
			'label' => array(
				'en' => array('Normal font weight', 'Display headline in normal font weight.'),
				'de' => array('Überschrift nicht Fett', 'Stellt die Headline nicht fett dar.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 clr m12'),
		),
		'doesRepeat' => array(
			'label' => array(
				'en' => array('Repeat the animation', 'Repeats the animation every time the elements comes into view.'),
				'de' => array('Animation wiederholen', 'Wiederholt die Animation bei jeder Ansicht.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50'),
		),
		'description' => array(
			'label' => array(
				'en' => array('Button', 'Add a button to the headline.'),
				'de' => array('Button', 'Hier können Sie den Überschriften einen Button hinzufügen.'),
			),
			'inputType' => 'group',
		),
		'icon' => array(
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
		'smallButton' => array(
			'label' => array(
				'en' => array('Small button', 'Show the small variation of the button.'),
				'de' => array('Kleiner Button', 'Kleine Variante des Button anzeigen.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
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
			'eval' => array('tl_class' => 'w50'),
		),
	),
);
