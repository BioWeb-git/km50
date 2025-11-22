<?php

return array(
	'label' => array(
		'en' => array('Headline and subheadline', 'Create a headline and subheadline'),
		'de' => array('Headline und Subheadline', 'Erzeugt Unter- und Überschrift'),
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
		'icon' => array(
			'label' => array(
				'en' => array('Headline icon', ''),
				'de' => array('Headline-Icon', ''),
			),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => '', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
		),
		'headline' => array(
			'label' => array(
				'en' => array('Headline', ''),
				'de' => array('Überschrift', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'subheadline' => array(
			'label' => array(
				'en' => array('Headline 2', ''),
				'de' => array('Überschrift 2', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
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
		'headlineUnderline' => array(
			'label' => array(
				'en' => array('Remove bottom border', 'Removes the line below the headline.'),
				'de' => array('Abschlusslinie entfernen', 'Stellt unter der Headline keine Linie dar.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 clr m12'),
		),
		'headlineTracking' => array(
			'label' => array(
				'en' => array('Disable tracking', 'Disables the increased letter spacing of the headline.'),
				'de' => array('Sperrsatz deaktivieren', 'Stellt die Headline nicht im Sperrsatz (mit erhöhtem Buchstabenabstand) dar.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
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
				'en' => array('Subheadline color', 'Leave this field empty to use the default color.'),
				'de' => array('Subheadline-Farbe', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
	),
);
