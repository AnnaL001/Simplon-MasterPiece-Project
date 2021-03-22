<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%medical_record}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%blood_type}}`
 */
class m210225_202552_create_medical_record_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%medical_record}}', [
            'record_id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'blood_typeId' => $this->integer()->notNull(),
            'date_of_birth' => $this->date()->notNull(),
            'weight' => $this->integer()->notNull(),
            'haemoglobin_level' => $this->float()->notNull(),
            'no_conditions' => $this->string()->notNull(),
            'comments' => $this->text()->notNull(),
            'can_donate' => $this->string(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-medical_record-user_id}}',
            '{{%medical_record}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-medical_record-user_id}}',
            '{{%medical_record}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `blood_typeId`
        $this->createIndex(
            '{{%idx-medical_record-blood_typeId}}',
            '{{%medical_record}}',
            'blood_typeId'
        );

        // add foreign key for table `{{%blood_type}}`
        $this->addForeignKey(
            '{{%fk-medical_record-blood_typeId}}',
            '{{%medical_record}}',
            'blood_typeId',
            '{{%blood_type}}',
            'blood_typeId',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-medical_record-user_id}}',
            '{{%medical_record}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-medical_record-user_id}}',
            '{{%medical_record}}'
        );

        // drops foreign key for table `{{%blood_type}}`
        $this->dropForeignKey(
            '{{%fk-medical_record-blood_typeId}}',
            '{{%medical_record}}'
        );

        // drops index for column `blood_typeId`
        $this->dropIndex(
            '{{%idx-medical_record-blood_typeId}}',
            '{{%medical_record}}'
        );

        $this->dropTable('{{%medical_record}}');
    }
}
