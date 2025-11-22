<?php

return array(
	'label' => array(
		'en' => array('Note box', 'Create a fixed note box'),
		'de' => array('Hinweisbox', 'Erzeugt eine fixierte Hinweisbox'),
        'fr' => array('Boîte de note', 'Créer une boîte à notes fixe'),
    ),
	'types' => array('module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'icon' => array(
			'label' => array(
				'en' => array('Icon', ''),
				'de' => array('Icon', ''),
				'fr' => array('Icône', ''),
			),
			'inputType' => 'rocksolid_icon_picker',
			'eval' => array('tl_class' => '', 'iconFont' => 'files/client/fonts/rocksolid-icons.svg'),
		),
		'text' => array(
			'label' => array(
				'en' => array('Text', ''),
				'de' => array('Text', ''),
                'fr' => array('Texte', ''),
            ),
			'inputType' => 'text',
			'eval' => array('rte' => 'tinyMCE', 'basicEntities' => true),
		),
		'linkLabel' => array(
			'label' => array(
				'en' => array('More link caption', 'Optional link for further information.'),
				'de' => array('Mehr-Link-Bezeichnung', 'Optionaler Link für weitere Informationen.'),
                'fr' => array('Légende du lien Lire plus', 'Lien facultatif pour plus d\'informations.'),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
		),
		'linkUrl' => array(
			'label' => array(
				'en' => array('Link URL', 'Address of the detail link.'),
				'de' => array('Link-URL', 'Adresse des Mehr-Links.'),
                'fr' => array('URL du lien', 'Adresse du lien de détail.'),
            ),
			'inputType' => 'url',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
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
                'fr' => array('Texte du bouton', 'Légende du bouton de confirmation.'),
            ),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
		),
		'cookieDays' => array(
			'label' => array(
				'en' => array('Validity of the cookie', 'Number of days the cookie stays valid.'),
				'de' => array('Gültigkeitsdauer des Cookies', 'Anzahl der Tage bis das Cookie auslaufen soll.'),
                'fr' => array('Validité du cookie', 'Nombre de jours pendant lesquels le cookie reste valide.'),
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
                'fr' => array('Rouvrir le lien', 'Ajoute un lien pour réactiver la boîte de note après l\'avoir fermée.'),
            ),
			'inputType' => 'checkbox',
			'eval' => array(
				'tl_class' => 'w50 m12',
			),
		),
	),
);
