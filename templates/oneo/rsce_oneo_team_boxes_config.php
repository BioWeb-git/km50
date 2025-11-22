<?php

return array(
	'label' => array(
		'en' => array('Boxes (Team)', 'Creates profiles with image, name and position next to each other'),
		'de' => array('Boxen (Team)', 'Erzeugt nebeneinander dargestellte Profile mit Bild, Name und Position'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'columns', 'headline'),
	'fields' => array(
		'size' => array(
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
		'detailLinkLabel' => array(
			'label' => array(
				'en' => array('Detail link text', 'Caption of the detail link of the team member.'),
				'de' => array('Profil-Link-Text', 'Bezeichnung des Detail-Links zu Mitarbeiterprofilen.'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'buttonVariation' => array(
			'label' => array(
				'en' => array('Button variation'),
				'de' => array('Button-Variante'),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'-primary',
				'-secondary',
				'-tertiary',
			),
			'reference' => array(
				'' => array('en' => 'Link', 'de' => 'Link'),
				'-primary' => array('en' => 'Button 1', 'de' => 'Button 1'),
				'-secondary' => array('en' => 'Button 2', 'de' => 'Button 2'),
				'-tertiary' => array('en' => 'Button 3', 'de' => 'Button 3'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'textAlign' => array(
			'label' => array(
				'en' => array('Text align', ''),
				'de' => array('Textausrichtung', ''),
			),
			'inputType' => 'select',
			'options' => array('', '-align-left', '-align-right'),
			'reference' => array(
				'' => array('en' => 'Centered', 'de' => 'Zentriert'),
				'-align-left' => array('en' => 'Left', 'de' => 'Linksbündig'),
				'-align-right' => array('en' => 'Right', 'de' => 'Rechtsbündig'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'headlineSize' => array(
			'label' => array(
				'en' => array('Headline size', 'Font size of the headline.'),
				'de' => array('Headline-Größe', 'Schriftgröße der Headline.'),
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
				'' => array('en' => 'Default', 'de' => 'Standard'),
				'-small' => array('en' => 'Small', 'de' => 'Klein'),
				'-medium' => array('en' => 'Medium', 'de' => 'Mittel'),
				'-large' => array('en' => 'Large', 'de' => 'Groß'),
				'-super-size' => array('en' => 'Supersize', 'de' => 'Supersize'),
			),
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
						'extensions' => 'jpg,jpeg,png,gif,svg',
					),
				),
				'name' => array(
					'label' => array(
						'en' => array('Name', ''),
						'de' => array('Name', ''),
					),
					'inputType' => 'text',
				),
				'position' => array(
					'label' => array(
						'en' => array('Position', ''),
						'de' => array('Position', ''),
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'long'),
				),
				'text' => array(
					'label' => array(
						'en' => array('Text', ''),
						'de' => array('Text', ''),
					),
					'inputType' => 'textarea',
					'eval' => array('tl_class' => 'rsce_small_textarea'),
				),
				'linkUrl' => array(
					'label' => array(
						'en' => array('Detail URL', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
						'de' => array('Detail-URL', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
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
					),
					'inputType' => 'text',
					'eval' => array('tl_class' => 'w50'),
				),
				'socials' => array(
					'label' => array(
						'en' => array('Social media profiles', 'Add multiple social media links'),
						'de' => array('Social-Media-Profile', 'Fügen Sie eine beliebige Anzahl an Social-Media-Profilen ein.'),
					),
					'elementLabel' => array(
						'en' => '%s. Social media profile',
						'de' => '%s. Social-Media-Profil',
					),
					'inputType' => 'list',
					'fields' => array(
						'platform' => array(
							'label' => array(
								'en' => array('Social network', ''),
								'de' => array('Social-Media-Plattform', ''),
							),
							'inputType' => 'select',
							'options' => array(
								'email' => 'E-Mail',
								'facebook' => 'Facebook',
								'twitter' => 'Twitter',
								'instagram' => 'Instagram',
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
