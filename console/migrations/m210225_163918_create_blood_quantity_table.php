<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blood_quantity}}`.
 */
class m210225_163918_create_blood_quantity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blood_quantity}}', [
            'quantity_id' => $this->primaryKey(),
            'quantityInPints' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%blood_quantity}}');
    }
}
