<?php

use miloschuman\highcharts\Highcharts;

for ($i = 0; $i < count($videos_array); $i++) {
    ?>
    <a name="video<?= $i + 1 ?>">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12">
                <img align="center" src="<?= $videos_array[$i]["thumb"] ?>" class="img-fluid">
            </div>

            <div class="col-lg-10 col-md-10 col-sm-12 desc">
                <?php
                echo "<h3> {$videos_array[$i]["VideoName"]} </h3>";
                echo "<h3>ChannelName: {$videos_array[$i]["ChannelName"]} </h3>";
                echo " {$videos_array[$i]["VideoDescription"]} ";
                ?>
            </div>
        </div>

        <?php
        echo Highcharts::widget(
            [
                'options' => [
                    'title' => ['text' => 'Video Statistics '],
                    'xAxis' => array(
                        'type' => 'datetime',
                        //'dateTimeLabelFormats' => array('day' => '%e of %b'),
                        'categories' => $DateTimeCategories[$i]
                    ),
                    'yAxis' => [

                        'title' => ['text' => '']
                    ],
                    // 'plotOptions' => ['series' => ['pointInterval'=> 3600 * 1000],'pointStart'=> 'Date.UTC(2010, 10, 11)'],
                    'series' => [
                        ['name' => 'Views', 'data' => $ViewsCountArray[$i]],
                        ['name' => 'Likes', 'data' => $LikesArray[$i]],
                        ['name' => 'Dislikes', 'data' => $DislikesArray[$i]],
                        ['name' => 'CommentsCount', 'data' => $CommentsCountArray[$i]],
                        ['name' => 'SubscribersCount', 'data' => $SubscribersCountArray[$i]]

                    ]
                ]
            ]
        );

        ?>
        <br><br><br>
    </a>
    <?php
}


?>
