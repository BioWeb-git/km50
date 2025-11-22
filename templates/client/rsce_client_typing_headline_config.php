<?php

return array(
	'label' => array(
		'en' => array('Animated headline', 'Create one or two headlines featuring a typewriter effect'),
		'de' => array('Animierte Überschrift', 'Erzeugt ein oder zwei Überschriften mit einer Schreibanimation'),
        'fr' => array('Titre animé', 'Créez un ou deux titres avec un effet de machine à écrire'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID', 'space'),
	'fields' => array(
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
		),
		'headline' => array(
			'label' => array(
				'en' => array('Headline'),
				'de' => array('Überschrift'),
                'fr' => array('Titre', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'long', 'basicEntities' => true,),
		),
		'subheadline' => array(
			'label' => array(
				'en' => array('Headline 2'),
				'de' => array('Überschrift 2'),
                'fr' => array('Titre 2', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'long', 'basicEntities' => true,),
		),
		'text' => array(
			'label' => array(
				'en' => array('Text'),
				'de' => array('Text'),
                'fr' => array('Texte', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'long', 'basicEntities' => true,),
		),
		'headlineColor' => array(
			'label' => array(
				'en' => array('Headline color', 'Leave empty to use the default color.'),
				'de' => array('Headline-Farbe', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
                'fr' => array('Couleur du titre', 'Laissez vide pour utiliser la couleur par défaut.'),
            ),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
		'subHeadlineColor' => array(
			'label' => array(
				'en' => array('Headline color 2', 'Leave empty to use the default color.'),
				'de' => array('Headline-Farbe 2', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
                'fr' => array('Couleur du titre 2', 'Laissez vide pour utiliser la couleur par défaut.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
		'textColor' => array(
			'label' => array(
				'en' => array('Text color', 'Leave empty to use the default color.'),
				'de' => array('Textfarbe', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
                'fr' => array('Couleur du texte', 'Laissez vide pour utiliser la couleur par défaut.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
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
		'notBold' => array(
			'label' => array(
				'en' => array('Normal font weight', 'Display headline in normal font weight.'),
				'de' => array('Überschrift nicht Fett', 'Stellt die Headline nicht fett dar.'),
                'fr' => array('Épaisseur de police normale', 'Afficher le titre en poids de police normal.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 clr m12'),
		),
		'doesRepeat' => array(
			'label' => array(
				'en' => array('Repeat the animation', 'Repeats the animation every time the elements comes into view.'),
				'de' => array('Animation wiederholen', 'Wiederholt die Animation bei jeder Ansicht.'),
                'fr' => array('Répéter l\'animation', 'Répète l\'animation chaque fois que les éléments apparaissent.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50'),
		),
		'description' => array(
			'label' => array(
				'en' => array('Button', 'Add a button to the headline.'),
				'de' => array('Button', 'Hier können Sie den Überschriften einen Button hinzufügen.'),
                'fr' => array('Bouton', 'Ajouter un bouton au titre.'),
            ),
			'inputType' => 'group',
		),
		'icon' => array(
			'label' => array(
				'en' => array('Button-Icon'),
				'de' => array('Button-Icon'),
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
                '' => array('en' => 'Link', 'de' => 'Link', 'fr' => 'Lien'),
                '-secondary' => array('en' => 'Button 2', 'de' => 'Button 2', 'fr' => 'Button 2'),
                '-tertiary' => array('en' => 'Button 3', 'de' => 'Button 3', 'fr' => 'Button 3'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'smallButton' => array(
			'label' => array(
				'en' => array('Small button', 'Show the small variation of the button.'),
				'de' => array('Kleiner Button', 'Kleine Variante des Button anzeigen.'),
                'fr' => array('Petit bouton', 'Afficher la petite variation du bouton.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'buttonLabel' => array(
			'label' => array(
				'en' => array('Button caption'),
				'de' => array('Button-Beschriftung'),
                'fr' => array('Légende du bouton'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true,),
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
			'eval' => array('tl_class' => 'w50'),
		),
	),
);
