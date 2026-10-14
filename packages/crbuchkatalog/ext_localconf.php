<?php
 

defined('TYPO3') or die('Access denied.');



use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
 
 
 

    
    // Configure Plugin
    ExtensionUtility::configurePlugin(
        'Crbuchkatalog',
        'Crbuchkatalog',
        [
            \Conrat\Crbuchkatalog\Controller\EintragController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \Conrat\Crbuchkatalog\Controller\EintragController::class => '',
        ]
    );

 
 