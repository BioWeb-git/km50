<?php

return array(
	'label' => array(
		'en' => array('Oneo footer copyright', 'Copyright text in the footer'),
		'de' => array('Oneo Footer-Copyright', 'Copyright-Text in der Fußzeile'),
        'fr' => array('Footer copyright', 'Texte de copyright dans le pied de page'),
    ),
	'types' => array('module'),
	'standardFields' => array('cssID'),
	'fields' => array(
		'text' => array(
			'label' => array(
				'en' => array('Copyright text', ''),
				'de' => array('Copyright-Text', ''),
                'fr' => array('Texte du copyright', ''),
            ),
            'inputType' => 'textarea',
            'eval' => array(
                'rte' => 'tinyMCE',
                'tl_class' => 'clr',
                'basicEntities' => true,
            ),
		),
		'license' => array(
			'label' => array(
                'en' => array('Remove copyright link', 'The copyright notice may only be removed with the appropriate license.'),
                'de' => array('Copyright-Link entfernen', 'Der Copyright-Hinweis darf nur mit entsprechender Lizenz entfernt werden.'),
                'fr' => array('Supprimer le lien de copyright', 'L\'avis de droit d\'auteur ne peut être supprimé qu\'avec la licence appropriée.'),

			),
			'inputType' => 'checkbox',
		),
	),
);
