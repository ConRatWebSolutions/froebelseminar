<?php
declare(strict_types=1);

$EM_CONF[$_EXTKEY] = [
    'title' => 'ConRat Kalender',
    'description' => 'ConRat Kalender Extension für TYPO3 CMS',
    'category' => 'plugin',
    'author' => 'ConRat',
    'author_email' => 'info@conrat.de',
    'author_company' => 'ConRat',
    'state' => 'stable',
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '13.0.0-13.99.99',
            'extbase' => '13.0.0-13.99.99',
            'fluid' => '13.0.0-13.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'Conrat\\Crkalender\\' => 'Classes',
        ],
    ],
];