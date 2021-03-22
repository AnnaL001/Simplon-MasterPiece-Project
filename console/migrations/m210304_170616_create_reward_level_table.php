<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reward_level}}`.
 */
class m210304_170616_create_reward_level_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reward_level}}', [
            'level_id' => $this->primaryKey(),
            'level_name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reward_level}}');
    }
}
