<?php

return array(
	'label' => array(
		'en' => array('Boxes (Team)', 'Creates profiles with image, name and position next to each other'),
		'de' => array('Boxen (Team)', 'Erzeugt nebeneinander dargestellte Profile mit Bild, Name und Position'),
        'fr' => array('Boites (Equipe)', 'Crée des profils avec image, nom et position les uns à côté des autres'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID', 'columns', 'headline'),
	'fields' => array(
		'size' => array(
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
		'detailLinkLabel' => array(
			'label' => array(
				'en' => array('Detail link text', 'Caption of the detail link of the team member.'),
				'de' => array('Profil-Link-Text', 'Bezeichnung des Detail-Links zu Mitarbeiterprofilen.'),
                'fr' => array('Texte du lien détaillé', 'Légende du lien de détail du membre de l\'équipe.'),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
		),
		'buttonVariation' => array(
			'label' => array(
				'en' => array('Button variation'),
				'de' => array('Button-Variante'),
                'fr' => array('Variante de bouton'),
            ),
			'inputType' => 'select',
			'options' => array(
				'',
				'-secondary',
				'-tertiary',
			),
			'reference' => array(
				'' => array('en' => 'Link', 'de' => 'Link', 'fr' => 'Lien'),
				'-secondary' => array('en' => 'Button 2', 'de' => 'Button 2', 'fr' => 'Button 2'),
				'-tertiary' => array('en' => 'Button 3', 'de' => 'Button 3', 'fr' => 'Button 3'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'textAlign' => array(
			'label' => array(
				'en' => array('Text align', ''),
				'de' => array('Textausrichtung', ''),
                'fr' => array('Alignement du texte', ''),
            ),
			'inputType' => 'select',
			'options' => array('', '-align-center', '-align-left', '-align-right'),
			'reference' => array(
                '' => array('en' => '-', 'de' => '-', 'fr' => '-'),
                '-align-center' => array('en' => 'Centered', 'de' => 'Zentriert', 'fr' => 'Centré'),
                '-align-left' => array('en' => 'Left', 'de' => 'Links', 'fr' => 'Gauche'),
                '-align-right' => array('en' => 'Right', 'de' => 'Rechts', 'fr' => 'Droite'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'headlineSize' => array(
			'label' => array(
				'en' => array('Headline size', 'Font size of the headline.'),
				'de' => array('Headline-Größe', 'Schriftgröße der Headline.'),
                'fr' => array('Taille du titre', 'Taille de la police du titre.'),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-small',
				'-medium',
				'-large',
				'-super-size',
			),
			'reference' => array(
                '' => array('en' => 'Default', 'de' => 'Standard', 'fr' => 'Défaut'),
                '-small' => array('en' => 'Small', 'de' => 'Klein', 'fr' => 'Petit'),
                '-medium' => array('en' => 'Medium', 'de' => 'Mittel', 'fr' => 'Moyen'),
                '-large' => array('en' => 'Large', 'de' => 'Groß', 'fr' => 'Gros'),
                '-super-size' => array('en' => 'Supersize', 'de' => 'Supersize', 'fr' => 'Plus gros'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'boxes' => array(
			'label' => array(
				'en' => array('Boxes', ''),
				'de' => array('Boxen', ''),
                'fr' => array('Boites', ''),
            ),
			'elementLabel' => 'Box %s',
			'inputType' => 'list',
			'fields' => array(
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
						'extensions' => 'jpg,jpeg,png,gif,svg',
					),
				),
				'name' => array(
					'label' => array(
						'en' => array('Name', ''),
						'de' => array('Name', ''),
                        'fr' => array('Nom', ''),
                    ),
					'inputType' => 'text',
                    'eval' => array(
                        'basicEntities' => true,
                    ),
				),
				'position' => array(
					'label' => array(
						'en' => array('Position', ''),
						'de' => array('Position', ''),
                        'fr' => array('Détail', ''),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'long'),
				),
				'text' => array(
					'label' => array(
						'en' => array('Text', ''),
						'de' => array('Text', ''),
                        'fr' => array('Texte', ''),
                    ),
					'inputType' => 'textarea',
					'eval' => array(
                        'tl_class' => 'rsce_small_textarea',
                        'rte' => 'tinyMCE',
                        'basicEntities' => true,)
                    ,
				),
				'linkUrl' => array(
					'label' => array(
						'en' => array('Detail URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Detail-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                        'fr' => array('URL du lien', 'Exemples: #contact, {{link_url::pagealias}} vers l\'alias, ID ou autre insert tag, http://example.com'),
                    ),
					'inputType' => 'url',
					'eval' => array('tl_class' => 'w50'),
				),
				'newWindow' => array(
					'label' => $GLOBALS['TL_LANG']['MSC']['target'],
					'inputType' => 'checkbox',
					'eval' => array('tl_class' => 'w50 m12'),
				),
				'detailLinkLabel' => array(
					'label' => array(
						'en' => array('Custom link caption', 'Overwrite the default caption.'),
						'de' => array('Eigene Link-Bezeichung', 'Die Standardbezeichnung überschreiben.'),
                        'fr' => array('Légende du lien personnalisé', 'Remplacez la légende par défaut.'),
                    ),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'socials' => array(
					'label' => array(
						'en' => array('Social media profiles', 'Add multiple social media links'),
						'de' => array('Social-Media-Profile', 'Fügen Sie eine beliebige Anzahl an Social-Media-Profilen ein.'),
                        'fr' => array('Profils de médias sociaux', 'Ajouter plusieurs liens de médias sociaux'),
                    ),
					'elementLabel' => array(
						'en' => '%s. Social media profile',
						'de' => '%s. Social-Media-Profil',
                        'fr' => '%s. Profil sur les réseaux sociaux',
                    ),
					'inputType' => 'list',
					'fields' => array(
						'platform' => array(
							'label' => array(
								'en' => array('Social network', ''),
								'de' => array('Social-Media-Plattform', ''),
                                'fr' => array('Réseau social', ''),
                            ),
							'inputType' => 'select',
							'options' => array(
								'email' => 'E-Mail',
								'facebook' => 'Facebook',
								'twitter' => 'Twitter',
								'xing' => 'Xing',
								'pinterest' => 'Pinterest',
								'linkedin' => 'LinkedIn',
								'dribbble' => 'Dribbble',
								'youtube' => 'Youtube',
								'vimeo' => 'Vimeo',
								'skype' => 'Skype',
							),
							'eval' => array('tl_class' => 'w50'),
						),
						'linkUrl' => array(
							'label' => array(
								'en' => array('Link', 'URL to the profile page'),
								'de' => array('Link', 'URL zur Profilseite auf der Social-Media-Plattform'),
                                'fr' => array('Lien', 'URL vers la page de profil'),
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
		),
	),
);
