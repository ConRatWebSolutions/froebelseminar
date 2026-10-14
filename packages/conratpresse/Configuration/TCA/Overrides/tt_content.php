<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

// Register static files
ExtensionManagementUtility::addStaticFile(
    'conratpresse',
    'Configuration/TypoScript',
    'Conratpresse Configuration'
);

// Register plugin
$pluginSignature = ExtensionUtility::registerPlugin(
    'Conratpresse',
    'Conratpresse',
    'Presseartikel'
);

// Add FlexForm to plugin
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature]
    = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:conratpresse/Configuration/FlexForms/abfrage.xml'
);
