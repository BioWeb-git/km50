<?php

return array(
    'label' => array(
        'fr' => array('Galerie justifiée', 'Crée une galerie d\'image qui utilise la librairie js http://miromannino.github.io/Justified-Gallery' ),
    ),
    'types' => array('content'),
    'standardFields' => array('cssID','headline', 'space'),
    'fields' => array(
        'images' => array(
            'label' => array(
                'fr' => array('Images', 'Sélectionnez les images de la galerie'),
            ),
            'inputType' => 'fileTree',
            'eval' => array(
                'tl_class' => 'clr',
                'multiple' => true,
                'isSortable'=> true,
                'isGallery' => true,
                'fieldType' => 'checkbox',
                'files' => true,
                'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')),
            ),
        ),
        'newWindow' => array(
            'label' => $GLOBALS['TL_LANG']['MSC']['target'],
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w100 m12'),
        ),
        'rowHeight' => array(
            'label' => array(
                'fr' => array('Hauteur d\'une ligne', 'En pixel. Défaut 200'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'maxRowHeight' => array(
            'label' => array(
                'fr' => array('Hauteur maximum d\'une ligne', 'Défaut: 200%. Cette option peut être une valeur fausse ou négative pour la garder désactivée. Il peut s\'agir d\'un nombre (par exemple 200) qui spécifie la hauteur de ligne maximale en pixels. Alternativement, une chaîne qui spécifie un pourcentage (par exemple "200%" signifie que la hauteur de la ligne ne peut pas dépasser 2 * rowHeight). A noter qu\'avec cette option on peut recadrer les images si elles ont besoin d\'être plus hautes pour être justifiées.'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'maxRowsCount' => array(
            'label' => array(
                'fr' => array('Limiter le nombre de ligne', 'Ce paramètre limite le nombre de lignes à afficher. Justified Gallery masque les lignes indésirables, et si la page est redimensionnée plus (ou moins) d’images sont affichées. Notez que cette option ne limite pas le nombre de lignes en réduisant la taille des images. Une valeur 0 signifie désactivée.'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50'),
        ),
        'lastRow' => array(
            'label' => array(
                'fr' => array('Dernière ligne', ''),
            ),
            'inputType' => 'select',
            'options' => array(
                'justify',
                'nojustify',
                'hide',
                'center',
                'right',
            ),
            'reference' => array(
                'justify' => array('fr' => 'Justifié'),
                'nojustify' => array('fr' => 'Pas justifié'),
                'hide' => array('fr' => 'Masquée'),
                'center' => array('fr' => 'Centrée'),
                'right' => array('fr' => 'Alignée à droite'),
            ),
            'eval' => array('tl_class' => 'w50'),
        ),
        'margin' => array(
            'label' => array(
                'fr' => array('Gouttière', 'Défaut: 0'),
            ),
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ),
        'extrernalMargin' => array(
            'label' => array(
                'fr' => array('Marges extérieures', 'Défaut: 0'),
            ),
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'w50',
            ),
        ),
        'target' => array(
            'label' => array(
                'fr' => array('Target du lien', 'Mettre _blank pour forcer l\'ouverture dans une nouvelle fenêtre'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50 m12 clr'),
        ),
        'randomize' => array(
            'label' => array(
                'fr' => array('Odre des photos au hasard', ''),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 m12 clr'),
        ),
        'captions' => array(
            'label' => array(
                'fr' => array('Afficher la légende', ''),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 m12 clr'),
        ),
    ),
);
