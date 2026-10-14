<?php

defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

// Configure Plugin
ExtensionUtility::configurePlugin(
    'Crlogbook',
    'Crlogbook',
    [
        \Conrat\Crlogbook\Controller\LogbookController::class => 'list, edit, updatedrive, newdrive, login, oauth, logouts, crons'
    ],
    // non-cacheable actions
    [
        \Conrat\Crlogbook\Controller\LogbookController::class => 'list, edit, updatedrive, newdrive, login, oauth, logouts, crons',
    ]
);

// Include Backend Module Configuration
if (defined('TYPO3_REQUEST') && $GLOBALS['TYPO3_REQUEST'] instanceof \Psr\Http\Message\ServerRequestInterface) {
    $applicationType = \TYPO3\CMS\Core\Http\ApplicationType::fromRequest($GLOBALS['TYPO3_REQUEST']);
    if ($applicationType->isBackend()) {
        require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('crlogbook') . 'Configuration/Backend/Modules.php';
    }
} else {
    // Fallback: Lade Backend-Modul immer, da ext_localconf.php hauptsächlich im Backend-Kontext läuft
    require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('crlogbook') . 'Configuration/Backend/Modules.php';
}
 