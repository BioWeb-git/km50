<?php

return array(
	'label' => array(
		'en' => array('Definition list', 'Create a definition list with text and description'),
		'de' => array('Definitionsliste', 'Erzeug eine Definitionsliste aus Listenpunkt und Erklärung'),
	),
	'types' => array('content'),
	'standardFields' => array('cssID', 'headline'),
	'fields' => array(
		'columns' => array(
			'label' => array(
				'en' => array('List columns', ''),
				'de' => array('Listenspalten', ''),
			),
			'elementLabel' => array(
				'en' => 'Column %s',
				'de' => 'Spalte %s',
			),
			'inputType' => 'list',
			'fields' => array(
				'items' => array(
					'label' => array(
						'en' => array('List items', ''),
						'de' => array('Listenelemente', ''),
					),
					'elementLabel' => 'Element %s',
					'inputType' => 'list',
					'fields' => array(
						'icon' => array(
							'label' => array(
								'en' => array('Icon', ''),
								'de' => array('Icon', ''),
							),
							'inputType' => 'rocksolid_icon_picker',
							'eval' => array('tl_class' => '', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
						),
						'title' => array(
							'label' => array(
								'en' => array('Field title', ''),
								'de' => array('Feldtitel', ''),
							),
							'inputType' => 'text',
							'eval' => array('tl_class' => 'w50'),
						),
						'description' => array(
							'label' => array(
								'en' => array('Description', ''),
								'de' => array('Beschreibung', ''),
							),
							'inputType' => 'text',
							'eval' => array('tl_class' => 'w50'),
						),
						'url' => array(
							'label' => array(
								'en' => array('Link text', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
								'de' => array('Text verlinken', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
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
				),
			),
		),
	),
);
