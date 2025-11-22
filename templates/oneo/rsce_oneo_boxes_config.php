<?php

return array(
	'label' => array(
		'en' => array('Boxes', 'Creates boxes with image and text displayed side by side'),
		'de' => array('Boxen', 'Erzeugt nebeneinander dargestellte Boxen mit Bild und Text'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'columns', 'headline'),
	'fields' => array(
		'textAlign' => array(
			'label' => array(
				'en' => array('Text align', ''),
				'de' => array('Textausrichtung', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-align-left',
				'-align-right',
			),
			'reference' => array(
				'' => array('en' => 'Centered', 'de' => 'Zentriert'),
				'-align-left' => array('en' => 'Left', 'de' => 'Links'),
				'-align-right' => array('en' => 'Right', 'de' => 'Rechts'),
			),
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
				'button',
				'button -secondary',
				'button -tertiary',
			),
			'reference' => array(
				'' => array('en' => 'Link', 'de' => 'Link'),
				'button' => array('en' => 'Button 1', 'de' => 'Button 1'),
				'button -secondary' => array('en' => 'Button 2', 'de' => 'Button 2'),
				'button -tertiary' => array('en' => 'Button 3', 'de' => 'Button 3'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'activateHover' => array(
			'label' => array(
				'en' => array('Activate mouse over effect', ''),
				'de' => array('Mouseover-Effekt aktivieren', ''),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'boxed' => array(
			'label' => array(
				'en' => array('Show border', 'Creates a border around the element.'),
				'de' => array('Rahmen anzeigen', 'Erzeugt um jedes Element einen Rahmen.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'imageCircle' => array(
			'label' => array(
				'en' => array('Circular image', 'Creates rounded corners or a circle if the image is square.'),
				'de' => array('Bild in einem Kreis anzeigen', 'Rundet das Bild ab oder zeigt es als Kreis, wenn es quadratisch ist.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'clr'),
		),
		'showPlaceholder' => array(
			'label' => array(
				'en' => array('Show placeholder', 'Shows a placeholder, if no image is selected.'),
				'de' => array('Bildplatzhalter anzeigen', 'Zeigt einen Platzhalter an, wenn kein Bild ausgewählt ist.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'size' => array(
			'inputType' => 'standardField',
			'eval' => array('tl_class' => 'w50'),
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
				'label' => array(
					'label' => array(
						'en' => array('Label', ''),
						'de' => array('Label', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
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
				'imageLinkUrl' => array(
					'label' => array(
						'en' => array('Image link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Bild-Link-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
					),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
				),
				'openLightbox' => array(
					'label' => array(
						'en' => array('Open image or URL in lightbox', 'Opens the image or image URL (optional) in the default lightbox.'),
						'de' => array('Bild oder URL in der Lightbox öffnen', 'Öffnet das Bild bzw. die hinterlegte Bild-URL (optional) mit der Standard-Lightbox'),
					),
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'w50 m12'),
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
