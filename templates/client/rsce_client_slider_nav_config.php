<?php

return array(
	'label' => array(
		'en' => array('Slider Navigation', 'Creates a slider navigation with a button element'),
		'de' => array('Slider Navigation', 'Erzeugt eine Slider-Navigation mit Button'),
        'fr' => array('Slider Navigation', 'Crée une navigation par curseur avec un bouton'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'sliderId' => array(
			'label' => array(
				'en' => array('Slider ID', 'HTML-ID of the slider element that should be controlled.'),
				'de' => array('Slider-ID', 'HTML-ID des Slider-Elements das gesteuert werden soll.'),
                'fr' => array('Slider ID', 'HTML-ID de l\'élément slider qui doit être contrôlé.'),
            ),
			'inputType' => 'text',
		),
		'buttonIcon' => array(
			'label' => array(
				'en' => array('Button-Icon'),
				'de' => array('Button-Icon'),
                'fr' => array('Icône du bouton'),
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
			),
			'reference' => array(
                '' => array('en' => 'Default', 'de' => 'Standard', 'fr' => 'Défaut'),
                '-secondary' => array('en' => 'Button 2', 'de' => 'Button 2', 'fr' => 'Bouton 2'),
                '-tertiary' => array('en' => 'Button 3', 'de' => 'Button 3', 'fr' => 'Bouton 3'),
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
