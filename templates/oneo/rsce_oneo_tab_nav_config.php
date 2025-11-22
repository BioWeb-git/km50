<?php

return array(
	'label' => array(
		'en' => array('Tab navigation', 'Creates a tab navigation for tab elements'),
		'de' => array('Tab-Navigation', 'Erzeugt eine Tab-Navigation für Tab-Elemente'),
	),
	'types' => array('module', 'content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'imageTabs' => array(
			'label' => array(
				'en' => array('Image navigation', 'Use images or icons as tabs for the navigation.'),
				'de' => array('Bildernavigation', 'Zeigt Bilder oder Icons als Schaltflächen für die Tab-Navigation.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 clr m12'),
		),
		'tabs' => array(
			'label' => array(
				'en' => array('Tabs', ''),
				'de' => array('Tabs', ''),
			),
			'elementLabel' => '%s. Tab',
			'inputType' => 'list',
			'fields' => array(
				'label' => array(
					'label' => array(
						'en' => array('Label', ''),
						'de' => array('Bezeichnung', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'tabId' => array(
					'label' => array(
						'en' => array('Tab ID', 'ID of the related tab element.'),
						'de' => array('Tab-ID', 'ID des zugehörigen Tab-Elements.'),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'icon' => array(
					'label' => array(
						'en' => array('Icon', ''),
						'de' => array('Icon', ''),
					),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array('tl_class' => 'clr', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
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
						'includeBlankOption' => true,
					),
				),
			),
		),
	),
);
