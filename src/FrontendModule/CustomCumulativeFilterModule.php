<?php

declare(strict_types=1);

/*
 * News Categories bundle for Contao Open Source CMS.
 *
 * @copyright  Copyright (c) 2024, Codefog
 * @author     Codefog <https://codefog.pl>
 * @license    MIT
 */

// CORRECTION 1 & 2 : Changement du namespace pour correspondre à la configuration Contao
namespace App\FrontendModule;

use Codefog\NewsCategoriesBundle\FrontendModule\NewsModule; // CORRECTION 3 : Import de la classe parente
use Codefog\NewsCategoriesBundle\Model\NewsCategoryModel;
use Codefog\NewsCategoriesBundle\NewsCategoriesManager;
use Contao\CoreBundle\Routing\ResponseContext\HtmlHeadBag\HtmlHeadBag;
use Contao\Database;
use Contao\FrontendTemplate;
use Contao\Input;
use Contao\System;

// CORRECTION 2 : Renommage de la classe pour correspondre à la configuration Contao
class CustomCumulativeFilterModule extends NewsModule
{
   /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'mod_newscategories';

    /**
     * Generate the module.
     */
    protected function compile(): void
    {
        $categories = $this->getCategories();

        // Return if no categories are found
        if (null === $categories) {
            $this->Template->categories = '';

            return;
        }

        $container = System::getContainer();
        $param = $container->get(NewsCategoriesManager::class)->getParameterName();

        // Get the active category
        if (($alias = Input::get($param)) && null !== ($activeCategory = NewsCategoryModel::findPublishedByIdOrAlias($alias))) {
            $this->activeCategory = $activeCategory;

            // Set the canonical URL
            if ($this->news_enableCanonicalUrls && ($responseContext = $container->get('contao.routing.response_context_accessor')->getResponseContext())) {
                if ($responseContext->has(HtmlHeadBag::class)) {
                    /** @var HtmlHeadBag $htmlHeadBag */
                    $htmlHeadBag = $responseContext->get(HtmlHeadBag::class);
                    $htmlHeadBag->setCanonicalUri($GLOBALS['objPage']->getAbsoluteUrl());
                }
            }
        }

        $ids = [];

        // Get the parent categories IDs
        /** @var NewsCategoryModel $category */
        foreach ($categories as $category) {
            $ids = array_merge($ids, Database::getInstance()->getParentRecords($category->id, $category->getTable()));
        }

        $this->Template->categories = $this->renderNewsCategories((int) $this->news_categoriesRoot, array_unique($ids));
    }

    /**
     * Recursively compile the news categories and return it as HTML string.
     *
     * @param int $pid
     * @param int $level
     *
     * @return string
     */
    protected function renderNewsCategories($pid, array $ids, $level = 1)
    {
        if (null === ($categories = NewsCategoryModel::findPublishedByIds($ids, $pid))) {
            return '';
        }

        // Layout template fallback
        if (!$this->navigationTpl) {
            $this->navigationTpl = 'nav_newscategories_hierarchical';
        }

        $template = new FrontendTemplate($this->navigationTpl);
        $template->type = static::class;
        $template->cssID = $this->cssID;
        $template->level = 'level_'.$level;
        $template->showQuantity = $this->news_showQuantity;

        $items = [];
        $activeCategories = $this->getActiveCategories($ids);

        // Add the "reset categories" link
        if ($this->news_resetCategories && 1 === $level) {
            $items[] = $this->generateItem(
                $this->getTargetPage()->getFrontendUrl(),
                $GLOBALS['TL_LANG']['MSC']['resetCategories'][0],
                $GLOBALS['TL_LANG']['MSC']['resetCategories'][1],
                'reset',
                null === $activeCategories || 0 === \count($activeCategories),
            );
        }

        $activeAliases = [];

        // Collect the active category parameters
        if (null !== $activeCategories) {
            /** @var NewsCategoryModel $activeCategory */
            foreach ($activeCategories as $activeCategory) {
                $activeAliases[] = $activeCategory->getAlias($GLOBALS['TL_LANGUAGE']);
            }
        }

        // Début de la correction (URL)
        $targetPage = $this->getTargetPage();
        $baseParam = '/'.$this->manager->getParameterName($GLOBALS['objPage']->rootId).'/';
        $resetUrl = $targetPage->getFrontendUrl();
        // Fin de la correction (URL)

        /** @var NewsCategoryModel $category */
        foreach ($categories as $category) {
            // Generate the category individual URL or the filter-link
            $categoryAlias = $category->getAlias($GLOBALS['TL_LANGUAGE']);
            
            // Calcul du statut actif (C'EST LA CLÉ)
            $isActive = \in_array($categoryAlias, $activeAliases, true);

            // Add/remove the category alias to the active ones
            // On utilise la variable $isActive pour déterminer si on enlève ou ajoute l'alias
            if ($isActive) { 
                $aliases = array_diff($activeAliases, [$categoryAlias]);
            } else {
                $aliases = [...$activeAliases, $categoryAlias];
            }

            // Get the URL
            if (\count($aliases) > 0) {
                // Correction appliquée ici
                $url = $targetPage->getFrontendUrl($baseParam.implode(static::getCategorySeparator(), $aliases));
            } else {
                $url = $resetUrl;
            }

            // L'incrémentation doit rester ici pour l'appel récursif (logique originale du module)
            $nextLevel = $level + 1;

            $items[] = $this->generateItem(
                $url,
                $category->getTitle(),
                $category->getTitle(),
                $this->generateItemCssClass($category),
                $isActive, // <--- **ICI** : On utilise le statut $isActive calculé
                !$this->showLevel || $this->showLevel >= $nextLevel ? $this->renderNewsCategories($category->id, $ids, $nextLevel) : '',
                $category,
            );
        }

        $template->items = $items;

        return $template->parse();
    }
}