<?php

namespace Superproject\YouTubeVideo;

class YouTubeAPI
{
    private $Apikey = "AIzaSyDbn9T0KXiqXATEF9Nm5w9PL6WaNwymshM";


    public function getVideoStat($idVideo = 'eXQATmoBSI4')///: array
    {
        //$json_result = json_decode(file_get_contents ("https://www.googleapis.com/youtube/v3/videos?id=$idVideo&key=$this->Apikey&fields=items(id,snippet(channelId,title,categoryId,description,thumbnails),statistics)&part=snippet,statistics"));
        $json_result = json_decode(
            $this->Request(
                "https://www.googleapis.com/youtube/v3/videos?id=$idVideo&key=$this->Apikey&fields=items(id,snippet(channelId,title,categoryId,description,thumbnails),statistics)&part=snippet,statistics"
            )
        );
        return $json_result->items[0];
    }

    function getChannelStat($idChannel = 'UCFPC7r3tWWXWzUIROLx46mg')
    {
        $json_result = json_decode(
            $this->Request(
                "https://youtube.googleapis.com/youtube/v3/channels?part=statistics&part=snippet&id=$idChannel&key=$this->Apikey"
            )
        );
        return $json_result->items[0];
    }


    function Request($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        return $result;
    }
}

?>


