<?php
defined('TYPO3') or die('Access denied.');

// Register plugin in backend
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'C4theme',
    'Preise',
    'Preise',
    'EXT:c4theme/Resources/Public/Icons/tx_c4theme_domain_model_preise.svg'
);

// Include Banner content element configuration
require_once \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('c4theme') . 'Configuration/TCA/Overrides/tt_content_banner.php';