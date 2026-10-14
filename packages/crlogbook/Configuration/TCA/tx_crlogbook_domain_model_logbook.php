<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_db.xlf:tx_crlogbook_domain_model_logbook',
        'label' => 'datum',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'start,ende,von,bemerkung,grund,user',
        'iconfile' => 'EXT:crlogbook/Resources/Public/Icons/tx_crlogbook_domain_model_logbook.gif',
        'descriptionColumn' => 'datum'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, datum, start, ende, fahrstrecke, von, bis, bemerkung, grund, user, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_crlogbook_domain_model_logbook',
                'foreign_table_where' => 'AND {#tx_crlogbook_domain_model_logbook}.{#pid}=###CURRENT_PID### AND {#tx_crlogbook_domain_model_logbook}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'datum' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_db.xlf:tx_crlogbook_domain_model_logbook.datum',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
        ],
        'start' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_db.xlf:tx_crlogbook_domain_model_logbook.start',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'ende' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_db.xlf:tx_crlogbook_domain_model_logbook.ende',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'fahrstrecke' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_db.xlf:tx_crlogbook_domain_model_logbook.fahrstrecke',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'von' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_db.xlf:tx_crlogbook_domain_model_logbook.von',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'bis' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_db.xlf:tx_crlogbook_domain_model_logbook.bis',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'bemerkung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_db.xlf:tx_crlogbook_domain_model_logbook.bemerkung',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'grund' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_db.xlf:tx_crlogbook_domain_model_logbook.grund',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
        'user' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_db.xlf:tx_crlogbook_domain_model_logbook.user',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
    
    ],
];
