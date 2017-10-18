<?php

$MYSQL_DATABASE = 'mandrews_domoticz';
$MYSQL_USER = 'mandrews_domoticz';
$MYSQL_PASSWORD = 'Neu1ones1602';

return [
    'components' => [
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=' . $MYSQL_DATABASE,
            'username' => $MYSQL_USER,
            'password' => $MYSQL_PASSWORD,
            'charset' => 'utf8',
        ],
    ],
];
