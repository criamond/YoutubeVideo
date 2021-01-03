<?php

namespace app\controllers;

require __DIR__ . "/../YoutubeAPI.php";

use yii\web\Controller;
use Superproject\YouTubeVideo\YouTubeAPI;
use app\models\Video;
use app\models\Videolist;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $videoRec = new Video;
        $videoList = new Videolist;

        $videos_array = $videoList->find()->asarray()->all();

        $vidos=$videoRec->find()->groupby("VideoID")->asarray()->all();

        return $this->render('index');
    }


    public function actionKiss()
    {
        return $this->render('index');
    }

    public function actionFuck()
    {
        return $this->render('index');
    }

}

