<?php
namespace Superproject\YouTubeVideo;

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

class YouTubeAPI{
    private $Apikey;
    function __construct()
    {}


}


use yii\httpclient\Client;

$client = new Client();
$response = $client->createRequest()
    ->setMethod('POST')
    ->setUrl('http://example.com/api/1.0/users')
    ->setData(['name' => 'John Doe', 'email' => 'johndoe@example.com'])
    ->send();
if ($response->isOk) {
    $newUserId = $response->data['id'];
}