<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Video;
use app\models\Videolist;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $videoRec = new Video;
        $videoList = new Videolist;

        $videos_array = $videoList->find()->asarray()->all();

        foreach ($videos_array as $videos_array_item) {
            $currentVideoID = $videos_array_item['VideoID'];
            $VideoStat[] = $videoRec->find()->where(['VideoID' => $currentVideoID])->asarray()->all();
        }

        return $this->render('index', compact('videos_array', 'VideoStat'));
    }

}

