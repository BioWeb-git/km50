<?php

return array(
	'label' => array(
		'en' => array('Centered wrapper start', ''),
		'de' => array('Zentrierter Bereich Anfang', 'Erzeugt einen zentrierten Inhaltsbereich'),
	),
	'types' => array('content', 'module'),
	'standardFields' => array('cssID', 'space'),
	'wrapper' => array(
		'type' => 'start',
	),
	'fields' => array(
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Border settings'),
				'de' => array('Rahmeneinstellungen'),
			),
		),
		'borderTop' => array(
			'label' => array(
				'en' => array('Border top', 'Creates a line above the element'),
				'de' => array('Rahmen oben', 'Erzeugt vor dem Element eine Linie.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50'),
		),
		'borderBottom' => array(
			'label' => array(
				'en' => array('Border bottom', 'Creates a line below the element'),
				'de' => array('Rahmen unten', 'Erzeugt nach dem Element eine Linie.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50'),
		),
		'borderTopColor' => array(
			'label' => array(
				'en' => array('Border color top', 'Leave this field empty to use the default color.'),
				'de' => array('Rahmenfarbe oben', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50',
			),
		),
		'borderBottomColor' => array(
			'label' => array(
				'en' => array('Border color bottom', 'Leave this field empty to use the default color.'),
				'de' => array('Rahmenfarbe unten', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50',
			),
		),
		'borderTopWidth' => array(
			'label' => array(
				'en' => array('Border width top', ''),
				'de' => array('Rahmenbreite oben', 'Lassen Sie dieses Feld leer um die Standardbreite zu verwenden.'),
			),
			'inputType' => 'inputUnit',
			'options' => array('px', '%', 'em', 'rem', 'ex', 'pt', 'pc', 'in', 'cm', 'mm'),
			'eval' => array(
				'includeBlankOption' => true,
				'rgxp' => 'digit_auto_inherit',
				'tl_class' => 'w50',
			),
		),
		'borderBottomWidth' => array(
			'label' => array(
				'en' => array('Border width bottom', ''),
				'de' => array('Rahmenbreite unten', 'Lassen Sie dieses Feld leer um die Standardbreite zu verwenden.'),
			),
			'inputType' => 'inputUnit',
			'options' => array('px', '%', 'em', 'rem', 'ex', 'pt', 'pc', 'in', 'cm', 'mm'),
			'eval' => array(
				'includeBlankOption' => true,
				'rgxp' => 'digit_auto_inherit',
				'tl_class' => 'w50',
			),
		),
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Background'),
				'de' => array('Hintergrund'),
			),
		),
		'backgroundImage' => array(
			'label' => array(
				'en' => array('Background image or video', 'Choose an image and/or multiple video files.'),
				'de' => array('Hintergrundbild oder -Video', 'Wählen Sie ein Bild und/oder mehrere Videodateien aus.'),
			),
			'inputType' => 'fileTree',
			'eval' => array(
				'tl_class' => 'clr',
				'multiple' => true,
				'fieldType' => 'checkbox',
				'filesOnly' => true,
				'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')) . ',mp4,webm,ogv,ogg',
			),
		),
		'backgroundImageSize' => array(
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
		'backgroundRepeat' => array(
			'label' => array(
				'en' => array('Background repeat', ''),
				'de' => array('Hintergrund wiederholen', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'repeat',
				'repeat-x',
				'repeat-y',
			),
			'reference' => array(
				'' => array('en' => 'No repeat', 'de' => 'Nicht Wiederholen'),
				'repeat' => array('en' => 'Repeat', 'de' => 'Wiederholen'),
				'repeat-x' => array('en' => 'Repeat-x', 'de' => 'Horizontal Wiederholen'),
				'repeat-y' => array('en' => 'Repeat-y', 'de' => 'Vertikal Wiederholen'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'backgroundSize' => array(
			'label' => array(
				'en' => array('Background image size', ''),
				'de' => array('Hintergrundbildgröße', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'contain',
				'100% 100%',
				'auto auto',
			),
			'reference' => array(
				'' => array('en' => 'Trimmed', 'de' => 'Beschnitten'),
				'contain' => array('en' => 'Proportional', 'de' => 'Proportional'),
				'100% 100%' => array('en' => 'Distorted', 'de' => 'Verzerrt'),
				'auto auto' => array('en' => 'Original', 'de' => 'Originalgröße'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'backgroundPosition' => array(
			'label' => array(
				'en' => array('Background position', 'Can\'t be combined with the parallax effect.'),
				'de' => array('Hintergrundposition', 'Nicht mit Parallax-Effekt kombinierbar.'),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'0 0',
				'50% 0',
				'100% 0',
				'0 50%',
				'50% 50%',
				'100% 50%',
				'0 100%',
				'50% 100%',
				'100% 100%',
			),
			'reference' => array(
				'' => array('en' => '-', 'de' => '-'),
				'0 0' => array('en' => 'Left | Top', 'de' => 'Links | Oben'),
				'50% 0' => array('en' => 'Center | Top', 'de' => 'Mitte | Oben'),
				'100% 0' => array('en' => 'Right | Top', 'de' => 'Rechts | Oben'),
				'0 50%' => array('en' => 'Left | Center', 'de' => 'Links | Mitte'),
				'50% 50%' => array('en' => 'Center | Center', 'de' => 'Mitte | Mitte'),
				'100% 50%' => array('en' => 'Right | Center', 'de' => 'Rechts | Mitte'),
				'0 100%' => array('en' => 'Left | Bottom', 'de' => 'Links | Unten'),
				'50% 100%' => array('en' => 'Center | Bottom', 'de' => 'Mitte | Unten'),
				'100% 100%' => array('en' => 'Right | Bottom', 'de' => 'Rechts | Unten'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'colorVariation' => array(
			'label' => array(
				'en' => array('Predefined background color', 'Choose one of the predefined colors as background. You can customize the colors using the Theme Assistant, CSS or Sass.'),
				'de' => array('Vordefinierte Hintergrundfarbe', 'Eine der vordefinierten Farben als Hintergrund verwenden. Die Farben lassen sich mit dem Theme Assistant, CSS oder Sass anpassen.'),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-highlight-color',
				'-background-color-1',
				'-background-color-2',
			),
			'reference' => array(
				'' => array('en' => '-', 'de' => '-'),
				'-highlight-color' => array('en' => 'Highlight color', 'de' => 'Highlight-Farbe'),
				'-background-color-1' => array('en' => 'Background color 1 (dark)', 'de' => 'Hintergrundfarbe 1 (Dunkel)'),
				'-background-color-2' => array('en' => 'Background color 2 (light)', 'de' => 'Hintergrundfarbe 2 (Hell)'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'backgroundColor' => array(
			'label' => array(
				'en' => array('Custom background color', 'Overwrites the predefined color.'),
				'de' => array('Eigene Hintergrundfarbe', 'Überschreibt die vordefinierte Einstellung.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
		'backgroundVariation' => array(
			'label' => array(
				'en' => array('Background effect', ''),
				'de' => array('Hintergrundeffekt', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-background-parallax',
				'-background-mousemove',
				'-background-mousemove-inverted',
			),
			'reference' => array(
				'' => array('en' => '-', 'de' => '-'),
				'-background-parallax' => array('en' => 'Parallax', 'de' => 'Parallax'),
				'-background-mousemove' => array('en' => 'Move with mouse', 'de' => 'Mit der Maus bewegend'),
				'-background-mousemove-inverted' => array('en' => 'Move against mouse', 'de' => 'Entgegen der Maus bewegend'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'backgroundColor2' => array(
			'label' => array(
				'en' => array('Second background color', 'Create a visual edge in the background.'),
				'de' => array('Zweite Hintergrundfarbe', 'Erzeugt eine optische Kante im Hintergrund.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
		'backgroundColor2Position' => array(
			'label' => array(
				'en' => array('Second background color position', 'e.g. 50%, 100px, 10em,...'),
				'de' => array('Zweite Hintergrundfarbe Position', 'Z. B. 50%, 100px, 10em,...'),
			),
			'inputType' => 'text',
			'eval' => array(
				'tl_class' => 'w50',
			),
		),
		'colorInverted' => array(
			'label' => array(
				'en' => array('Invert text color', 'Use lighter text color for dark backgrounds and images.'),
				'de' => array('Textfarbe invertieren', 'Helle Textfarbe für dunkle Hintergründe und Fotos.'),
			),
			'inputType' => 'checkbox',
			'eval' => array(
				'tl_class' => 'w50 m12',
			),
		),
		'noBackground' => array(
			'label' => array(
				'en' => array('Remove background on', 'Removes the background image and second background color on smaller screens.'),
				'de' => array('Hintergrund entfernen ab', 'Entfernt Hintergrundbild und die zweite Hintergrundfarbe auf kleineren Bildschirmen.'),
			),
			'inputType' => 'select',
			'options' => array(
				'-no-background-mobile',
				'-no-background-tablet',
			),
			'reference' => array(
				'-no-background-mobile' => array('en' => 'Mobile (600 Pixel)', 'de' => 'Mobil (600 Pixel)'),
				'-no-background-tablet' => array('en' => 'Tablet (900 Pixel)', 'de' => 'Tablet (900 Pixel)'),
			),
			'eval' => array(
				'tl_class' => 'w50 clr',
				'includeBlankOption' => true,
			),
		),
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Height and alignment'),
				'de' => array('Höhe und Ausrichtung'),
			),
		),
		'alignment' => array(
			'label' => array(
				'en' => array('Center horizontally', 'Change horizontal align and margin to side.'),
				'de' => array('Horizontal zentrieren', 'Horizontale Ausrichtung und Abstand zum Rand ändern.'),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-fullwidth',
				'-fullwidth-padded',
			),
			'reference' => array(
				'' => array('en' => 'Centered', 'de' => 'Zentriert'),
				'-fullwidth' => array('en' => 'Fullwidth without margin', 'de' => 'Fullwidth ohne Abstand'),
				'-fullwidth-padded' => array('en' => 'Fullwidth with margin', 'de' => 'Fullwidth mit Abstand'),
			),
			'eval' => array(
				'tl_class' => 'w50',
			),
		),
		'verticalCentered' => array(
			'label' => array(
				'en' => array('Center vertically', 'Center content vertically.'),
				'de' => array('Vertikal zentrieren', 'Inhalt vertikal zentrieren.'),
			),
			'inputType' => 'checkbox',
			'eval' => array(
				'tl_class' => 'w50 m12',
			),
		),
		'height' => array(
			'label' => array(
				'en' => array('Force minimum height', 'Set the minimum height of the area to one of the values defined in the CSS.'),
				'de' => array('Mindesthöhe erzwingen', 'Setzt die Mindesthöhe des Bereiches auf einen der im CSS definierten Werte.'),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-height-small',
				'-height-medium',
				'-height-large',
				'-viewport-height',
			),
			'reference' => array(
				'' => array('en' => '-', 'de' => '-'),
				'-height-small' => array('en' => 'Low', 'de' => 'Schmal'),
				'-height-medium' => array('en' => 'Medium', 'de' => 'Mittel'),
				'-height-large' => array('en' => 'High', 'de' => 'Hoch'),
				'-viewport-height' => array('en' => 'Viewport', 'de' => 'Fensterhöhe'),
			),
			'eval' => array('tl_class' => 'w50 clr'),
		),
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Animation & Effects'),
				'de' => array('Animation & Effkte'),
			),
		),
		'fadeIn' => array(
			'label' => array(
				'en' => array('Activate fade-in effect', 'Fades the area in as soon as it\'s visible.'),
				'de' => array('Einblendeffekt aktivieren', 'Blendet den Bereich ein, sobald er ins Sichtfenster kommt.'),
			),
			'inputType' => 'checkbox',
			'eval' => array(
				'tl_class' => 'w50 m12',
			),
		),
		'doesRepeat' => array(
			'label' => array(
				'en' => array('Repeat effect', 'Repeats the effect every time the area comes into view again.'),
				'de' => array('Effekt wiederholen', 'Wiederholt der Effekt, sobald der Bereich erneut ins Sichtfenster kommt.'),
			),
			'inputType' => 'checkbox',
			'eval' => array(
				'tl_class' => 'w50 m12',
			),
		),
	),
);
