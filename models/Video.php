<?php
namespace app\models;

use yii\db\ActiveRecord;


class Video extends ActiveRecord
{
    public static function UpdateVideo()
    {
          //      \Yii::$app->db->createCommand('CREATE DATABASE YOUTUBESTATS777');

        //

        $posts = \Yii::$app->db->createCommand('SELECT * FROM videos')->execute();
        $t=0;
    }
    

    public function getData(){
        return Video::find()->asArray()->all();
    }


    public static function tableName()
    {
        return 'videos';
    }


  /*  public function attributeLabels()
    {
        return [
            'VideoID' => 'VideoID',
            'Likes' => 'Likes',

            'DateTime' => 'DateTime',
            'ViewsCount' => 'ViewsCount',
            'Dislikes' => 'Dislikes',
            'CommentsCount' => 'CommentsCount',
            'SubscribersCount' => 'SubscribersCount',
        ];
    }*/

}





