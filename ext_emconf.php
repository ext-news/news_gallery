<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Simple gallery for EXT:news',
    'description' => 'Extend news with gallery options',
    'category' => 'fe',
    'author' => 'Georg Ringer',
    'author_email' => '',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'author_company' => '',
    'version' => '5.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.99-9.5.99',
            'news' => '6.0.0-7.9.9',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'suggests' => [],
];
