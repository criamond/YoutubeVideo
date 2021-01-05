<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%videolist}}`.
 */
class m210105_223636_create_videolist_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%videolist}}', [
            'id' => $this->primaryKey(),
            'VideoID' => $this->STRING(),
            'VideoName' => $this->TEXT(),
            'VideoDescription' => $this->TEXT(),
            'ChannelName' => $this->TEXT(),
            'thumb' => $this->STRING(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%videolist}}');
    }
}
