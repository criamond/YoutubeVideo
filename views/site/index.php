<h1>Video School</h1>


Welcome to the Video Paradise :)


<?php
use miloschuman\highcharts\Highcharts;


for($i=0;$i<count($videos_array);$i++){
    echo $videos_array[$i]["VideoName"];
    for($j=0;$j<count($VideoStat[$i]);$j++){
        $ViewsCountArray[$j]=$VideoStat[$i][$j]['ViewsCount'];
        $LikesArray[$j]=$VideoStat[$i][$j]['Likes'];
        $DislikesArray[$j]=$VideoStat[$i][$j]['Dislikes'];
        $CommentsCountArray[$j]=$VideoStat[$i][$j]['CommentsCount'];
        $SubscribersCountArray[$j]=$VideoStat[$i][$j]['SubscribersCount'];
    }
    echo Highcharts::widget([
                                'options' => [
                                    'title' => ['text' => 'Video Statistics '],
                                    'xAxis' => [
                                        'type' => 'datetime',
                                        'dateTimeLabelFormats' => ['day' => '%e of %b']
                                    ],
                                    'yAxis' => [
                                        'title' => ['text' => 'Fruit eaten']
                                    ],
                                    'plotOptions' => ['series' => ['pointInterval'=> 3600 * 1000]],
//'pointStart'=> 'Date.UTC(2010, 0, 1)',
                                    'series' => [
                                        ['name' => 'Views', 'data' => $ViewsCountArray] ////,
                                        ['name' => 'Likes', 'data' => $LikesArray]

                                    ]
                                ]
                            ]);

}



/*
 * echo Highcharts::widget([
    'options' => '{
      "title": { "text": "Fruit Consumption" },
      "xAxis": {
         "type": "datetime",
         "dateTimeLabelFormats": {"day": "%e of %b"}
      },
      "yAxis": {
         "title": { "text": "Fruit eaten" }
      },
      "plotOptions": { 
          "series": {
                "pointInterval": 3600000, 
                "pointStart": "Date.UTC(2020, 0, 1)"
          }
      },
      "series": [
         { "name": "Jane", "data": [1, 0, 4] },
         { "name": "John", "data": [5, 7,3] }
      ]
   }'
]);

*/

$dat=[1,5,8,8,8,9];

echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Video Statistics '],
        'xAxis' => [
            'type' => 'datetime',
            'dateTimeLabelFormats' => ['day' => '%e of %b']
        ],
        'yAxis' => [
            'title' => ['text' => 'Fruit eaten']
        ],
        'plotOptions' => ['series' => ['pointInterval'=> 3600 * 1000]],
//, , 'pointStart'=> 'Date.UTC(2020, 0, 1)'
        'series' => [
            ['name' => 'Views', 'data' => $dat],

        ]
    ]
]);



echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Video Statistics '],
        'xAxis' => [
            'type' => 'datetime',
            'dateTimeLabelFormats' => ['day' => '%e of %b']
        ],
        'yAxis' => [
            'title' => ['text' => 'Fruit eaten']
        ],
        'plotOptions' => ['series' => ['pointInterval'=> 3600 * 1000]],
//'pointStart'=> 'Date.UTC(2010, 0, 1)',
        'series' => [
            ['name' => 'Views', 'data' => [1, 0, 4]],
            ['name' => 'Likes', 'data' => [5, 7, 3]]

        ]
    ]
]);


?>
