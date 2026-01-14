<?php

use App\FrontendModule\CustomCumulativeFilterModule;
// Surcharge du module standard
$GLOBALS['FE_MOD']['news']['newscategories_cumulativehierarchical'] = CustomCumulativeFilterModule::class;