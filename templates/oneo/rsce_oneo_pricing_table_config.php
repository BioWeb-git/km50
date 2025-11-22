<?php

return array(
	'label' => array(
		'en' => array('Pricing table', 'Creates columns with pricing and product information'),
		'de' => array('Preistabelle', 'Erzeugt Spalten mit Preis- und Produktinformationen'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'columns', 'headline'),
	'fields' => array(
		'currencySymbol' => array(
			'label' => array(
				'en' => array('Currency symbol', 'Examples: €, $, £'),
				'de' => array('Währungssymbol', 'Beispiele: €, $, £'),
			),
			'inputType' => 'text',
		),
		'plans' => array(
			'label' => array(
				'en' => array('Products', ''),
				'de' => array('Produkte', ''),
			),
			'elementLabel' => array(
				'en' => 'Product %s',
				'de' => 'Produkt %s',
			),
			'inputType' => 'list',
			'fields' => array(
				'headline' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'highlighted' => array(
					'label' => array(
						'en' => array('Highlighted text', 'Highlights the column.'),
						'de' => array('Hervorgehobener Text', 'Hebt die Spalte hervor.'),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'price' => array(
					'label' => array(
						'en' => array('Price', ''),
						'de' => array('Preis', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'priceInfo' => array(
					'label' => array(
						'en' => array('Price addition', ''),
						'de' => array('Preiszusatz', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'features' => array(
					'label' => array(
						'en' => array('Product facts', 'One fact per line.'),
						'de' => array('Produktmerkmale', 'Verwenden Sie für jedes Merkmal eine eigene Zeile.'),
					),
					'inputType' => 'textarea',
					'eval' => array('tl_class' => 'clr'),
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
