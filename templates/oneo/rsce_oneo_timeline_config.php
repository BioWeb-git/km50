<?php

return array(
	'label' => array(
		'en' => array('Timeline', 'Creates a timeline with texts and icons'),
		'de' => array('Timeline', 'Erzeugt eine Zeitachse mit Texten und Icons'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'events' => array(
			'label' => array(
				'en' => array('Events', ''),
				'de' => array('Ereignisse', ''),
			),
			'elementLabel' => array(
				'en' => 'Event %s',
				'de' => 'Ereignis %s',
			),
			'inputType' => 'list',
			'fields' => array(
				'icon' => array(
					'label' => array(
						'en' => array('Icon', ''),
						'de' => array('Icon', ''),
					),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array(
						'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'
					),
				),
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'headline2' => array(
					'label' => array(
						'en' => array('Headline 2', ''),
						'de' => array('Überschrift 2', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'text' => array(
					'label' => array(
						'en' => array('Description', ''),
						'de' => array('Beschreibung', ''),
					),
					'inputType' => 'textarea',
					'eval' => array('rte' => 'tinyMCE', 'tl_class' => 'clr'),
				),
				array(
					'inputType' => 'group',
					'label' => array(
						'en' => array('Image'),
						'de' => array('Bild'),
					),
				),
				'image' => array(
					'label' => array(
						'en' => array('Image', ''),
						'de' => array('Bild', ''),
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
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'imageLinkUrl' => array(
					'label' => array(
						'en' => array('Image link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Bild-Link-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
					),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
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
				'openLightbox' => array(
					'label' => array(
						'en' => array('Open image or URL in lightbox', 'Opens the image or image URL (optional) in the default lightbox.'),
						'de' => array('Bild oder URL in der Lightbox öffnen', 'Öffnet das Bild bzw. die hinterlegte Bild-URL (optional) mit der Standard-Lightbox'),
					),
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'w50 m12'),
				),
			),
		),
	),
);
