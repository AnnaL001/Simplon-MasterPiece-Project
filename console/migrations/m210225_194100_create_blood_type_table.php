<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blood_type}}`.
 */
class m210225_194100_create_blood_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blood_type}}', [
            'blood_typeId' => $this->primaryKey(),
            'blood_type' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%blood_type}}');
    }
}
