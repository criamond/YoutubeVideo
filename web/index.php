<?php
    define ('YII_DEBUG', true);
    require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

    require __DIR__ . '/../vendor/autoload.php';
    $config = require __DIR__ . '/../config/web.php';
    $yii = new yii\web\Application($config);

    use yii\httpclient\Client;

    $client = new Client();
    $response = $client->createRequest()
        ->setMethod('POST')
        ->setUrl('http://youtube.com/')
        ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
        ->send();
    if ($response->isOk) {
        $newUserId = $response->data['id'];
    }


    $yii->run ();

