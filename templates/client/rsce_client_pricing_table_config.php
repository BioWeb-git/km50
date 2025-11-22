<?php

return array(
	'label' => array(
		'en' => array('Pricing table', 'Creates columns with pricing and product information'),
		'de' => array('Preistabelle', 'Erzeugt Spalten mit Preis- und Produktinformationen'),
        'fr' => array('Tableau des prix', 'Crée des colonnes avec des informations sur les prix et les produits'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID', 'columns', 'headline'),
	'fields' => array(
		'currencySymbol' => array(
			'label' => array(
				'en' => array('Currency symbol', 'Examples: €, $, £'),
				'de' => array('Währungssymbol', 'Beispiele: €, $, £'),
                'fr' => array('Symbole monétaire', 'Examples: €, $, £'),
            ),
			'inputType' => 'text',
		),
        'imageGeneralSize' => array(
            'label' => array(
                'en' => array('Image width and height', ''),
                'de' => array('Bildbreite und Bildhöhe', ''),
                'fr' => array('Largeur et hauteur générales des image', 'Définir la taille de toutes les images'),
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
		'plans' => array(
			'label' => array(
				'en' => array('Products', ''),
				'de' => array('Produkte', ''),
                'fr' => array('Produits', ''),
            ),
			'elementLabel' => array(
				'en' => 'Product %s',
				'de' => 'Produkt %s',
                'fr' => 'Produit %s',
            ),
			'inputType' => 'list',
			'fields' => array(
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
                        'fr' => array('Titre', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'highlighted' => array(
					'label' => array(
						'en' => array('Highlighted text', 'Highlights the column.'),
						'de' => array('Hervorgehobener Text', 'Hebt die Spalte hervor.'),
                        'fr' => array('Texte en surbrillance', 'Met la colonne en surbrillance.'),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
                'image' => array(
                    'label' => array('Image', 'Prioritaire sur l\'image'),
                    'inputType' => 'fileTree',
                    'eval' => array(
                        'tl_class' => 'w50',
                        'filesOnly' => true,
                        'fieldType' => 'radio',
                        'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')),
                    ),
                ),
                'imageSize' => array(
                    'label' => array(
                        'en' => array('Image width and height', ''),
                        'de' => array('Bildbreite und Bildhöhe', ''),
                        'fr' => array('Largeur et hauteur de l\'image', 'Surcharge la taille générale'),
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
				'price' => array(
					'label' => array(
						'en' => array('Price', ''),
						'de' => array('Preis', ''),
                        'fr' => array('Prix', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'priceInfo' => array(
					'label' => array(
						'en' => array('Price addition', ''),
						'de' => array('Preiszusatz', ''),
                        'fr' => array('Supplément de prix', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'features' => array(
					'label' => array(
						'en' => array('Product facts', 'One fact per line.'),
						'de' => array('Produktmerkmale', 'Utilisez une ligne distincte pour chaque caractéristique.'),
                        'fr' => array('Informations sur le produit', 'Un fait par ligne.'),
                    ),
					'inputType' => 'textarea',
					'eval' => array('tl_class' => 'clr', 'basicEntities' => true),
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
