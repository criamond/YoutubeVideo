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

        for($i=0;$i<count($videos_array);$i++){
            $currentVideoID=$videos_array[$i]['VideoID'];
            $VideoStat[$i]=$videoRec->find()->where(['VideoID' => $currentVideoID])->asarray()->all();
        }

        return $this->render('index', compact('videos_array','VideoStat'));
    }

}

