<?php

return [
    'id' => 'video',
    'basePath' => realpath(__DIR__ . '/../'),

    'components' => [
    // ...
    'db' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=youtubestats',
        'username' => 'test',
        'password' => '',
        'charset' => 'utf8',
    ]
]
];
