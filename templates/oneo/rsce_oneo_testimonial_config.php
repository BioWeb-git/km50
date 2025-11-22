<?php

return array(
	'label' => array(
		'en' => array('Quote / Testimonial', 'Creates a quote with text and author'),
		'de' => array('Zitat / Testimonial', 'Erzeugt ein Zitat mit Text und Autor'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'size' => array(
			'label' => array(
				'en' => array('Font size', ''),
				'de' => array('Schriftgröße', ''),
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
				'' => array('en' => 'Default', 'de' => 'Standard'),
				'-small' => array('en' => 'Small', 'de' => 'Klein'),
				'-medium' => array('en' => 'Medium', 'de' => 'Mittel'),
				'-large' => array('en' => 'Large', 'de' => 'Groß'),
				'-super-size' => array('en' => 'Supersize', 'de' => 'Supersize'),
			),
		),
		'text' => array(
			'label' => array(
				'en' => array('Quote text', ''),
				'de' => array('Zitat-Text', ''),
			),
			'inputType' => 'textarea',
			'eval' => array('rte' => 'tinyMCE'),
		),
		'author' => array(
			'label' => array(
				'en' => array('Author', ''),
				'de' => array('Autor', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'authorPosition' => array(
			'label' => array(
				'en' => array('Author detail', ''),
				'de' => array('Autordetail', ''),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'authorUrl' => array(
			'label' => array(
				'en' => array('Detail link', ''),
				'de' => array('Detail-Link', ''),
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
