<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:c4theme/Resources/Private/Language/locallang_db.xlf:tx_c4theme_contact',
        'label' => 'name',
        'label_alt' => 'email,subject',
        'label_alt_force' => 1,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
        'sortby' => 'sorting',
        'iconfile' => 'EXT:c4theme/Resources/Public/Icons/tx_c4theme_contact.svg',
        'searchFields' => 'name,email,subject,message',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'interface' => [
        'showRecordFieldList' => 'hidden,name,email,subject,message',
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    name, email, subject, message,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
            ',
        ],
    ],
    'palettes' => [
        'hidden' => [
            'showitem' => '
                hidden;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.enabled
            ',
        ],
        'access' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access',
            'showitem' => '
                starttime;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime,
                endtime;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime,
                --linebreak--,
                fe_group;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group
            ',
        ],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038),
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'fe_group' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => [
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                        'value' => -1,
                    ],
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                        'value' => -2,
                    ],
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                        'value' => '--div--',
                    ],
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
                'foreign_table_where' => 'ORDER BY fe_groups.title',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'name' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:c4theme/Resources/Private/Language/locallang_db.xlf:tx_c4theme_contact.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim,required',
            ],
        ],
        'email' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:c4theme/Resources/Private/Language/locallang_db.xlf:tx_c4theme_contact.email',
            'config' => [
                'type' => 'email',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim,required',
            ],
        ],
        'subject' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:c4theme/Resources/Private/Language/locallang_db.xlf:tx_c4theme_contact.subject',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 240,
                'eval' => 'trim,required',
            ],
        ],
        'message' => [
            'exclude' => 0,
            'label' => 'LLL:EXT:c4theme/Resources/Private/Language/locallang_db.xlf:tx_c4theme_contact.message',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim,required',
            ],
        ],
    ],
]; 