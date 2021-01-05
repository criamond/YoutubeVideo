<?php
namespace app\models;

use yii\db\ActiveRecord;


class Video extends ActiveRecord
{

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





