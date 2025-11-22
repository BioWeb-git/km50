<?php

return array(
	'label' => array(
		'en' => array('Headline and subheadline', 'Create a headline and subheadline'),
		'de' => array('Headline und Subheadline', 'Erzeugt Unter- und Überschrift'),
        'fr' => array('Titre et sous-titre', 'Créer un titre et un sous-titre'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'space'),
	'fields' => array(
		'textAlign' => array(
			'label' => array(
				'en' => array('Text align', ''),
				'de' => array('Textausrichtung', ''),
                'fr' => array('Texte', ''),
			),
			'inputType' => 'select',
			'options' => array('', '-align-left', '-align-right'),
			'reference' => array(
				'' => array('en' => 'Centered', 'de' => 'Zentriert', 'fr' => 'Centré'),
				'-align-left' => array('en' => 'Left', 'de' => 'Linksbündig', 'fr' => 'Gauche'),
				'-align-right' => array('en' => 'Right', 'de' => 'Rechtsbündig', 'fr' => 'Droite'),
			),
		),
		'icon' => array(
			'label' => array(
				'en' => array('Headline icon', ''),
				'de' => array('Headline-Icon', ''),
				'fr' => array('Titre Icône', ''),
			),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
		),
		'headline' => array(
			'label' => array(
				'en' => array('Headline', ''),
				'de' => array('Überschrift', ''),
				'fr' => array('Titre', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
		),
		'subheadline' => array(
			'label' => array(
				'en' => array('Headline 2', ''),
				'de' => array('Überschrift 2', ''),
				'fr' => array('Titre 2', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
		),
		'headlineSize' => array(
			'label' => array(
				'en' => array('Headline size', 'Font size of the headline.'),
				'de' => array('Headline-Größe', 'Schriftgröße der Headline.'),
				'fr' => array('Taille du titre', 'Taille de font du titre.'),
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
				'' => array('en' => 'Default', 'de' => 'Standard', 'fr' => 'Standard'),
				'-small' => array('en' => 'Small', 'de' => 'Klein', 'fr' => 'Petit'),
				'-medium' => array('en' => 'Medium', 'de' => 'Mittel', 'fr' => 'Moyen'),
				'-large' => array('en' => 'Large', 'de' => 'Groß', 'fr' => 'Grand'),
				'-super-size' => array('en' => 'Supersize', 'de' => 'Supersize', 'fr' => 'Trés grand'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'headlineUnderline' => array(
			'label' => array(
				'en' => array('Remove bottom border', 'Removes the line below the headline.'),
				'de' => array('Abschlusslinie entfernen', 'Stellt unter der Headline keine Linie dar.'),
				'fr' => array('Retirer le bord sous le titre', 'Retire la ligne en dessous du titre'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 clr m12'),
		),
		'headlineTracking' => array(
			'label' => array(
				'en' => array('Disable tracking', 'Disables the increased letter spacing of the headline.'),
				'de' => array('Sperrsatz deaktivieren', 'Stellt die Headline nicht im Sperrsatz (mit erhöhtem Buchstabenabstand) dar.'),
				'fr' => array('Désactiver le suivi', 'Désactive l\’espacement accru des lettres du titre.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
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
				'en' => array('Subheadline color', 'Leave this field empty to use the default color.'),
				'de' => array('Subheadline-Farbe', 'Lassen Sie dieses Feld leer um die Standardfarbe zu verwenden.'),
				'fr' => array('Couleur du sous-titre', 'Laissez ce champ vide pour utiliser la couleur par défaut.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'colorpicker' => true,
				'tl_class' => 'w50 wizard',
			),
		),
	),
);
