<?php

declare(strict_types=1);

namespace App\Form;

use Contao\Environment;
use Contao\Input;
use Contao\System;
use Contao\Widget;
use Contao\CoreBundle\Monolog\ContaoContext;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class GoogleRecaptchaOverride extends Widget
{
    protected $strTemplate = 'form_google_recaptcha';

    private const SCORE_THRESHOLD = 0.7;

    public function __construct($arrAttributes = null)
    {
        parent::__construct($arrAttributes);

        $this->sitekey   = trim($this->placeholder ?? '');
        $this->secretkey = trim($this->text ?? '');

        if (empty($this->svalue)) {
            $this->svalue = $this->label ?? 'Envoyer le formulaire';
        }
    }

    private function log(string $message, string $level = LogLevel::INFO, string $action = ContaoContext::GENERAL): void
    {
        /** @var LoggerInterface $logger */
        $logger = System::getContainer()->get('monolog.logger.contao');

        // L'entête de log reste la même : "reCAPTCHA Override | IP:..."
        $logMessage = sprintf(
            "reCAPTCHA Override | IP:%s | %s",
            Environment::get('ip') ?: 'unknown',
            $message
        );

        // Contexte Contao obligatoire pour que ça apparaisse dans tl_log (Journal système)
        $context = ['contao' => new ContaoContext(__METHOD__, $action)];

        $logger->log($level, $logMessage, $context);
    }

    /** @return string */
    public function generate()
    {
        return parent::generate();
    }

    public function validate(): void
    {
        // 1. Log de présence : Confirme que le Honeypot est actif lors de la soumission
        $this->log("Initialisation de la validation : Honeypot actif.", LogLevel::DEBUG);

        $honeypot = Input::post('website_url'); 

        // 2. Vérification du Honeypot
        if (!empty($honeypot)) {
            // Log détaillé en cas d'échec : on enregistre la valeur pour voir ce que le bot a écrit
            $this->log(
                sprintf("[REJET HONEYPOT] Bot détecté. Le champ invisible contenait : '%s'. Soumission bloquée.", $honeypot), 
                LogLevel::WARNING, 
                ContaoContext::ACCESS
            );
            
            $this->addError('Erreur de validation système. Veuillez rafraîchir la page.');
            return;
        }

        $this->log("Début de la validation reCAPTCHA v3 pour le formulaire.", LogLevel::INFO);
        $token = Input::post('g-recaptcha-response');

        if (empty($token)) {
            $this->log("[ERREUR] Token g-recaptcha-response manquant. Soumission rejetée.", LogLevel::ERROR, ContaoContext::ERROR);
            $this->addError('Veuillez valider le reCAPTCHA.');
            return;
        }

        $response = @file_get_contents(
            'https://www.google.com/recaptcha/api/siteverify',
            false,
            stream_context_create([
                'http' => [
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                    'content' => http_build_query([
                        'secret'   => $this->secretkey,
                        'response' => $token,
                        'remoteip' => Environment::get('ip'),
                    ]),
                    'timeout' => 15,
                ],
            ])
        );

        $data = $response ? json_decode($response, true) : null;
        
        // Suppression du log de la réponse brute JSON pour nettoyer le journal

        if (!$data || empty($data['success'])) {
            $codes = $data['error-codes'] ?? ['unknown'];
            $this->log(
                sprintf("[ERREUR CRITIQUE] Échec de la vérification API Google (success=false). Codes d'erreur: %s", implode(', ', $codes)),
                LogLevel::ERROR,
                ContaoContext::ERROR
            );
            $this->addError('Échec de la vérification reCAPTCHA. Veuillez réessayer.');
            return;
        }

        $score = $data['score'] ?? 0.0;
        if ($score < self::SCORE_THRESHOLD) {
            $this->log(
                sprintf("[REJET] Score insuffisant. Obtenu: %s (Seuil requis: %s).", $score, self::SCORE_THRESHOLD),
                LogLevel::WARNING, // Niveau WARNING (Avertissement)
                ContaoContext::ACCESS
            );
            $this->addError('Action suspecte détectée. Merci de réessayer ou de nous contacter autrement.');
            return;
        }

        $this->log(
            sprintf("[ACCEPTÉ] Vérification reCAPTCHA réussie. Score: %s (Seuil: %s).", $score, self::SCORE_THRESHOLD),
            LogLevel::INFO, // Niveau INFO (Information)
            ContaoContext::ACCESS
        );
    }
}