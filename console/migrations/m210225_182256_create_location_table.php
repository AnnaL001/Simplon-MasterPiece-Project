<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%location}}`.
 */
class m210225_182256_create_location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%location}}', [
            'location_id' => $this->primaryKey(),
            'location_name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%location}}');
    }
}
