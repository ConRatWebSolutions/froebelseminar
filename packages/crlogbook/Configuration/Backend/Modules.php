<?php
declare(strict_types=1);

use Conrat\Crlogbook\Controller\Backend\LogbookBackendController;

/**
 * Definitions for modules provided by EXT:crlogbook
 */
return [
    'web_Crlogbook' => [
        'parent' => 'web',
        'position' => ['after' => 'web_info'],
        'access' => 'user,group',
        'workspaces' => 'live',
        'path' => '/module/web/web_Crlogbook',
        'labels' => 'LLL:EXT:crlogbook/Resources/Private/Language/locallang_mod.xlf',
        'extensionName' => 'Crlogbook',
        'controllerActions' => [
            LogbookBackendController::class => [
                'belistd',
                'beedit',
            ],
        ],
    ],
];