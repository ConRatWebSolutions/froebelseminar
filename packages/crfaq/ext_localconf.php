<?php
declare(strict_types=1);

defined('TYPO3') || die('Access denied.');

 
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
 
 
    // Configure Plugin
    ExtensionUtility::configurePlugin(
        'Crfaq',
        'Crfaq',
        [
            \Conrat\Crfaq\Controller\EintragController::class => 'list, show',
            \Conrat\Crfaq\Controller\KategorieController::class => 'list'
        ],
        // non-cacheable actions
        [
            \Conrat\Crfaq\Controller\EintragController::class => 'list, show',
            \Conrat\Crfaq\Controller\KategorieController::class => 'list',
        ]
    );





 