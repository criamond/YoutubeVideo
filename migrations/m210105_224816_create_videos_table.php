<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%videos}}`.
 */
class m210105_224816_create_videos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%videos}}', [
            'id' => $this->primaryKey(),
            'DateTime' => $this->DATETIME()->null()->defaultExpression('CURRENT_TIMESTAMP'),
            'VideoID' => $this->STRING(50),
            'ViewsCount' => $this->INTEGER(),
            'Likes' => $this->INTEGER(),
            'Dislikes' => $this->INTEGER(),
            'CommentsCount' => $this->INTEGER(),
            'SubscribersCount' => $this->INTEGER(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%videos}}');
    }
}
