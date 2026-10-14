<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

// Register static files
ExtensionManagementUtility::addStaticFile(
    'crbuchkatalog',
    'Configuration/TypoScript',
    'ConRat Buchkatalog Configuration'
);

// Register plugin
$pluginSignature = ExtensionUtility::registerPlugin(
    'Crbuchkatalog',
    'Crbuchkatalog',
    'Buchkatalog'
);

// Add FlexForm to plugin (if needed)
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature]
    = 'pi_flexform';
