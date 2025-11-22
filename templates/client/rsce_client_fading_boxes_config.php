<?php

return array(
	'label' => array(
		'en' => array('Animated Boxes', 'Creates boxes with image, icon and text next to each other'),
		'de' => array('Animierte Boxen', 'Erzeugt nebeneinander dargestellte Boxen mit Bild, Icon und Text'),
        'fr' => array('Boites animées', 'Crée des boîtes avec image, icône et texte les uns à côté des autres'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID', 'columns', 'headline'),
	'fields' => array(
		'linkVariation' => array(
			'label' => array(
				'en' => array('Button variation', ''),
				'de' => array('Buttonvariante', ''),
                'fr' => array('Variante de bouton', ''),
            ),
			'inputType' => 'select',
			'options' => array(
				'' => 'Button 1',
				'-secondary' => 'Button 2',
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'headlineTag' => array(
            'label' => array('Balise titre', ''),
            'inputType' => 'select',
            'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span'),
            'eval' => array('maxlength'=>200, 'tl_class' => 'w50'),
        ),
		'size' => array(
			'inputType' => 'standardField',
			'eval' => array('tl_class' => 'w50'),
		),
		'backgroundColor' => array(
			'label' => array(
				'en' => array('Background color', 'Leave this field empty to use the default color.'),
				'de' => array('Hintergrundfarbe', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
                'fr' => array('Couleur de l\'arrière plan', 'Laissez ce champ vide pour utiliser la couleur par défaut.'),
            ),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50',
			),
		),
		'textShadow' => array(
			'label' => array(
				'en' => array('Add drop shadow', 'Shows a drop shadow around the headline to increase the readability above images.'),
				'de' => array('Schlagschatten aktivieren', 'Zeigt einen Schlagschatten um die Headline an um die Lesbarkeit über Bildern zu erhöhen.'),
                'fr' => array('Ajouter une ombre portée', 'Affiche une ombre portée autour du titre pour augmenter la lisibilité au-dessus des images.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
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
				'image' => array(
					'label' => array(
						'en' => array('Image', ''),
						'de' => array('Bild', ''),
                        'fr' => array('Image', ''),
                    ),
					'inputType' => 'fileTree',
					'eval' => array(
						'fieldType' => 'radio',
						'filesOnly' => true,
						'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')),
					),
				),
				'icon' => array(
					'label' => array(
						'en' => array('Icon', ''),
                        'de' => array('Icon', ''),
                        'fr' => array('Icône', ''),
                    ),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
				),
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
                        'fr' => array('Titre', ''),
                    ),
					'inputType' => 'text',
				),
				'text' => array(
					'label' => array(
						'en' => array('Description', ''),
                        'de' => array('Beschreibung', ''),
                        'fr' => array('Description', ''),
                    ),
					'inputType' => 'textarea',
					'eval' => array('rte' => 'tinyMCE', 'basicEntities' => true),
				),
				'openLightbox' => array(
					'label' => array(
						'en' => array('Open image or URL in lightbox', 'Opens the image or image URL (optional) in the default lightbox.'),
						'de' => array('Bild oder URL in der Lightbox öffnen', 'Öffnet das Bild bzw. die hinterlegte URL (optional) mit der Standard-Lightbox'),
                        'fr' => array('Ouvrir l\'image ou l\'URL dans la lightbox', 'Ouvre l\'image ou l\'URL de l\'image (facultatif) dans la lightbox par défaut.'),
                    ),
					'inputType' => 'checkbox',
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
				'linkLabel' => array(
					'label' => array(
						'en' => array('Button caption', ''),
						'de' => array('Button-Bezeichnung', ''),
                        'fr' => array('Texte du bouton', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
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
