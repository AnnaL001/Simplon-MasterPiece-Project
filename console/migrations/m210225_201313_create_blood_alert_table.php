<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blood_alert}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%blood_type}}`
 * - `{{%branch}}`
 */
class m210225_201313_create_blood_alert_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blood_alert}}', [
            'alert_id' => $this->primaryKey(),
            'alert_text' => $this->text()->notNull(),
            'blood_typeId' => $this->integer()->notNull(),
            'branch_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // creates index for column `blood_typeId`
        $this->createIndex(
            '{{%idx-blood_alert-blood_typeId}}',
            '{{%blood_alert}}',
            'blood_typeId'
        );

        // add foreign key for table `{{%blood_type}}`
        $this->addForeignKey(
            '{{%fk-blood_alert-blood_typeId}}',
            '{{%blood_alert}}',
            'blood_typeId',
            '{{%blood_type}}',
            'blood_typeId',
            'CASCADE'
        );

        // creates index for column `branch_id`
        $this->createIndex(
            '{{%idx-blood_alert-branch_id}}',
            '{{%blood_alert}}',
            'branch_id'
        );

        // add foreign key for table `{{%branch}}`
        $this->addForeignKey(
            '{{%fk-blood_alert-branch_id}}',
            '{{%blood_alert}}',
            'branch_id',
            '{{%branch}}',
            'branch_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%blood_type}}`
        $this->dropForeignKey(
            '{{%fk-blood_alert-blood_typeId}}',
            '{{%blood_alert}}'
        );

        // drops index for column `blood_typeId`
        $this->dropIndex(
            '{{%idx-blood_alert-blood_typeId}}',
            '{{%blood_alert}}'
        );

        // drops foreign key for table `{{%branch}}`
        $this->dropForeignKey(
            '{{%fk-blood_alert-branch_id}}',
            '{{%blood_alert}}'
        );

        // drops index for column `branch_id`
        $this->dropIndex(
            '{{%idx-blood_alert-branch_id}}',
            '{{%blood_alert}}'
        );

        $this->dropTable('{{%blood_alert}}');
    }
}
