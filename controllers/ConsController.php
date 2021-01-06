<?php

namespace app\controllers;


use app\controllers\YoutubeAPI;
use yii\console\Controller;
use app\models\Video;
use app\models\Videolist;
use yii\console\Request;


class ConsController extends Controller
{

    public function actionInit()
    {
        $videos = (new Request)->getParams(); // $GLOBALS["argv"];
        $videos = array_slice($videos, 1);

        $vid = new YouTubeAPI();
        $videoRec = new Videolist;
        //очистка таблиц, новые видео все таки
        Videolist::deleteAll();
        Video::deleteAll();

        foreach ($videos as $video) {
            $videoStat = $vid->getVideoStat($video);
            $channelStat = $vid->getChannelStat($videoStat->snippet->channelId);

            $videoRec->VideoName = $videoStat->snippet->title;
            $videoRec->VideoDescription = $videoStat->snippet->description;
            $videoRec->ChannelName = $channelStat->snippet->title;
            $videoRec->VideoID = $video;
            $videoRec->thumb = $videoStat->snippet->thumbnails->default->url;
            $videoRec->insert();
        }
        die("Init is OK");
    }

    public function actionUpdatedb()
    {
        $videoRec = new Video;
        $videoList = new Videolist;
        $videos_array = $videoList->find()->all();


        $vid = new YouTubeAPI();
        for ($i = 0; $i < count($videos_array); $i++) {
            $videoID = $videos_array[$i]->VideoID;

            $videoStat = $vid->getVideoStat($videoID);
            $channelStat = $vid->getChannelStat($videoStat->snippet->channelId);
            $channelTitle = $channelStat->snippet->title;
            $channelcount = $channelStat->statistics->subscriberCount;
            echo "$channelTitle $channelcount\r\n ";

            $videoRec->SubscribersCount = $channelStat->statistics->subscriberCount;
            $videoRec->VideoID = $videoID;
            $videoRec->ViewsCount = $videoStat->statistics->viewCount;
            $videoRec->Likes = $videoStat->statistics->likeCount;
            $videoRec->Dislikes = $videoStat->statistics->dislikeCount;
            $videoRec->CommentsCount = $videoStat->statistics->commentCount;
            $videoRec->insert();
        }

        die("Update is OK");
    }

}

?>