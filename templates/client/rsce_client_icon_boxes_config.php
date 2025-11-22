<?php

return array(
	'label' => array(
		'en' => array('Icon boxes', 'Creates boxes with icons next to each other'),
		'de' => array('Icon-Boxen', 'Erzeugt nebeneinander dargestellte Boxen mit Icons'),
        'fr' => array('Boites avec icone', 'Crée des boîtes avec des icônes côte à côte'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID', 'headline', 'columns'),
	'fields' => array(
		'textAlign' => array(
			'label' => array(
				'en' => array('Align', ''),
				'de' => array('Ausrichtung', ''),
                'fr' => array('Alignement', ''),
            ),
			'inputType' => 'select',
			'options' => array(
				'',
				'-align-center',
				'-align-left',
				'-align-right',
			),
			'reference' => array(
                '' => array('en' => '-', 'de' => '-', 'fr' => '-'),
                '-align-center' => array('en' => 'Centered', 'de' => 'Zentriert', 'fr' => 'Centré'),
                '-align-left' => array('en' => 'Left', 'de' => 'Links', 'fr' => 'Gauche'),
                '-align-right' => array('en' => 'Right', 'de' => 'Rechts', 'fr' => 'Droite'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'iconType' => array(
			'label' => array(
				'en' => array('Icon variation', ''),
				'de' => array('Anzeigevariante der Icons', ''),
                'fr' => array('Variante d\'icône', ''),
            ),
			'inputType' => 'select',
			'options' => array(
				'',
				'-headline-icon',
			),
			'reference' => array(
				'' => array('en' => 'Default', 'de' => 'Standard', 'fr' => 'Défaut'),
				'-headline-icon' => array('en' => 'Icons next to headline', 'de' => 'Icons neben den Überschriften', 'fr' => 'Icônes à côté des titres'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
        'iconGeneralSize' => array(
            'label' => array(
                'en' => array('Image width and height', ''),
                'de' => array('Bildbreite und Bildhöhe', ''),
                'fr' => array('Largeur et hauteur générales des icônes image', 'Définir la taille de tous les icônes'),
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
        'iconFontSize' => array(
            'label' => array('Font Size de l\'icône image', 'Précisez l\'unité ex: 1em'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50 clr')
        ),
        'iconWidth' => array(
            'label' => array('Largeur de la zone de l\'icône image', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50 clr')
        ),
        'iconHeight' => array(
            'label' => array('Hauteur de la zone de l\'icône image', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'iconPadding' => array(
            'label' => array('Marge interne de l\'icône', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
		'iconColor' => array(
			'label' => array(
				'en' => array('Icon color', ''),
				'de' => array('Icon-Farbe', ''),
                'fr' => array('Couleur de l\'icône', ''),
            ),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
        'iconRadius' => array(
            'label' => array('Arrondir les angles du cadre de l\'icônes', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'iconBorderWidth' => array(
            'label' => array('Epaisseur du bord du cadre de l\'icônes', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'iconBorderColor' => array(
            'label' => array('Couleur du contour du cadre de l\'icônes', ''),
            'inputType' => 'text',
            'eval' => array(
                'colorpicker' => true,
                'tl_class' => 'w50 wizard',
            ),
        ),
        'iconBackgroundColor' => array(
            'label' => array(
                'en' => array('Icon background color', ''),
                'fr' => array('Couleur de fond des icônes', ''),
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
                'fr' => array('Couleur de fond des boîtes', ''),
            ),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
        'boxPadding' => array(
            'label' => array('Marge interne des boîtes', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'boxRadius' => array(
            'label' => array('Arrondir les angles', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'linkVariation' => array(
            'label' => array(
                'en' => array('Button variation', ''),
                'de' => array('Buttonvariante', ''),
                'fr' => array('Variante de bouton', ''),
            ),
            'inputType' => 'select',
            'options' => array(
                '-link',
                'button',
                'button -secondary',
                'button -tertiary',
            ),
            'reference' => array(
                '-link' => array('en' => 'Link', 'de' => 'Link', 'fr' => 'Lien'),
                'button' => array('en' => 'Button 1', 'de' => 'Button 1', 'fr' => 'Bouton 1'),
                'button -secondary' => array('en' => 'Button 2', 'de' => 'Button 2', 'fr' => 'Bouton 2'),
                'button -tertiary' => array('en' => 'Button 3', 'de' => 'Button 3', 'fr' => 'Bouton 3'),
            ),
            'eval' => array('tl_class' => 'w50'),
        ),
		'colorInverted' => array(
			'label' => array(
				'en' => array('Invert text color', 'Lighter text color for dark backgrounds and images.'),
				'de' => array('Textfarbe invertieren', 'Helle Textfarbe für dunkle Hintergründe und Fotos.'),
                'fr' => array('Inverser la couleur du texte', 'Couleur de texte plus claire pour les arrière-plans et les images sombres.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array(
				'tl_class' => 'w50 m12',
			),
		),
        'headlineTag' => array(
            'label' => array('Balise titre', ''),
            'inputType' => 'select',
            'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span'),
            'eval' => array('maxlength'=>200, 'tl_class' => 'w50'),
        ),
		'boxes' => array(
			'label' => array(
                'en' => array('Boxes', ''),
                'de' => array('Boxen', ''),
                'fr' => array('Boites', ''),
			),
			'elementLabel' => array(
                'en' => 'Box %s',
                'de' => 'Box %s',
                'fr' => 'Boîte %s',
            ),
			'inputType' => 'list',
			'fields' => array(
				'icon' => array(
					'label' => array(
						'en' => array('Icon', ''),
						'de' => array('Icon', ''),
                        'fr' => array('Icône', ''),
                    ),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array('tl_class' => 'clr', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
				),
				'iconColor' => array(
					'label' => array(
						'en' => array('Icon color', ''),
						'de' => array('Icon-Farbe', ''),
                        'fr' => array('Couleur de l\'icône', ''),
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
                        'fr' => array('Couleur de l\'arrière plan', ''),
                    ),
					'inputType' => 'text',
					'eval' => array(
						'colorpicker' => true,
						'tl_class' => 'w50 wizard',
					),
				),
                'iconImage' => array(
                    'label' => array('Icône image', 'Prioritaire sur l\'icône'),
                    'inputType' => 'fileTree',
                    'eval' => array(
                        'tl_class' => 'w50',
                        'filesOnly' => true,
                        'fieldType' => 'radio',
                        'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')),
                    ),
                ),
                'iconSize' => array(
                    'label' => array(
                        'en' => array('Image width and height', ''),
                        'de' => array('Bildbreite und Bildhöhe', ''),
                        'fr' => array('Largeur et hauteur de l\'icône', 'Surcharge la taille générale'),
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
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
                        'titre' => array('Titre', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'long clr', 'basicEntities' => true),
				),
				'text' => array(
					'label' => array(
						'en' => array('Text', ''),
						'de' => array('Text', ''),
                        'fr' => array('Texte', ''),
                    ),
					'inputType' => 'textarea',
					'eval' => array('rte' => 'tinyMCE', 'basicEntities' => true),
				),
				'url' => array(
					'label' => array(
						'en' => array('Link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Link-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                        'fr' => array('URL du lien', 'Exemples: #contact, {{link_url::pagealias}} vers l\'alias, ID ou autre insert tag, http://example.com'),
                    ),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
				),
				'linkLabel' => array(
					'label' => array(
						'en' => array('Link caption', ''),
						'de' => array('Link-Bezeichnung', ''),
                        'fr' => array('Légende du lien', ''),
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
