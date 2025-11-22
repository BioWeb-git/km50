<?php

return array(
	'label' => array(
		'en' => array('Note box', 'Create a fixed note box'),
		'de' => array('Hinweisbox', 'Erzeugt eine fixierte Hinweisbox'),
	),
	'types' => array('module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'icon' => array(
			'label' => array(
				'en' => array('Icon', ''),
				'de' => array('Icon', ''),
			),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => '', 'iconFont' => 'files/oneo/fonts/rocksolid-icons.svg'),
		),
		'text' => array(
			'label' => array(
				'en' => array('Text', ''),
				'de' => array('Text', ''),
			),
			'inputType' => 'text',
			'eval' => array('rte' => 'tinyMCE'),
		),
		'linkLabel' => array(
			'label' => array(
				'en' => array('More link caption', 'Optional link for further information.'),
				'de' => array('Mehr-Link-Bezeichnung', 'Optionaler Link für weitere Informationen.'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'linkUrl' => array(
			'label' => array(
				'en' => array('Link URL', 'Address of the detail link.'),
				'de' => array('Link-URL', 'Adresse des Mehr-Links.'),
			),
			'inputType' => 'url',
			'eval' => array('tl_class' => 'w50'),
		),
		'newWindow' => array(
			'label' => $GLOBALS['TL_LANG']['MSC']['target'],
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 m12'),
		),
		'buttonLabel' => array(
			'label' => array(
				'en' => array('Button caption', 'Caption of the confirmation button.'),
				'de' => array('Button-Bezeichnung', 'Bezeichnung des Bestätigungs-Buttons.'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50'),
		),
		'cookieDays' => array(
			'label' => array(
				'en' => array('Validity of the cookie', 'Number of days the cookie stays valid.'),
				'de' => array('Gültigkeitsdauer des Cookies', 'Anzahl der Tage bis das Cookie auslaufen soll.'),
			),
			'inputType' => 'text',
			'eval' => array(
				'tl_class' => 'clr w50',
				'rgxp' => 'digit',
			),
		),
		'allowReopen' => array(
			'label' => array(
				'en' => array('Re-open link', 'Adds a link to reactivate the note box after closing it.'),
				'de' => array('Wieder öffnen Link', 'Fügt einen Link ein um eine geschlossene Hinweisbox erneut zu öffnen.'),
			),
			'inputType' => 'checkbox',
			'eval' => array(
				'tl_class' => 'w50 m12',
			),
		),
	),
);
