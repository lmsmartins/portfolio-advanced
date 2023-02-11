<?php
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd'
        ],
        'assetManager' => [
            'appendTimestamp' => true
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
];
