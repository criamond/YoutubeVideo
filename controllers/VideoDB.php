<?php

use Superproject\YouTubeVideo\YouTubeAPI;

require __DIR__ ."/../YoutubeAPI.php";


$videos=["recHRnwvAaY", "wC-4aR4SgLU", "Ckom3gf57Yw", "OorZcOzNcgE"];

$vid=new YouTubeAPI();

foreach ($videos as $video){
    $videoStat=$vid->getVideoStat($video);
    $channelStat=$vid->getChannelStat($videoStat->snippet->channelId);

}

$st=$vid->getVideoStat('recHRnwvAaY');

$ch=$vid->getChannelStat();

$channelTitle=$ch->snippet->title;
$channelcount=$ch->statistics->subscriberCount;


$r=0;