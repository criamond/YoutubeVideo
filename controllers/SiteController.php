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

        foreach ($videos_array as $key => $videos_array_item) {
            $currentVideoID = $videos_array_item['VideoID'];
            $VideoStat = $videoRec->find()->where(['VideoID' => $currentVideoID])->asarray()->all();
            foreach ($VideoStat as $vidData) {
                $ViewsCountArray[$key][] = (int)$vidData['ViewsCount'];
                $LikesArray[$key][] = (int)$vidData['Likes'];

                $DislikesArray[$key][] = (int)$vidData['Dislikes'];
                $CommentsCountArray[$key][] = (int)$vidData['CommentsCount'];
                $SubscribersCountArray[$key][] = (int)$vidData['SubscribersCount'];
                $DateTimeCategories[$key][] = $vidData['DateTime'];
            }
        }


        return $this->render(
            'index',
            compact(
                'videos_array',
                'ViewsCountArray',
                'LikesArray',
                'DislikesArray',
                'CommentsCountArray',
                'SubscribersCountArray',
                'DateTimeCategories'
            )
        );
    }

}

