<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag',
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
        'searchFields' => 'titel,kurzbeschreibung,beschreibung,ort,erstellt,link,bemerkung,bemerkung1,kosten,anmledung,referent,google_id',
        'iconfile' => 'EXT:crkalender/Resources/Public/Icons/tx_crkalender_domain_model_eintrag.gif',
        'descriptionColumn' => 'kurzbeschreibung'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, titel, datum, zeit, bis, bzeit, kurzbeschreibung, beschreibung, ort, erstellt, link,   bilder, kategorie, filter, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_crkalender_domain_model_eintrag',
                'foreign_table_where' => 'AND {#tx_crkalender_domain_model_eintrag}.{#pid}=###CURRENT_PID### AND {#tx_crkalender_domain_model_eintrag}.{#sys_language_uid} IN (-1,0)',
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
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.titel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'datum' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.datum',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
        ],
        'zeit' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.zeit',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 4,
                'eval' => 'time',
                'default' => time()
            ]
        ],
        'bis' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.bis',
            'config' => [
                'dbType' => 'datetime',
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 12,
                'eval' => 'datetime',
                'default' => null,
            ],
        ],
        'bzeit' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.bzeit',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 4,
                'eval' => 'time',
                'default' => time()
            ]
        ],
        'kurzbeschreibung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.kurzbeschreibung',
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
        'beschreibung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.beschreibung',
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
        'ort' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.ort',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'erstellt' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.erstellt',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'link' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.link',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'bemerkung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.bemerkung',
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
        'bemerkung1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.bemerkung1',
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
        'kosten' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.kosten',
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
        'anmledung' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.anmledung',
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
        'referent' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.referent',
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
        'google_id' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.google_id',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'bilder' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.bilder',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'bilder'
                ],
                'foreign_label' => 'uid_local',
                'foreign_selector' => 'uid_local',
                'overrideChildTca' => [
                    'columns' => [
                        'uid_local' => [
                            'config' => [
                                'appearance' => [
                                    'elementBrowserType' => 'file',
                                    'elementBrowserAllowed' => 'jpg,jpeg,png,gif,svg,webp'
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
        'kategorie' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.kategorie',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_crkalender_domain_model_kategorie',
                'MM' => 'tx_crkalender_eintrag_kategorie_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'filter' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crkalender/Resources/Private/Language/locallang_db.xlf:tx_crkalender_domain_model_eintrag.filter',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_crkalender_domain_model_filter',
                'MM' => 'tx_crkalender_eintrag_filter_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
    
    ],
];
