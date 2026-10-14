<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag',
        'label' => 'frage',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
         'foreign_sortby' => 'sortings',
         'sortby' => 'sortings',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'frage,antwort,blog1,blog2',
        'iconfile' => 'EXT:crfaq/Resources/Public/Icons/tx_crfaq_domain_model_eintrag.gif'
    ],
    'descriptionColumn' => 'frage',
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, frage, antwort, bilder, blog1, blog1bilder, blog2, blog2bilder, downloads, sortings, kategorie, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_crfaq_domain_model_eintrag',
                'foreign_table_where' => 'AND {#tx_crfaq_domain_model_eintrag}.{#pid}=###CURRENT_PID### AND {#tx_crfaq_domain_model_eintrag}.{#sys_language_uid} IN (-1,0)',
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

        'frage' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag.frage',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'antwort' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag.antwort',
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
        'bilder' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag.bilder',
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
        'blog1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag.blog1',
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
        'blog1bilder' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag.blog1bilder',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'blog1bilder'
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
        'blog2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag.blog2',
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
        'blog2bilder' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag.blog2bilder',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'blog2bilder'
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
        'downloads' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag.downloads',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'downloads'
                ],
                'foreign_label' => 'uid_local',
                'foreign_selector' => 'uid_local',
                'overrideChildTca' => [
                    'columns' => [
                        'uid_local' => [
                            'config' => [
                                'appearance' => [
                                    'elementBrowserType' => 'file',
                                    'elementBrowserAllowed' => 'pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip,rar'
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
        'sortings' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag.sortings',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
        'kategorie' => [ 
            'exclude' => true,
            'label' => 'LLL:EXT:crfaq/Resources/Private/Language/locallang_db.xlf:tx_crfaq_domain_model_eintrag.kategorie',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingleBox',
                'foreign_table' => 'tx_crfaq_domain_model_kategorie',
                'MM' => 'tx_crfaq_eintrag_kategorie_mm',
            ],
            
        ],
    
    ],
];
