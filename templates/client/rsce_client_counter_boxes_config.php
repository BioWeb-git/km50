<?php

return array(
	'label' => array(
		'en' => array('Icon boxes with counter', 'Creates boxes with icon, label and counter'),
		'de' => array('Icon-Boxen mit Zähler', 'Erzeugt nebeneinander dargestellte Boxen mit Icon, Label und einer Zahl'),
        'fr' => array('Boites avec icone et compteur', 'Crée des boîtes avec icône, label et compteur'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID', 'headline', 'columns'),
	'fields' => array(
		'deactivateCounter' => array(
			'label' => array(
				'en' => array('Deactivate counter animation', 'Disables the animation of the numbers.'),
				'de' => array('Zähleranimation deaktivieren', 'Deaktiviert die Animation der Zahlen.'),
                'fr' => array('Désactiver l\'animation du compteur', 'Désactive l\'animation des nombres.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50'),
		),
		'repeatCounter' => array(
			'label' => array(
				'en' => array('Restart counter animation', 'Restarts the animation if the element returns into the view port.'),
				'de' => array('Zähleranimation wiederholen', 'Startet die Animation neu sobald das Element erneut sichtbar wird.'),
				'fr' => array('Répéter l\'animation du compteur', 'Redémarre l\'animation dès que l\'élément redevient visible.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50'),
		),
        'iconGeneralSize' => array(
            'label' => array(
                'en' => array('Image width and height', ''),
                'de' => array('Bildbreite und Bildhöhe', ''),
                'fr' => array('Largeur et hauteur générales des icônes image', 'Définir la taille de tous les icônes'),
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
        'iconWidth' => array(
            'label' => array('Largeur de la zone de l\'icône image', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50 clr')
        ),
        'iconHeight' => array(
            'label' => array('Hauteur de la zone de l\'icône image', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'iconPadding' => array(
            'label' => array('Marge interne de l\'icône', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'headlineTag' => array(
            'label' => array('Balise titre', ''),
            'inputType' => 'select',
            'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span'),
            'eval' => array('maxlength'=>200, 'tl_class' => 'w50'),
        ),
		'boxes' => array(
			'label' => array(
                'en' => array('Boxes', ''),
                'de' => array('Boxen', ''),
                'fr' => array('Boites', ''),
            ),
			'elementLabel' => array(
                'en' => 'Box %s',
                'de' => 'Box %s',
                'fr' => 'Boîte %s',
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
					'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
				),
                'iconImage' => array(
                    'label' => array('Icône image', 'Prioritaire sur l\'icône de titre'),
                    'inputType' => 'fileTree',
                    'eval' => array(
                        'tl_class' => 'w50',
                        'filesOnly' => true,
                        'fieldType' => 'radio',
                        'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')),
                    ),
                ),
                'iconSize' => array(
                    'label' => array(
                        'en' => array('Image width and height', ''),
                        'de' => array('Bildbreite und Bildhöhe', ''),
                        'fr' => array('Largeur et hauteur de l\'icône', 'Surcharge la taille générale'),
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
				'number' => array(
					'label' => array(
						'en' => array('Number', ''),
						'de' => array('Zahl', ''),
						'fr' => array('Numéro', ''),
					),
					'inputType' => 'text',
                    'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'name' => array(
					'label' => array(
						'en' => array('Headline', ''),
						'de' => array('Überschrift', ''),
                        'fr' => array('Titre', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
				),
				'url' => array(
					'label' => array(
						'en' => array('Link URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Link-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                        'fr' => array('URL du lien', 'Example: #contact, {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                    ),
					'inputType' => 'url',
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
