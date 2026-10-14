<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:crbuchkatalog/Resources/Private/Language/locallang_db.xlf:tx_crbuchkatalog_domain_model_eintrag',
        'label' => 'titel',
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
        'searchFields' => 'titel,autor,veroeffentlichungsjahr,kurzbeschreibung,schlagworte',
        'iconfile' => 'EXT:crbuchkatalog/Resources/Public/Icons/tx_crbuchkatalog_domain_model_eintrag.gif',
        'descriptionColumn' => 'titel'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, titel, autor, veroeffentlichungsjahr, kurzbeschreibung, pdf, schlagworte, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_crbuchkatalog_domain_model_eintrag',
                'foreign_table_where' => 'AND {#tx_crbuchkatalog_domain_model_eintrag}.{#pid}=###CURRENT_PID### AND {#tx_crbuchkatalog_domain_model_eintrag}.{#sys_language_uid} IN (-1,0)',
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

        'titel' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crbuchkatalog/Resources/Private/Language/locallang_db.xlf:tx_crbuchkatalog_domain_model_eintrag.titel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'autor' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crbuchkatalog/Resources/Private/Language/locallang_db.xlf:tx_crbuchkatalog_domain_model_eintrag.autor',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'veroeffentlichungsjahr' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crbuchkatalog/Resources/Private/Language/locallang_db.xlf:tx_crbuchkatalog_domain_model_eintrag.veroeffentlichungsjahr',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'kurzbeschreibung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crbuchkatalog/Resources/Private/Language/locallang_db.xlf:tx_crbuchkatalog_domain_model_eintrag.kurzbeschreibung',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
            
        ],
        'pdf' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crbuchkatalog/Resources/Private/Language/locallang_db.xlf:tx_crbuchkatalog_domain_model_eintrag.pdf',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'pdf'
                ],
                'foreign_label' => 'uid_local',
                'foreign_selector' => 'uid_local',
                'overrideChildTca' => [
                    'columns' => [
                        'uid_local' => [
                            'config' => [
                                'appearance' => [
                                    'elementBrowserType' => 'file',
                                    'elementBrowserAllowed' => 'pdf'
                                ]
                            ]
                        ]
                    ]
                ],
                'appearance' => [
                    'useSortable' => true,
                    'headerThumbnail' => [
                        'field' => 'uid_local',
                        'width' => '45',
                        'height' => '45c'
                    ],
                    'enabledControls' => [
                        'info' => true,
                        'new' => true,
                        'dragdrop' => true,
                        'sort' => true,
                        'hide' => true,
                        'delete' => true,
                        'localize' => true
                    ]
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ],
                'maxitems' => 1
            ],
        ],
        'schlagworte' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crbuchkatalog/Resources/Private/Language/locallang_db.xlf:tx_crbuchkatalog_domain_model_eintrag.schlagworte',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim'
            ]
        ],
    
    ],
];
