<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') or die('Access denied.');


/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['c4theme'] = 'EXT:c4theme/Configuration/RTE/Default.yaml';

/***************
 * PageTS
 */
ExtensionManagementUtility::addPageTSConfig('@import "EXT:c4theme/Configuration/TsConfig/Page/All.tsconfig"');

/***************
 * TCA Overrides
 */
require_once ExtensionManagementUtility::extPath('c4theme') . 'Configuration/TCA/Overrides/pages.php';

 
