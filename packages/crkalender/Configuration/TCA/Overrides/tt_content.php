<?php
declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

ExtensionManagementUtility::addStaticFile(
    'crkalender',
    'Configuration/TypoScript',
    'Crkalender Configuration'
);

$pluginSignature = ExtensionUtility::registerPlugin(
    'Crkalender',
    'Crkalender',
    'Veranstaltungen'
);


$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature]
    = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:crkalender/Configuration/FlexForms/abfrage.xml'
);