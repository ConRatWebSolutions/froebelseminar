<?php
defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
 

// Configure Plugin
ExtensionUtility::configurePlugin(
    'Conratpresse',
    'Conratpresse',
    [
        \Conrat\Conratpresse\Controller\PresseartikelController::class => 'list, show',
 
    ],
    // non-cacheable actions
    [
        \Conrat\Conratpresse\Controller\PresseartikelController::class => '',
 
    ]
);




 





 