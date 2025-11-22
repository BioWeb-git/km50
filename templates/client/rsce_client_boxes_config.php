<?php

return array(
	'label' => array(
		'en' => array('Boxes', 'Creates boxes with image and text displayed side by side'),
		'de' => array('Boxen', 'Erzeugt nebeneinander dargestellte Boxen mit Bild und Text'),
		'fr' => array('Boites', 'Crée des boîtes côte à côte avec image et texte'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'columns', 'headline'),
	'fields' => array(
		'textAlign' => array(
			'label' => array(
				'en' => array('Text align', ''),
				'de' => array('Textausrichtung', ''),
				'fr' => array('Alignement du texte', ''),
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
		'linkVariation' => array(
			'label' => array(
				'en' => array('Button variation', ''),
				'de' => array('Buttonvariante', ''),
				'fr' => array('Variante de bouton', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'button',
				'button -secondary',
				'button -tertiary',
			),
			'reference' => array(
                '' => array('en' => 'Link', 'de' => 'Link', 'fr' => 'Lien'),
                'button' => array('en' => 'Button 1', 'de' => 'Button 1', 'fr' => 'Bouton 1'),
				'button -secondary' => array('en' => 'Button 2', 'de' => 'Button 2', 'fr' => 'Bouton 2'),
				'button -tertiary' => array('en' => 'Button 3', 'de' => 'Button 3', 'fr' => 'Bouton 3'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'activateHover' => array(
			'label' => array(
				'en' => array('Activate mouse over effect', ''),
				'de' => array('Mouseover-Effekt aktivieren', ''),
				'fr' => array('Activer l\'effet de survol de la souris', ''),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'boxed' => array(
			'label' => array(
				'en' => array('Show border', 'Creates a border around the element.'),
				'de' => array('Rahmen anzeigen', 'Erzeugt um jedes Element einen Rahmen.'),
				'fr' => array('Afficher les cadres', 'Crée une bordure autour de chaque élément.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12', 'basicEntities' => true),
		),
		'imageCircle' => array(
			'label' => array(
				'en' => array('Circular image', 'Creates rounded corners or a circle if the image is square.'),
				'de' => array('Bild in einem Kreis anzeigen', 'Rundet das Bild ab oder zeigt es als Kreis, wenn es quadratisch ist.'),
				'fr' => array('Afficher l\'image dans un cercle', 'Crée des coins arrondis ou un cercle si l\'image est carrée.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'clr'),
		),
		'showPlaceholder' => array(
			'label' => array(
				'en' => array('Show placeholder', 'Shows a placeholder, if no image is selected.'),
				'de' => array('Bildplatzhalter anzeigen', 'Zeigt einen Platzhalter an, wenn kein Bild ausgewählt ist.'),
				'fr' => array('Afficher les espaces réservés pour les images', 'Affiche un espace réservé lorsqu\'aucune image n\'est sélectionnée.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'size' => array(
			'inputType' => 'standardField',
			'eval' => array('tl_class' => 'w50'),
		),
        'box_headline_tag' => array(
            'label' => array('Balise titre', ''),
            'inputType' => 'select',
            'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span'),
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
				'label' => array(
					'label' => array(
						'en' => array('Label', ''),
						'de' => array('Label', ''),
                        'fr' => array('Label', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
                        'fr' => array('Titre', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'text' => array(
					'label' => array(
						'en' => array('Description', ''),
						'de' => array('Beschreibung', ''),
                        'fr' => array('Description', ''),
                    ),
					'inputType' => 'textarea',
					'eval' => array('rte' => 'tinyMCE', 'tl_class' => 'clr', 'basicEntities' => true),
				),
				'imageLinkUrl' => array(
					'label' => array(
						'en' => array('Image link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Bild-Link-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                        'fr' => array('URL du lien de l\'image', 'Example: #contact, {{link_url::pagealias}} vers l\'alias, ID ou autre insert tag, http://example.com'),
                    ),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
				),
				'openLightbox' => array(
					'label' => array(
						'en' => array('Open image or URL in lightbox', 'Opens the image or image URL (optional) in the default lightbox.'),
						'de' => array('Bild oder URL in der Lightbox öffnen', 'Öffnet das Bild bzw. die hinterlegte Bild-URL (optional) mit der Standard-Lightbox'),
                        'fr' => array('Ouvrir l\'image ou l\'URL dans la lightbox', 'Ouvre l\'image ou l\'URL de l\'image (facultatif) dans la lightbox par défaut.'),
                    ),
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'w50 m12'),
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
                'class' => array(
                    'label' => array(
                        'en' => array('Class', ''),
                        'de' => array('Class', ''),
                        'fr' => array('Class', ''),
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
