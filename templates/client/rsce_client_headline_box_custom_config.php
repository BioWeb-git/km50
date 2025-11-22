<?php

return array(
    'label' => array(
        'en' => array('Headline and subheadline', 'Create a headline and subheadline'),
        'de' => array('Headline und Subheadline', 'Erzeugt Unter- und Überschrift'),
        'fr' => array('Titre et sous-titre Custom', 'Créer un titre et un sous-titre'),
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
            'label' => array('Titre', ''),
            'inputType' => 'inputUnit',
            'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span'),
            'eval' => array('basicEntities'=>true, 'maxlength'=>200, 'tl_class' => 'w50'),
        ),
        'icon' => array(
            'label' => array(
                'en' => array('Headline icon', ''),
                'de' => array('Headline-Icon', ''),
                'fr' => array('Icône de titre', ''),
            ),
            'inputType' => 'rocksolid_icon_picker',
            'eval' => array('tl_class' => 'w50', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
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
                'fr' => array('Largeur et hauteur de l\'icône', ''),
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
        'subheadline' => array(
            'label' => array(
                'en' => array('Headline 2', ''),
                'de' => array('Überschrift 2', ''),
                'fr' => array('Titre 2', ''),
            ),
            'inputType' => 'inputUnit',
            'options' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span'),
            'eval' => array('basicEntities'=>true, 'maxlength'=>200, 'tl_class' => 'w50 clr'),
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
        'headlineUnderline' => array(
            'label' => array(
                'en' => array('Remove bottom border', 'Removes the line below the headline.'),
                'de' => array('Abschlusslinie entfernen', 'Stellt unter der Headline keine Linie dar.'),
                'fr' => array('Supprimer la bordure inférieure', 'Supprime la ligne sous le titre.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr m12'),
        ),
        'headlineTracking' => array(
            'label' => array(
                'en' => array('Disable tracking', 'Disables the increased letter spacing of the headline.'),
                'de' => array('Sperrsatz deaktivieren', 'Stellt die Headline nicht im Sperrsatz (mit erhöhtem Buchstabenabstand) dar.'),
                'fr' => array('Désactiver le suivi', 'Désactive l\'augmentation de l\'espacement des lettres du titre.'),
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
