<?php

return array(
	'label' => array(
		'en' => array('Text with icon', 'Creates a paragraph with icon'),
		'de' => array('Absatz mit Icon', 'Erzeugt einen Absatz mit Icon'),
	),
	'types' => array('module', 'content'),
	'standardFields' => array('headline', 'cssID'),
	'fields' => array(
		'text' => array(
			'label' => array(
				'en' => array('Text', ''),
				'de' => array('Text', ''),
			),
			'inputType' => 'textarea',
			'eval' => array(
				'rte' => 'tinyMCE',
				'tl_class' => 'clr',
			),
		),
		'icon' => array(
			'label' => array(
				'en' => array('Icon', ''),
				'de' => array('Icon', ''),
			),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => '', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
		),
	),
);
