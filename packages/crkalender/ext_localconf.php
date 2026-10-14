<?php
declare(strict_types=1);

 
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
 

defined('TYPO3') or die('Access denied.');



// Configure Plugin
ExtensionUtility::configurePlugin(
    'Crkalender',
    'Crkalender',
    [
        \Conrat\Crkalender\Controller\EintragController::class => 'list, detail, show, new, create, edit, update, delete',
        \Conrat\Crkalender\Controller\KategorieController::class => 'list, show'
    ],
    // non-cacheable actions
    [
        \Conrat\Crkalender\Controller\EintragController::class => 'new, create, edit, update, delete',
        \Conrat\Crkalender\Controller\KategorieController::class => ''
    ]
);




 