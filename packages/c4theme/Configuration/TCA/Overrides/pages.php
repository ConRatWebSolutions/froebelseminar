<?php
declare(strict_types=1);

defined('TYPO3') || die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$temporaryColumns = [
    'tx_c4theme_page_heading' => [
        'exclude' => true,
        'label' => 'LLL:EXT:c4theme/Resources/Private/Language/locallang_db.xlf:pages.tx_c4theme_page_heading',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim',
            'max' => 255,
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('pages', $temporaryColumns);

// Das Feld zur Palette 'title' hinzufügen (nach dem Seitentitel)
ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    'tx_c4theme_page_heading',
    '',
    'after:title'
);