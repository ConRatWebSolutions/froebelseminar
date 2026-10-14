<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_pdf',
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
        'searchFields' => 'titel,youtube,webseite,facebook,instagram',
        'iconfile' => 'EXT:crtraegertreffen/Resources/Public/Icons/tx_crtraegertreffen_domain_model_pdf.gif',
        'descriptionColumn' => 'titel'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, titel, pdf, youtube, webseite, facebook, instagram, kategorie, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_crtraegertreffen_domain_model_pdf',
                'foreign_table_where' => 'AND {#tx_crtraegertreffen_domain_model_pdf}.{#pid}=###CURRENT_PID### AND {#tx_crtraegertreffen_domain_model_pdf}.{#sys_language_uid} IN (-1,0)',
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
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_pdf.titel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'pdf' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_pdf.pdf',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'sys_file_reference',
                'foreign_field' => 'uid_foreign',
                'foreign_sortby' => 'sorting_foreign',
                'foreign_table_field' => 'tablenames',
                'foreign_match_fields' => [
                    'fieldname' => 'pdf',
                    'tablenames' => 'tx_crtraegertreffen_domain_model_pdf',
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
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
                ],
                'maxitems' => 1,
                'minitems' => 0
            ],
        ],
        'youtube' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_pdf.youtube',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'webseite' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_pdf.webseite',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'facebook' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_pdf.facebook',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'instagram' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_pdf.instagram',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'kategorie' => [
            'exclude' => true,
            'label' => 'LLL:EXT:crtraegertreffen/Resources/Private/Language/locallang_db.xlf:tx_crtraegertreffen_domain_model_pdf.kategorie',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_crtraegertreffen_domain_model_kategorie',
                'default' => 0,
                'minitems' => 0,
                'maxitems' => 1,
            ],
            
        ],
    
    ],
];
