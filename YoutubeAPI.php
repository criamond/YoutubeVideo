<?php
namespace Superproject\YouTubeVideo;

class YouTubeAPI{
    private $Apikey="AIzaSyDbn9T0KXiqXATEF9Nm5w9PL6WaNwymshM";
    function __construct()
    {}

    function getVideoStat($idVideo='eXQATmoBSI4')
    {
        $json_result = json_decode(file_get_contents ("https://www.googleapis.com/youtube/v3/videos?id=$idVideo&key=$this->Apikey&fields=items(id,snippet(channelId,title,categoryId,description,thumbnails),statistics)&part=snippet,statistics"));
        //var_dump($json_result);
        $res=$json_result->items[0];

        return $res;

    }

    function getChannelStat($idChannel='UCFPC7r3tWWXWzUIROLx46mg')
    {
        $json_result = json_decode(file_get_contents ("https://youtube.googleapis.com/youtube/v3/channels?part=statistics&part=snippet&id=$idChannel&key=$this->Apikey"));
        //var_dump($json_result);
        return $json_result->items[0];
    }
}
?>


