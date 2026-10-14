<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
 
 
 

    
    // Configure Plugin
    ExtensionUtility::configurePlugin(
        'Crtraegertreffen',
        'Crtraegertreffen',
        [
            \Conrat\Crtraegertreffen\Controller\PDFController::class => 'list, show, login, logouts',
            \Conrat\Crtraegertreffen\Controller\EintragController::class => 'list, show, newforms'
        ],
        // non-cacheable actions
        [
            \Conrat\Crtraegertreffen\Controller\PDFController::class => 'list, show, login, logouts',
            \Conrat\Crtraegertreffen\Controller\EintragController::class => 'list, show, newforms',
        ]
    );
