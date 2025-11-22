<?php

return array(
	'label' => array(
		'en' => array('Icon links', 'Create an element with icon links'),
		'de' => array('Icon-Links', 'Erzeugt ein Element mit Icons-Links'),
	),
	'types' => array('module', 'content'),
	'standardFields' => array('headline', 'cssID'),
	'fields' => array(
		'links' => array(
			'label' => array(
				'en' => array('Links', ''),
				'de' => array('Links', ''),
			),
			'elementLabel' => '%s. Link',
			'inputType' => 'list',
			'fields' => array(
				'label' => array(
					'label' => array(
						'en' => array('Link caption', ''),
						'de' => array('Link-Bezeichnung', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'url' => array(
					'label' => array(
						'en' => array('Link URL', 'Examples: {{link_url::pagealias}} (Alias, ID or other Insert tag), http://example.com'),
						'de' => array('Link-URL', 'Beispiele: {{link_url::seitenalias}} (Alias, ID oder anderer Inserttag), http://example.com'),
					),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
				),
				'newWindow' => array(
					'label' => $GLOBALS['TL_LANG']['MSC']['target'],
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'clr'),
				),
				'icon' => array(
					'label' => array(
						'en' => array('Icon', ''),
						'de' => array('Icon', ''),
					),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array('tl_class' => '', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
				),
				'color' => array(
					'label' => array(
						'en' => array('Icon color', ''),
						'de' => array('Icon-Farbe', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'clr', 'colorpicker' => true),
				),
				'background_color' => array(
					'label' => array(
						'en' => array('Background color', ''),
						'de' => array('Hintergrundfarbe', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'clr', 'colorpicker' => true),
				),
			),
		),
	),
);
