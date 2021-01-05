<?php use yii\bootstrap\Nav;
use yii\bootstrap\NavBar as NavBarAlias;

$this->beginPage(); ?>
<html>

    <head>
        <title>Youtube analysis</title>
        <?php $this->head(); ?>
    </head>

    <body>
    <?php $this->beginBody(); ?>
    <?php
        NavBarAlias::begin([
            'brandLabel' => "Youtube analysis",
            'brandUrl' => Yii::$app->homeUrl,
            'options' =>[
                    'class' => 'navbar-default navbar-fixed-top'
            ]
        ]);

        echo Nav::widget([
                'options'=>['class'=>'navbar-nav navbar-right']

        ]);
        NavBarAlias::end();
    ?>
    <div class="container" style="margin-top: 50px">
        <?= $content ?>
    </div>
    <?php $this->endBody(); ?>
    </body>

</html>

<?php $this->endPage(); ?>