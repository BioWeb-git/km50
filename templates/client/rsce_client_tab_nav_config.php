<?php

return array(
	'label' => array(
		'en' => array('Tab navigation', 'Creates a tab navigation for tab elements'),
		'de' => array('Tab-Navigation', 'Erzeugt eine Tab-Navigation für Tab-Elemente'),
        'fr' => array('Navigation par onglet', 'Crée une navigation par onglets pour les éléments d\'onglet'),
    ),
	'types' => array('module', 'content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'imageTabs' => array(
			'label' => array(
				'en' => array('Image navigation', 'Use images or icons as tabs for the navigation.'),
				'de' => array('Bildernavigation', 'Zeigt Bilder oder Icons als Schaltflächen für die Tab-Navigation.'),
                'fr' => array('Navigation image', 'Utilisez des images ou des icônes comme onglets pour la navigation.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 clr m12'),
		),
		'tabs' => array(
			'label' => array(
				'en' => array('Tabs', ''),
				'de' => array('Tabs', ''),
                'fr' => array('Onglets', ''),
            ),
			'elementLabel' =>  array(
                'en' => '%s. Tab',
                'de' => '%s. Tab',
                'fr' => '%s. Onglet',
            ),
			'inputType' => 'list',
			'fields' => array(
				'label' => array(
					'label' => array(
						'en' => array('Label', ''),
						'de' => array('Bezeichnung', ''),
                        'fr' => array('Label', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'tabId' => array(
					'label' => array(
						'en' => array('Tab ID', 'ID of the related tab element.'),
						'de' => array('Tab-ID', 'ID des zugehörigen Tab-Elements.'),
                        'fr' => array('ID Onglet', 'ID de l\'élément d\'onglet associé.'),
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
					'eval' => array('tl_class' => 'clr', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
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
						'includeBlankOption' => true,
					),
				),
			),
		),
	),
);
