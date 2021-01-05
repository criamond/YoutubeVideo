

<?php
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

for($i=0;$i<count($videos_array);$i++){
    echo $videos_array[$i]["VideoName"];
    for($j=0;$j<count($VideoStat[$i]);$j++){
        $ViewsCountArray[$j]=(int) $VideoStat[$i][$j]['ViewsCount'];
        $LikesArray[$j]=(int) $VideoStat[$i][$j]['Likes'];
        $DislikesArray[$j]=(int) $VideoStat[$i][$j]['Dislikes'];
        $CommentsCountArray[$j]=(int) $VideoStat[$i][$j]['CommentsCount'];
        $SubscribersCountArray[$j]=(int) $VideoStat[$i][$j]['SubscribersCount'];
        $DateTimeCategories[$j]=$VideoStat[$i][$j]['DateTime'];
    }
    echo Highcharts::widget([
                                'options' => [
                                    'title' => ['text' => 'Video Statistics '],
                                    'xAxis' => array(
                                        'type' => 'datetime',
                                        //'dateTimeLabelFormats' => array('day' => '%e of %b'),
                                        'categories' => $DateTimeCategories
                                    ),
                                    'yAxis' => [

                                        'title' => ['text' => '']
                                    ],
                                   // 'plotOptions' => ['series' => ['pointInterval'=> 3600 * 1000],'pointStart'=> 'Date.UTC(2010, 10, 11)'],
                                    'series' => [
                                        ['name' => 'Views', 'data' => $ViewsCountArray] ,
                                        ['name' => 'Likes', 'data' => $LikesArray],
                                        ['name' => 'Dislikes', 'data' => $DislikesArray],
                                        ['name' => 'CommentsCount', 'data' => $CommentsCountArray],
                                        ['name' => 'SubscribersCount', 'data' => $SubscribersCountArray]

                                    ]
                                ]
                            ]);

}





?>
