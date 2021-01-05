<?php

namespace app\models;

use yii\db\ActiveRecord;

class Videolist extends ActiveRecord
{

    public static function tableName()
    {
        return 'videolist';
    }

}