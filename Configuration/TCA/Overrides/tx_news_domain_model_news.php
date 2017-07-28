<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$columns = [
    'tx_gallery_collections' => [
        'exclude' => true,
        'l10n_mode' => 'mergeIfNotBlank',
        'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_collection',
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'localizeReferencesAtParentLocalization' => true,
            'allowed' => 'sys_file_collection',
            'foreign_table' => 'sys_file_collection',
            'maxitems' => 10,
            'minitems' => 0,
            'size' => 2,
            'wizards' => [
                'suggest' => [
                    'type' => 'suggest',
                    'default' => [
                        'searchWholePhrase' => true,
                        'addWhere' => ' AND tx_news_domain_model_news.uid != ###THIS_UID###'
                    ]
                ],
            ],
        ]
    ],
    'tx_gallery_storage' => [
        'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_collection.storage',
        'onChange' => 'reload',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['', 0]
            ],
            'foreign_table' => 'sys_file_storage',
            'foreign_table_where' => 'ORDER BY sys_file_storage.name',
            'size' => 1,
            'minitems' => 0,
            'maxitems' => 1
        ]
    ],
    'tx_gallery_folder' => [
        'exclude' => true,
        'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_collection.folder',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [],
            'itemsProcFunc' => \GeorgRinger\NewsGallery\Resource\Service\UserFileMountService::class . '->renderTceformsSelectDropdown',
            'default' => '',
        ]
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $columns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'tx_gallery_collections,tx_gallery_storage,tx_gallery_folder', '', 'after:fal_media');
