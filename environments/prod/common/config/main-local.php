<?php
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => $_ENV['MYSQL_DSN'],
            'username' => $_ENV['MYSQL_USERNAME'],
            'password' => $_ENV['MYSQL_PASSWORD'],
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
