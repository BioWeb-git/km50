<?php

return array(
	'label' => array(
		'en' => array('Feature boxe', 'Create an area with text, image/video and background image'),
		'de' => array('Feature-Box', 'Erzeugt einen Bereich mit Text, Bild/Video und Hintergrundbild'),
        'fr' => array('Boîte de mise en avant', 'Créer une zone avec texte, image/vidéo et image de fond'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID', 'headline'),
	'fields' => array(
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Image settings'),
				'de' => array('Bildeinstellungen'),
                'fr' => array('Paramètres de l\'image'),
            ),
		),
		'image' => array(
			'label' => array(
				'en' => array('Feature image or video', 'Choose an image or multiple video files.'),
				'de' => array('Feature-Bild oder -Video', 'Wählen Sie ein Bild oder mehrere Videodateien aus.'),
                'fr' => array('Mise en avant d\'une image ou vidéo de fond', 'Choisissez une image et/ou plusieurs fichiers vidéo.'),
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
                'fr' => array('Largeur et hauteur de l\'image', ''),
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
				'fr' => array('Position de l\'image', ''),
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
				'-image-right -vertical-centered -image-after-text' => array('en' => 'Right centered', 'de' => 'Rechts zentriert', 'fr' => 'Droite Centré'),
				'-image-right -image-top' => array('en' => 'Right top', 'de' => 'Rechts oben', 'fr' => 'Droite Haut'),
				'-image-right -image-bottom' => array('en' => 'Right bottom', 'de' => 'Rechts unten', 'fr' => 'Droite Bas'),
				'-vertical-centered -image-left' => array('en' => 'Left centered', 'de' => 'Links zentriert', 'fr' => 'Gauche Centré'),
				'-image-left -image-top' => array('en' => 'Left top', 'de' => 'Links oben', 'fr' => 'Gauche Haut'),
				'-image-left -image-bottom' => array('en' => 'Left bottom', 'de' => 'Links unten', 'fr' => 'Gauche Bas'),
				'-image-centered' => array('en' => 'Centered top', 'de' => 'Oben zentriert', 'fr' => 'Centré Haut'),
				'-image-centered -image-after-text' => array('en' => 'Centered bottom', 'de' => 'Unten zentriert', 'fr' => 'Centré Bas'),
				'-image-centered -vertical-centered -no-image' => array('en' => 'Centered without image', 'de' => 'Zentriert ohne Bild', 'fr' => 'Centré sans image'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'imageAnimationType' => array(
			'label' => array(
				'en' => array('Image animation', ''),
				'de' => array('Bild Animation', 'Art der Animation'),
				'fr' => array('Animation de l\'image', 'Type d\'animation'),
			),
			'inputType' => 'select',
			'options' => array(
				'not-animated',
				'-fade',
				'-move',
				'-move -fade',
			),
			'reference' => array(
				'not-animated' => array('en' => 'None', 'de' => 'Keine', 'fr' => 'Aucune'),
				'-fade' => array('en' => 'Fade-in', 'de' => 'Einblenden', 'fr' => 'Fondu'),
				'-move' => array('en' => 'Move', 'de' => 'Bewegen', 'fr' => 'Mouvement'),
				'-move -fade' => array('en' => 'Fade + move', 'de' => 'Einblenden + Bewegen', 'fr' => 'Fondu + Mouvement'),
			),
			'eval' => array('tl_class' => 'w50 clr'),
		),
		'imageAnimationDirection' => array(
			'label' => array(
				'en' => array('Image animation direction', ''),
				'de' => array('Bild Animationsrichtung', ''),
                'fr' => array('Direction de l\'animation de l\'image', ''),
            ),
			'inputType' => 'select',
			'options' => array(
				'-move-left',
				'-move-right',
				'-move-top',
				'-move-bottom',
			),
			'reference' => array(
				'-move-left' => array('en' => 'To left', 'de' => 'Nach links', 'fr' => 'Vers la gauche'),
				'-move-right' => array('en' => 'To right', 'de' => 'Nach rechts', 'fr' => 'Vers la droite'),
				'-move-top' => array('en' => 'To top', 'de' => 'Nach oben', 'fr' => 'Vers le haut'),
				'-move-bottom' => array('en' => 'To bottom', 'de' => 'Nach unten', 'fr' => 'Vers le bas'),
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
                'fr' => array('Image circulaire', 'Créez une image circulaire si l\'image est carrée.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'largeImage' => array(
			'label' => array(
				'en' => array('Large image', 'Enlarges the image area in relation to the text.'),
				'de' => array('Großes Bild', 'Vergrößert den Bildbereich in Relation zum Text.'),
                'fr' => array('Grande image', 'Agrandit la zone de l\'image par rapport au texte.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Text & content'),
				'de' => array('Text & Inhalt'),
                'fr' => array('Texte & contenu'),
            ),
		),
		'subHeadline' => array(
			'label' => array(
				'en' => array('Subheadline', ''),
				'de' => array('Unterüberschrift', ''),
                'fr' => array('Sous-titre', ''),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
		),
		'text' => array(
			'label' => array(
				'en' => array('Text', ''),
				'de' => array('Text', ''),
                'fr' => array('Texte', ''),
            ),
			'inputType' => 'textarea',
			'eval' => array(
				'rte' => 'tinyMCE',
				'tl_class' => 'clr',
                'basicEntities' => true
			),
		),
		'textAnimationType' => array(
			'label' => array(
				'en' => array('Text animation', ''),
				'de' => array('Text Animation', ''),
                'fr' => array('Animation du texte', ''),
            ),
			'inputType' => 'select',
			'options' => array(
				'not-animated',
				'-fade',
				'-move',
				'-move -fade',
			),
			'reference' => array(
                'not-animated' => array('en' => 'None', 'de' => 'Keine', 'fr' => 'Aucune'),
                '-fade' => array('en' => 'Fade-in', 'de' => 'Einblenden', 'fr' => 'Fondu'),
                '-move' => array('en' => 'Move', 'de' => 'Bewegen', 'fr' => 'Mouvement'),
                '-move -fade' => array('en' => 'Fade + move', 'de' => 'Einblenden + Bewegen', 'fr' => 'Fondu + Mouvement'),
			),
			'eval' => array('tl_class' => 'w50 clr'),
		),
		'textAnimationDirection' => array(
			'label' => array(
				'en' => array('Text animation direction', ''),
				'de' => array('Text Animationsrichtung', ''),
                'fr' => array('Direction de l\'animation du texte', ''),
            ),
			'inputType' => 'select',
			'options' => array(
				'-move-left',
				'-move-right',
				'-move-top',
				'-move-bottom',
			),
			'reference' => array(
                '-move-left' => array('en' => 'To left', 'de' => 'Nach links', 'fr' => 'Vers la gauche'),
                '-move-right' => array('en' => 'To right', 'de' => 'Nach rechts', 'fr' => 'Vers la droite'),
                '-move-top' => array('en' => 'To top', 'de' => 'Nach oben', 'fr' => 'Vers le haut'),
                '-move-bottom' => array('en' => 'To bottom', 'de' => 'Nach unten', 'fr' => 'Vers le bas'),
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
                'fr' => array('Paramètres du lien'),
            ),
		),
		'linkIcon' => array(
			'label' => array(
				'en' => array('Link icon', ''),
				'de' => array('Link-Icon', ''),
                'fr' => array('Icône du lien', ''),
            ),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
		),
		'linkLabel' => array(
			'label' => array(
				'en' => array('Button caption', ''),
				'de' => array('Button-Text', ''),
                'fr' => array('Texte du bouton', ''),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
		),
		'linkUrl' => array(
			'label' => array(
				'en' => array('Button URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
				'de' => array('Button-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                'fr' => array('URL du bouton', 'Example: #contact, {{link_url::pagealias}} vers l\'alias, ID ou autre insert tag, http://example.com'),
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
                'fr' => array('Variante de bouton', ''),
            ),
			'inputType' => 'select',
			'options' => array(
				'',
				'-secondary',
			),
			'reference' => array(
				'' => array('en' => 'Default', 'de' => 'Standard', 'fr' => 'Défaut'),
				'-secondary' => array('en' => 'Button 2', 'de' => 'Button 2', 'fr' => 'Bouton 2'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'imageLink' => array(
			'label' => array(
				'en' => array('Link image', 'Makes the image clickable.'),
				'de' => array('Bild verlinken', 'Macht die ausgewählte Grafik „klickbar“.'),
                'fr' => array('Lien de l\'image', 'Rend l\'image cliquable'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		array(
			'inputType' => 'group',
			'label' => array(
				'en' => array('Size and height'),
				'de' => array('Größe und Höhe'),
                'fr' => array('Taille et hauteur'),
            ),
		),
		'headlineSize' => array(
			'label' => array(
				'en' => array('Headline size', 'Font size of the headline.'),
				'de' => array('Headline-Größe', 'Schriftgröße der Headline.'),
                'fr' => array('Taille du titre', 'Taille de la police du titre.'),
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
                '' => array('en' => 'Default', 'de' => 'Standard', 'fr' => 'Défaut'),
                '-small' => array('en' => 'Small', 'de' => 'Klein', 'fr' => 'Petit'),
                '-medium' => array('en' => 'Medium', 'de' => 'Mittel', 'fr' => 'Moyen'),
                '-large' => array('en' => 'Large', 'de' => 'Groß', 'fr' => 'Gros'),
                '-super-size' => array('en' => 'Supersize', 'de' => 'Supersize', 'fr' => 'Plus gros'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'height' => array(
			'label' => array(
				'en' => array('Force minimum height', 'Set the minimum height of the area to one of the values defined in the CSS.'),
				'de' => array('Mindesthöhe erzwingen', 'Setzt die Mindesthöhe des Bereiches auf einen der im CSS definierten Werte.'),
                'fr' => array('Forcer la hauteur minimale', 'Définissez la hauteur minimale de la zone sur l\'une des valeurs définies dans le CSS.'),
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
				'-small' => array('en' => 'Low', 'de' => 'Schmal', 'fr' => 'Petit'),
				'-medium' => array('en' => 'Medium', 'de' => 'Mittel', 'fr' => 'Moyen'),
				'-large' => array('en' => 'High', 'de' => 'Hoch', 'fr' => 'Grand'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
	),
);
