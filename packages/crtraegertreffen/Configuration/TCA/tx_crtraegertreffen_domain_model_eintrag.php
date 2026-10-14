<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag',
        'label' => 'name',
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
        'searchFields' => 'name,anschrift,telefon,email,web,zielgruppe,angebotsformen,schwerpunkte,ansprechpartner,sonstiges,aptelefon,apemail,apkontankt,praktikum,facebook,logourl,instagram,youtube',
        'iconfile' => 'EXT:crtraegertreffen/Resources/Public/Icons/tx_crtraegertreffen_domain_model_eintrag.gif',
        'descriptionColumn' => 'name'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, anschrift, telefon, email, web, zielgruppe, angebotsformen, schwerpunkte, ansprechpartner, sonstiges, aptelefon, apemail, apkontankt, praktikum, facebook, logo, logourl, instagram, youtube, kategorie, standort, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_crtraegertreffen_domain_model_eintrag',
                'foreign_table_where' => 'AND {#tx_crtraegertreffen_domain_model_eintrag}.{#pid}=###CURRENT_PID### AND {#tx_crtraegertreffen_domain_model_eintrag}.{#sys_language_uid} IN (-1,0)',
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

        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'anschrift' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.anschrift',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'telefon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.telefon',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'web' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.web',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'zielgruppe' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.zielgruppe',
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
        'angebotsformen' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.angebotsformen',
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
        'schwerpunkte' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.schwerpunkte',
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
        'ansprechpartner' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.ansprechpartner',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'sonstiges' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.sonstiges',
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
        'aptelefon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.aptelefon',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'apemail' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.apemail',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'apkontankt' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.apkontankt',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'praktikum' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.praktikum',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'facebook' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.facebook',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'logo' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.logo',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'logo',
                    'tablenames' => 'tx_crtraegertreffen_domain_model_eintrag',
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
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ],
                'maxitems' => 1,
                'minitems' => 0
            ],
        ],
        'logourl' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.logourl',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'instagram' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.instagram',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'youtube' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.youtube',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'kategorie' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.kategorie',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_crtraegertreffen_domain_model_kategorie',
                'MM' => 'tx_crtraegertreffen_eintrag_kategorie_mm',
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
        'standort' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_eintrag.standort',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_crtraegertreffen_domain_model_standort',
                'MM' => 'tx_crtraegertreffen_eintrag_standort_mm',
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
