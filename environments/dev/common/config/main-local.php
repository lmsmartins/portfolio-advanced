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
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
