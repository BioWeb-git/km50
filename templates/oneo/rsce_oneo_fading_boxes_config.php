<?php

return array(
	'label' => array(
		'en' => array('Animated Boxes', 'Creates boxes with image, icon and text next to each other'),
		'de' => array('Animierte Boxen', 'Erzeugt nebeneinander dargestellte Boxen mit Bild, Icon und Text'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'columns', 'headline'),
	'fields' => array(
		'linkVariation' => array(
			'label' => array(
				'en' => array('Button variation', ''),
				'de' => array('Buttonvariante', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'' => 'Button 1',
				'-secondary' => 'Button 2',
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'size' => array(
			'inputType' => 'standardField',
			'eval' => array('tl_class' => 'w50'),
		),
		'backgroundColor' => array(
			'label' => array(
				'en' => array('Background color', 'Leave this field empty to use the default color.'),
				'de' => array('Hintergrundfarbe', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
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
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'boxes' => array(
			'label' => array(
				'en' => array('Boxes', ''),
				'de' => array('Boxen', ''),
			),
			'elementLabel' => 'Box %s',
			'inputType' => 'list',
			'fields' => array(
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
				'icon' => array(
					'label' => array(
						'en' => array('Icon', ''),
						'de' => array('Icon', ''),
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
				),
				'text' => array(
					'label' => array(
						'en' => array('Description', ''),
						'de' => array('Beschreibung', ''),
					),
					'inputType' => 'textarea',
					'eval' => array('rte' => 'tinyMCE'),
				),
				'openLightbox' => array(
					'label' => array(
						'en' => array('Open image or URL in lightbox', 'Opens the image or image URL (optional) in the default lightbox.'),
						'de' => array('Bild oder URL in der Lightbox öffnen', 'Öffnet das Bild bzw. die hinterlegte URL (optional) mit der Standard-Lightbox'),
					),
					'inputType' => 'checkbox',
				),
				'linkUrl' => array(
					'label' => array(
						'en' => array('Button URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Button-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
					),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
				),
				'linkLabel' => array(
					'label' => array(
						'en' => array('Button caption', ''),
						'de' => array('Button-Bezeichnung', ''),
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
