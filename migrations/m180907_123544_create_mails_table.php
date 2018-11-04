<?php

use yii\db\Migration;

/**
 * Handles the creation of table `mails`.
 */
class m180907_123544_create_mails_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('mails', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->notNull(),
            'addtime' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('mails');
    }
}
