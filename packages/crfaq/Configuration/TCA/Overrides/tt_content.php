<?php
declare(strict_types=1);

defined('TYPO3') || die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;




ExtensionManagementUtility::addStaticFile(
    'crfaq',
    'Configuration/TypoScript',
    'FAQ'
);

$pluginSignature = ExtensionUtility::registerPlugin(
    'Crfaq',
    'Crfaq',
    'FAQ',
);


$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature]
    = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:crfaq/Configuration/FlexForms/abfrage.xml'
);



