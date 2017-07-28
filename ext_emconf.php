<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "news".
 *
 * Auto generated 16-05-2014 11:31
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Simple gallery for EXT:news',
    'description' => 'Extend news with gallery options',
    'category' => 'fe',
    'author' => 'Georg Ringer',
    'author_email' => '',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'author_company' => '',
    'version' => '4.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.7.99',
            'news' => '6.0.0-6.9.9',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'suggests' => [],
];
