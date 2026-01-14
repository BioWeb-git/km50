<?php

declare(strict_types=1);

namespace App\Form\EventListener;

use App\Form\GoogleRecaptchaOverride;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Form;
use Contao\Widget;

#[AsHook('loadFormField')]
class LoadFormFieldListener
{
    public function __invoke(Widget $widget, string $formId, array $formData, Form $form): Widget
    {
        if (!\is_object($widget)) {
            return $widget;
        }
        // ... (ton code de debug) ...

        // Essaie plusieurs variantes possibles pour cette extension ancienne
        if (in_array($widget->type, ['google_recaptcha', 'googlerecaptcha', 'recaptcha', 'FormGoogleRecaptcha'])) {
            
            error_log('OVERRIDE RECAPTCHA ACTIVÉ pour type : ' . $widget->type);

            // 1. Récupère le tableau des attributs standards
            $attributes = $widget->getAttributes();

            // <--------------------------------------------------->
            // !!! CORRECTION CRITIQUE DU TYPE !!!
            // Sécurise $attributes au cas où getAttributes() retourne une string (ou null)
            if (!\is_array($attributes)) {
                $attributes = [];
                error_log('ATTENTION: $widget->getAttributes() n\'était pas un tableau. Initialisation forcée à [].');
            }
            // <--------------------------------------------------->

            // 2. INJECTION DES CLÉS MANQUANTES ! (Maintenant que $attributes est garanti d'être un tableau)
            // ... (le reste de ton code) ...
            $attributes['placeholder'] = $widget->placeholder ?? ''; 
            $attributes['text'] = $widget->text ?? '';
            
            error_log('CLÉS RECAPTCHA TRANSFÉRÉES. Placeholder (Sitekey) : ' . $attributes['placeholder']);

            // 3. Crée la nouvelle instance avec les clés
            return new GoogleRecaptchaOverride($attributes);
        }

        return $widget;
    }
}