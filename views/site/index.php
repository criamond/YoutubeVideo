<h1>Video School</h1>


Welcome to the Video Paradise :)


<?php
use miloschuman\highcharts\Highcharts;

echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Fruit Consumption'],
        'xAxis' => [
            'categories' => ['Apples', 'Bananas', 'Oranges']
        ],
        'yAxis' => [
            'title' => ['text' => 'Fruit eaten']
        ],
        'series' => [
            ['name' => 'Jane', 'data' => [1, 0, 4]],
            ['name' => 'John', 'data' => [5, 7, 3]]
        ]
    ]
]);


echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Fruit Consumption'],
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
            ['name' => 'Jane', 'data' => [1, 0, 4],],
            ['name' => 'John', 'data' => [5, 7, 3]]

        ]
    ]
]);



?>
