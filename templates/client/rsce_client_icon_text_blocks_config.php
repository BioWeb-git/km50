<?php

return array(
	'label' => array(
		'en' => array('Text with icon', 'Creates a paragraph with icon'),
		'de' => array('Absatz mit Icon', 'Erzeugt einen Absatz mit Icon'),
        'fr' => array('Texte avec icone', 'Crée un paragraphe avec l\'icône'),
    ),
	'types' => array('module', 'content'),
	'standardFields' => array('headline', 'cssID'),
	'fields' => array(
		'text' => array(
			'label' => array(
				'en' => array('Text', ''),
				'de' => array('Text', ''),
                'fr' => array('Texte', ''),
            ),
			'inputType' => 'textarea',
			'eval' => array(
				'rte' => 'tinyMCE',
				'tl_class' => 'clr',
                'basicEntities' => true,
			),
		),
		'icon' => array(
			'label' => array(
				'en' => array('Icon', ''),
				'de' => array('Icon', ''),
                'fr' => array('Icône', ''),
            ),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
		),
	),
);
