<?php

return array(
	'label' => array(
		'en' => array('Button', 'Creates a button'),
		'de' => array('Button', 'Erzeugt einen Button'),
		'fr' => array('Bouton', 'Crée un bouton'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'icon' => array(
			'label' => array(
				'en' => array('Icon'),
				'de' => array('Icon'),
				'fr' => array('Icône'),
			),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
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
				'-quaternary',
			),
			'reference' => array(
				'' => array('en' => 'Default', 'de' => 'Standard', 'fr' => 'Défaut'),
				'-secondary' => array('en' => 'Button 2', 'de' => 'Button 2', 'fr' => 'Bouton 2'),
				'-tertiary' => array('en' => 'Button 3', 'de' => 'Button 3', 'fr' => 'Bouton 3'),
				'-quaternary' => array('en' => 'Button 4', 'de' => 'Button 4', 'fr' => 'Bouton 4'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'buttonSize' => array(
			'label' => array(
				'en' => array('Button size'),
				'de' => array('Button-Größe'),
				'fr' => array('Taille du bouton'),
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
		'buttonLabel' => array(
			'label' => array(
				'en' => array('Button caption'),
				'de' => array('Button-Beschriftung'),
				'fr' => array('Légende du bouton'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
		),
		'alignment' => array(
			'label' => array(
				'en' => array('Align', 'Align of the button.'),
				'de' => array('Ausrichtung', 'Ausrichtung des Buttons.'),
				'fr' => array('Alignement', 'Alignement des boutons.'),
			),
			'inputType' => 'select',
			'options' => array(
				'-left',
				'-right',
				'-centered',
				'-inline',
			),
			'reference' => array(
				'-left' => array('en' => 'Left', 'de' => 'Links', 'fr' => 'Gauche'),
				'-right' => array('en' => 'Right', 'de' => 'Rechts', 'fr' => 'Droite'),
				'-centered' => array('en' => 'Centered', 'de' => 'Zentriert', 'fr' => 'Centré'),
				'-inline' => array('en' => 'Inline', 'de' => 'Inline', 'fr' => 'En ligne'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'buttonUrl' => array(
			'label' => array(
				'en' => array('Button URL', 'Examples: {{link_url::pagealias}} (Alias, ID or other Insert tag), http://example.com'),
				'de' => array('Button-URL', 'Beispiele: {{link_url::seitenalias}} (Alias, ID oder anderer Inserttag), http://example.com'),
                'fr' => array('URL du bouton', 'Example: #contact, {{link_url::pagealias}} vers l\'alias, ID ou autre insert tag, http://example.com'),
			),
			'inputType' => 'url',
			'eval' => array('tl_class' => 'w50'),
		),
		'newWindow' => array(
			'label' => $GLOBALS['TL_LANG']['MSC']['target'],
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
	),
);
