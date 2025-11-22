<?php

return array(
	'label' => array(
		'en' => array('Feature boxe', 'Create an area with text, image/video and background image'),
		'de' => array('Feature-Box', 'Erzeugt einen Bereich mit Text, Bild/Video und Hintergrundbild'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'headline'),
	'fields' => array(
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Image settings'),
				'de' => array('Bildeinstellungen'),
			),
		),
		'image' => array(
			'label' => array(
				'en' => array('Feature image or video', 'Choose an image or multiple video files.'),
				'de' => array('Feature-Bild oder -Video', 'Wählen Sie ein Bild oder mehrere Videodateien aus.'),
			),
			'inputType' => 'fileTree',
			'eval' => array(
				'multiple' => true,
				'fieldType' => 'checkbox',
				'filesOnly' => true,
				'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')) . ',mp4,webm,ogv,ogg',
			),
		),
		'imageSize' => array(
			'label' => array(
				'en' => array('Image width and height', ''),
				'de' => array('Bildbreite und Bildhöhe', ''),
			),
			'inputType' => 'imageSize',
			'options' => Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions(),
			'reference' => &$GLOBALS['TL_LANG']['MSC'],
			'eval' => array(
				'rgxp' => 'digit',
				'tl_class' => 'w50',
				'includeBlankOption' => true,
			),
		),
		'imagePosition' => array(
			'label' => array(
				'en' => array('Image position', ''),
				'de' => array('Bildposition', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'-image-right -vertical-centered -image-after-text',
				'-image-right -image-top',
				'-image-right -image-bottom',
				'-vertical-centered -image-left',
				'-image-left -image-top',
				'-image-left -image-bottom',
				'-image-centered',
				'-image-centered -image-after-text',
				'-image-centered -vertical-centered -no-image',
			),
			'reference' => array(
				'-image-right -vertical-centered -image-after-text' => array('en' => 'Right centered', 'de' => 'Rechts zentriert'),
				'-image-right -image-top' => array('en' => 'Right top', 'de' => 'Rechts oben'),
				'-image-right -image-bottom' => array('en' => 'Right bottom', 'de' => 'Rechts unten'),
				'-vertical-centered -image-left' => array('en' => 'Left centered', 'de' => 'Links zentriert'),
				'-image-left -image-top' => array('en' => 'Left top', 'de' => 'Links oben'),
				'-image-left -image-bottom' => array('en' => 'Left bottom', 'de' => 'Links unten'),
				'-image-centered' => array('en' => 'Centered top', 'de' => 'Oben zentriert'),
				'-image-centered -image-after-text' => array('en' => 'Centered bottom', 'de' => 'Unten zentriert'),
				'-image-centered -vertical-centered -no-image' => array('en' => 'Centered without image', 'de' => 'Zentriert ohne Bild'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'imageAnimationType' => array(
			'label' => array(
				'en' => array('Image animation', ''),
				'de' => array('Bild Animation', 'Art der Animation'),
			),
			'inputType' => 'select',
			'options' => array(
				'not-animated',
				'-fade',
				'-move',
				'-move -fade',
			),
			'reference' => array(
				'not-animated' => array('en' => 'None', 'de' => 'Keine'),
				'-fade' => array('en' => 'Fade-in', 'de' => 'Einblenden'),
				'-move' => array('en' => 'Move', 'de' => 'Bewegen'),
				'-move -fade' => array('en' => 'Fade + move', 'de' => 'Einblenden + Bewegen'),
			),
			'eval' => array('tl_class' => 'w50 clr'),
		),
		'imageAnimationDirection' => array(
			'label' => array(
				'en' => array('Image animation direction', ''),
				'de' => array('Bild Animationsrichtung', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'-move-left',
				'-move-right',
				'-move-top',
				'-move-bottom',
			),
			'reference' => array(
				'-move-left' => array('en' => 'To left', 'de' => 'Nach links'),
				'-move-right' => array('en' => 'To right', 'de' => 'Nach rechts'),
				'-move-top' => array('en' => 'To top', 'de' => 'Nach oben'),
				'-move-bottom' => array('en' => 'To bottom', 'de' => 'Nach unten'),
			),
			'eval' => array(
				'tl_class' => 'w50',
				'includeBlankOption' => true,
			),
		),
		'imageRounded' => array(
			'label' => array(
				'en' => array('Circular image', 'Create a circular image if the image is square.'),
				'de' => array('Bild abrunden', 'Stellt das Bild als Kreis dar, sofern quadratisch.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'largeImage' => array(
			'label' => array(
				'en' => array('Large image', 'Enlarges the image area in relation to the text.'),
				'de' => array('Großes Bild', 'Vergrößert den Bildbereich in Relation zum Text.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Text & content'),
				'de' => array('Text & Inhalt'),
			),
		),
		'subHeadline' => array(
			'label' => array(
				'en' => array('Subheadline', ''),
				'de' => array('Unterüberschrift', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'text' => array(
			'label' => array(
				'en' => array('Text', ''),
				'de' => array('Text', ''),
			),
			'inputType' => 'textarea',
			'eval' => array(
				'rte' => 'tinyMCE',
				'tl_class' => 'clr',
			),
		),
		'textAnimationType' => array(
			'label' => array(
				'en' => array('Text animation', ''),
				'de' => array('Text Animation', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'not-animated',
				'-fade',
				'-move',
				'-move -fade',
			),
			'reference' => array(
				'not-animated' => array('en' => 'None', 'de' => 'Keine'),
				'-fade' => array('en' => 'Fade-in', 'de' => 'Einblenden'),
				'-move' => array('en' => 'Move', 'de' => 'Bewegen'),
				'-move -fade' => array('en' => 'Fade + move', 'de' => 'Einblenden + Bewegen'),
			),
			'eval' => array('tl_class' => 'w50 clr'),
		),
		'textAnimationDirection' => array(
			'label' => array(
				'en' => array('Text animation direction', ''),
				'de' => array('Text Animationsrichtung', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'-move-left',
				'-move-right',
				'-move-top',
				'-move-bottom',
			),
			'reference' => array(
				'-move-left' => array('en' => 'To left', 'de' => 'Nach links'),
				'-move-right' => array('en' => 'To right', 'de' => 'Nach rechts'),
				'-move-top' => array('en' => 'To top', 'de' => 'Nach oben'),
				'-move-bottom' => array('en' => 'To bottom', 'de' => 'Nach unten'),
			),
			'eval' => array(
				'tl_class' => 'w50',
				'includeBlankOption' => true,
			),
		),
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Link settings'),
				'de' => array('Link-Einstellungen'),
			),
		),
		'linkIcon' => array(
			'label' => array(
				'en' => array('Link icon', ''),
				'de' => array('Link-Icon', ''),
			),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => '', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
		),
		'linkLabel' => array(
			'label' => array(
				'en' => array('Button caption', ''),
				'de' => array('Button-Text', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'linkUrl' => array(
			'label' => array(
				'en' => array('Button URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
				'de' => array('Button-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
			),
			'inputType' => 'url',
			'eval' => array('tl_class' => 'w50'),
		),
		'newWindow' => array(
			'label' => $GLOBALS['TL_LANG']['MSC']['target'],
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50'),
		),
		'linkVariation' => array(
			'label' => array(
				'en' => array('Button variation', ''),
				'de' => array('Buttonvariante', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-secondary',
			),
			'reference' => array(
				'' => array('en' => 'Default', 'de' => 'Standard'),
				'-secondary' => array('en' => 'Button 2', 'de' => 'Button 2'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'imageLink' => array(
			'label' => array(
				'en' => array('Link image', 'Makes the image clickable.'),
				'de' => array('Bild verlinken', 'Macht die ausgewählte Grafik „klickbar“.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Size and height'),
				'de' => array('Größe und Höhe'),
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
		'height' => array(
			'label' => array(
				'en' => array('Force minimum height', 'Set the minimum height of the area to one of the values defined in the CSS.'),
				'de' => array('Mindesthöhe erzwingen', 'Setzt die Mindesthöhe des Bereiches auf einen der im CSS definierten Werte.'),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-small',
				'-medium',
				'-large',
			),
			'reference' => array(
				'' => array('en' => '-', 'de' => '-'),
				'-small' => array('en' => 'Low', 'de' => 'Schmal'),
				'-medium' => array('en' => 'Medium', 'de' => 'Mittel'),
				'-large' => array('en' => 'High', 'de' => 'Hoch'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
	),
);
