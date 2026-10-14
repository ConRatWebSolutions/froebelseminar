<?php

declare(strict_types=1);

return [
    \C4\C4theme\Domain\Model\Contact::class => [
        'tableName' => 'tx_c4theme_contact',
        'properties' => [
            'feGroup' => [
                'fieldName' => 'fe_group',
            ],
        ],
    ],
]; 