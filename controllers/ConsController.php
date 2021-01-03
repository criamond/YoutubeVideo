<?php


namespace app\controllers;

require __DIR__ . "/../YoutubeAPI.php";

use yii\console\Controller;
use Superproject\YouTubeVideo\YouTubeAPI;
use app\models\Video;
use app\models\Videolist;


class ConsController extends Controller
{

    public function actionInit()
    {
        $videos = $GLOBALS["argv"];
        $videos = array_slice($videos, 2);

        $vid = new YouTubeAPI();
        $videoRec = new Videolist;

        //проверить есть ли и создать БД

        if (\Yii::$app->db->getTableSchema('{{%videolist}}', true) == null) {
            // работа с таблицей
            \Yii::$app->db->createCommand(
                "CREATE TABLE `videolist` (
	`VideoID` CHAR(50) NULL,
	`VideoName` TEXT,
	`VideoDescription` TEXT,
	`ChannelName` TEXT,
	`thumb` varchar(50) NULL
)
COLLATE='utf8mb4_0900_ai_ci'
;"
            )->execute();
        }

        if (\Yii::$app->db->getTableSchema('{{%videos}}', true) == null) {
            // работа с таблицей
            \Yii::$app->db->createCommand(
                "CREATE TABLE `Videos` (
	`DateTime` DATETIME,
	`VideoID` CHAR(50) NULL,
	`ViewsCount` INT NULL,
	`Likes` INT NULL,
	`Dislikes` INT NULL,
	`CommentsCount` INT NULL,
	`SubscribersCount` INT NULL
)
COLLATE='utf8mb4_0900_ai_ci'
;"
            )->execute();
        }


        //тут хорошо бы создать если нет, создать статсу табл
        $videoRec->deleteAll();
        $result=Video::deleteAll();

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
        die;
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

        die;
    }

}

?>