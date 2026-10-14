<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

ExtensionManagementUtility::addStaticFile(
    'crtraegertreffen',
    'Configuration/TypoScript',
    'Crtraegertreffen Configuration'
);

$pluginSignature = ExtensionUtility::registerPlugin(
    'Crtraegertreffen',
    'Crtraegertreffen',
    'Traegertreffen',
);


$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature]
    = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:crtraegertreffen/Configuration/FlexForms/abfrage.xml'
);