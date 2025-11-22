<?php

return array(
	'label' => array(
		'en' => array('Quote / Testimonial', 'Creates a quote with text and author'),
		'de' => array('Zitat / Testimonial', 'Erzeugt ein Zitat mit Text und Autor'),
        'fr' => array('Citation / Témoignage', 'Crée une citation avec texte et auteur'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'size' => array(
			'label' => array(
				'en' => array('Font size', ''),
				'de' => array('Schriftgröße', ''),
                'fr' => array('Taille de police', ''),
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
		),
		'text' => array(
			'label' => array(
				'en' => array('Quote text', ''),
				'de' => array('Zitat-Text', ''),
                'fr' => array('Texte de la citation', ''),
            ),
			'inputType' => 'textarea',
			'eval' => array('rte' => 'tinyMCE', 'basicEntities' => true,),
		),
		'author' => array(
			'label' => array(
				'en' => array('Author', ''),
				'de' => array('Autor', ''),
                'fr' => array('Auteur', ''),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true,),
		),
		'authorPosition' => array(
			'label' => array(
				'en' => array('Author detail', ''),
				'de' => array('Autordetail', ''),
                'fr' => array('Détail de l\'auteur', ''),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true,),
		),
		'authorUrl' => array(
			'label' => array(
				'en' => array('Detail link', ''),
				'de' => array('Detail-Link', ''),
                'fr' => array('Detail du lien', ''),
            ),
			'inputType' => 'url',
			'eval' => array('tl_class' => 'w50'),
		),
		'newWindow' => array(
			'label' => $GLOBALS['TL_LANG']['MSC']['target'],
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'authorAvatar' => array(
			'label' => array(
				'en' => array('Author image', ''),
				'de' => array('Autor-Bild', ''),
                'fr' => array('Avatar de l\'auteur', ''),
            ),
			'inputType' => 'fileTree',
			'eval' => array(
				'fieldType' => 'radio',
				'filesOnly' => true,
				'extensions' => implode(',', Contao\System::getContainer()->getParameter('contao.image.valid_extensions')),
				'tl_class' => 'clr',
			),
		),
	),
);
