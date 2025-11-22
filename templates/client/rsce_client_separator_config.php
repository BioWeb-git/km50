<?php

return array(
    'label' => array(
        'Ligne de séparation avec icone ou titre (_separator)',
        'Ajout une ligne horizontale avec un titre optionnel',
    ),
    'types' => array('content', 'module'),
    'standardFields' => array('cssID', 'headline', 'space'),
    'fields' => array(
        'hrVariation' => array(
            'label' => array('Variante', ''),
            'inputType' => 'select',
            'options' => array(
                '' => 'Standard',
                '-hr-dotted' => 'Pointillée',
                '-hr-shadow' => 'Ombrée',
            ),
            'eval' => array('tl_class' => 'w50'),
        ),
        'align' => array(
            'label' => array('Alignement', ''),
            'inputType' => 'select',
            'options' => array(
                '' => 'Gauche',
                '-centered' => 'Centré',
                '-align-right' => 'Droite',
            ),
            'eval' => array('tl_class' => 'w50'),
        ),
        'iconBackgroundWidth' => array(
            'label' => array('Largeur de la zone', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'marginTop' => array(
            'label' => array('Marge haute (margin-top)', 'Précisez l\'unité ex: 10px, défaut : -3rem'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'marginBottom' => array(
            'label' => array('Marge haute (margin-bottom)', 'Précisez l\'unité ex: 10px, défaut : 3rem'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'iconImagePadding' => array(
            'label' => array('Marge interne (padding) de l\'images/icône', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'iconImageSize' => array(
            'label' => array('Taille de l\'images/icône', 'Précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'iconImageWidth' => array(
            'label' => array('Largeur de l\'images/icône', 'Défaut 5rem, précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'iconImageHeight' => array(
            'label' => array('Hauteur de l\'images/icône', 'Défaut 5rem, précisez l\'unité ex: 10px'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'iconImageBackgroundSize' => array(
            'label' => array('CSS background-size de l\'images/icône', 'Exemples : contain, cover, 80%..'),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50')
        ),
        'iconImagebackgroundColor' => array(
            'label' => array('Couleur de fond de l\'image/icône', 'Defaut fff, Mettre 00000000 pour transparent'),
            'inputType' => 'text',
            'eval' => array(
                'colorpicker' => true,
                'tl_class' => 'w50',
            ),
        ),
        'iconColor' => array(
            'label' => array('Couleur de l\'icône', 'Mettre 00000000 pour transparent'),
            'inputType' => 'text',
            'eval' => array(
                'colorpicker' => true,
                'tl_class' => 'w50',
            ),
        ),
        'iconImage' => array(
            'label' => array('Icône image du boutton', ''),
            'inputType' => 'fileTree',
            'eval' => array(
                'tl_class' => 'w50',
                'fieldType' => 'radio',
                'filesOnly' => true,
                'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')),
            ),
        ),
        'icon' => array(
            'label' => array('Icône', ''),
            'inputType' => 'rocksolid_icon_picker',
            'eval' => array('tl_class' => 'w50', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
        ),

    ),
);