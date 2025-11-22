<?php

return array(
	'label' => array(
		'en' => array('Definition list', 'Create a definition list with text and description'),
		'de' => array('Definitionsliste', 'Erzeug eine Definitionsliste aus Listenpunkt und Erklärung'),
        'fr' => array('Liste de définition', 'Créer une liste de définitions avec texte et description'),
    ),
	'types' => array('content'),
	'standardFields' => array('cssID', 'headline'),
	'fields' => array(
		'columns' => array(
			'label' => array(
				'en' => array('List columns', ''),
				'de' => array('Listenspalten', ''),
                'fr' => array('Colonnes de liste', ''),
            ),
			'elementLabel' => array(
				'en' => 'Column %s',
				'de' => 'Spalte %s',
				'fr' => 'Colonne %s',
			),
			'inputType' => 'list',
			'fields' => array(
				'items' => array(
					'label' => array(
						'en' => array('List items', ''),
						'de' => array('Listenelemente', ''),
                        'fr' => array('Éléments de la liste', ''),
                    ),
					'elementLabel' => array(
                        'en' => 'Element %s',
                        'de' => 'Element %s',
                        'fr' => 'Elément %s',
                    ),
					'inputType' => 'list',
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
						'title' => array(
							'label' => array(
								'en' => array('Field title', ''),
								'de' => array('Feldtitel', ''),
                                'fr' => array('Titre du champ', ''),
                            ),
							'inputType' => 'text',
							'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
						),
						'description' => array(
							'label' => array(
								'en' => array('Description', ''),
								'de' => array('Beschreibung', ''),
                                'fr' => array('Description', ''),
                            ),
							'inputType' => 'text',
							'eval' => array('tl_class' => 'w50', 'basicEntities' => true),
						),
						'url' => array(
							'label' => array(
								'en' => array('Link text', 'Examples: #contact, {{link_url::pagealias}} to alias, ID or other insert tag, http://example.com'),
								'de' => array('Text verlinken', 'Beispiele: {{link_url::seitenalias}} auf Alias, ID oder anderen Insert-Tag, http://example.com'),
                                'fr' => array('URL du lien', 'Exemples: #contact, {{link_url::pagealias}} vers l\'alias, ID ou autre insert tag, http://example.com'),
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
