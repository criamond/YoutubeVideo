<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar as NavBarAlias;

$this->beginPage(); ?>
    <html>

    <head>
        <title>Youtube analysis</title>
        <?php
        $this->head(); ?>
    </head>

    <body>
    <?php
    $this->beginBody(); ?>
    <?php
    NavBarAlias::begin(
        [
            'brandLabel' => "Youtube analysis",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default navbar-fixed-top'
            ]
        ]
    );
    $items = [
        ['label' => 'Video1', 'url' => ['/#video1']],
        ['label' => 'Video2', 'url' => ['/#video2']],
        ['label' => 'Video3', 'url' => ['/#video3']],
        ['label' => 'Video4', 'url' => ['/#video4']],
        ['label' => 'Video5', 'url' => ['/#video5']]
    ];

    echo Nav::widget(
        [
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $items

        ]
    );
    NavBarAlias::end();
    ?>
    <div class="container" style="margin-top: 50px">
        <?= $content ?>
    </div>
    <?php
    $this->endBody(); ?>
    </body>

    </html>

<?php
$this->endPage(); ?>