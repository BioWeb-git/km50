<?php

return array(
	'label' => array(
		'en' => array('Timeline', 'Creates a timeline with texts and icons'),
		'de' => array('Timeline', 'Erzeugt eine Zeitachse mit Texten und Icons'),
        'fr' => array('Timeline', 'Crée une chronologie avec des textes et des icônes'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'events' => array(
			'label' => array(
				'en' => array('Events', ''),
				'de' => array('Ereignisse', ''),
                'fr' => array('Événements', ''),
            ),
			'elementLabel' => array(
				'en' => 'Event %s',
				'de' => 'Ereignis %s',
                'fr' => 'Événement %s',
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
					'eval' => array(
						'iconFont' => 'files/client/fonts/rocksolid-icons.svg'
					),
				),
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
                        'fr' => array('Titre', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true,),
				),
				'headline2' => array(
					'label' => array(
						'en' => array('Headline 2', ''),
						'de' => array('Überschrift 2', ''),
                        'fr' => array('Titre 2', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true,),
				),
				'text' => array(
					'label' => array(
						'en' => array('Description', ''),
						'de' => array('Beschreibung', ''),
                        'fr' => array('Description', ''),
                    ),
					'inputType' => 'textarea',
					'eval' => array('rte' => 'tinyMCE', 'tl_class' => 'clr', 'basicEntities' => true,),
				),
				array(
					'inputType' => 'group',
					'label' => array(
						'en' => array('Image'),
						'de' => array('Bild'),
                        'fr' => array('Image'),
                    ),
				),
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
				'imageCaption' => array(
					'label' => array(
						'en' => array('Image caption', ''),
						'de' => array('Bildunterschrift', ''),
                        'fr' => array('Légende de l\'image', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true,),
				),
				'imageLinkUrl' => array(
					'label' => array(
						'en' => array('Image link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Bild-Link-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                        'fr' => array('URL du lien', 'Exemples: #contact, {{link_url::pagealias}} vers l\'alias, ID ou autre insert tag, http://example.com'),
					),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
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
				'openLightbox' => array(
					'label' => array(
						'en' => array('Open image or URL in lightbox', 'Opens the image or image URL (optional) in the default lightbox.'),
						'de' => array('Bild oder URL in der Lightbox öffnen', 'Öffnet das Bild bzw. die hinterlegte Bild-URL (optional) mit der Standard-Lightbox'),
                        'fr' => array('Ouvrir l\'image ou l\'URL dans la lightbox', 'Ouvre l\'image ou l\'URL de l\'image (facultatif) dans la lightbox par défaut.'),
                    ),
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'w50 m12'),
				),
			),
		),
	),
);
