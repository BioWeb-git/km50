<?php

return array(
	'label' => array(
		'en' => array('Icon links', 'Create an element with icon links'),
		'de' => array('Icon-Links', 'Erzeugt ein Element mit Icons-Links'),
        'fr' => array('Liens avec icone', 'Créer un élément avec des liens d\'icônes'),
    ),
	'types' => array('module', 'content'),
	'standardFields' => array('headline', 'cssID'),
	'fields' => array(
		'links' => array(
			'label' => array(
				'en' => array('Links', ''),
				'de' => array('Links', ''),
                'fr' => array('Lien', ''),
            ),
			'elementLabel' => '%s. Link',
			'inputType' => 'list',
			'fields' => array(
				'label' => array(
					'label' => array(
						'en' => array('Link caption', ''),
						'de' => array('Link-Bezeichnung', ''),
                        'fr' => array('Légende du lien', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'url' => array(
					'label' => array(
						'en' => array('Link URL', 'Examples: {{link_url::pagealias}} (Alias, ID or other Insert tag), http://example.com'),
						'de' => array('Link-URL', 'Beispiele: {{link_url::seitenalias}} (Alias, ID oder anderer Inserttag), http://example.com'),
                        'fr' => array('URL du lien', 'Exemples: #contact, {{link_url::pagealias}} vers l\'alias, ID ou autre insert tag, http://example.com'),
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
						'fr' => array('Icône', ''),
					),
					'inputType' => 'rocksolid_icon_picker',
					'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
				),
				'color' => array(
					'label' => array(
						'en' => array('Icon color', ''),
						'de' => array('Icon-Farbe', ''),
                        'fr' => array('Couleur de l\'icône', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'clr', 'colorpicker' => true),
				),
				'background_color' => array(
					'label' => array(
						'en' => array('Background color', ''),
						'de' => array('Hintergrundfarbe', ''),
                        'fr' => array('Couleur de l\'arrière plan', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'clr', 'colorpicker' => true),
				),
                'class' => array(
                    'label' => array('Class', ''),
                    'inputType' => 'text',
                    'eval' => array('tl_class' => 'w50'),
                ),
			),
		),
	),
);
