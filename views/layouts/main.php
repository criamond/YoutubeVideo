<?php use yii\bootstrap\Nav;
use yii\bootstrap\NavBar as NavBarAlias;

$this->beginPage(); ?>
<html>

    <head>
        <title>Video fuckin School</title>
        <?php $this->head(); ?>
    </head>

    <body>
    <?php $this->beginBody(); ?>
    <?php
        NavBarAlias::begin([
            'brandLabel' => "Fucking web",
            'brandUrl' => Yii::$app->homeUrl,
            'options' =>[
                    'class' => 'navbar-default navbar-fixed-top'
            ]
        ]);
        $items= [
                ['label' => 'Kiss', 'url'=> ['/site/kiss']],
                ['label' => 'Fuck', 'url'=> ['/site/fuck']]
        ];
        echo Nav::widget([
                'options'=>['class'=>'navbar-nav navbar-right'],
                'items'=> $items
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