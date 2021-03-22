<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hospital_role}}`.
 */
class m210225_204809_create_hospital_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hospital_role}}', [
            'hospital_roleId' => $this->primaryKey(),
            'hospital_role' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hospital_role}}');
    }
}
