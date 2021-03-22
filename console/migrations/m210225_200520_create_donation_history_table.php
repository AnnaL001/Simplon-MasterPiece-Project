<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%donation_history}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%donation}}`
 */
class m210225_200520_create_donation_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%donation_history}}', [
            'history_id' => $this->primaryKey(),
            'donation_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `donation_id`
        $this->createIndex(
            '{{%idx-donation_history-donation_id}}',
            '{{%donation_history}}',
            'donation_id'
        );

        // add foreign key for table `{{%donation}}`
        $this->addForeignKey(
            '{{%fk-donation_history-donation_id}}',
            '{{%donation_history}}',
            'donation_id',
            '{{%donation}}',
            'donation_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%donation}}`
        $this->dropForeignKey(
            '{{%fk-donation_history-donation_id}}',
            '{{%donation_history}}'
        );

        // drops index for column `donation_id`
        $this->dropIndex(
            '{{%idx-donation_history-donation_id}}',
            '{{%donation_history}}'
        );

        $this->dropTable('{{%donation_history}}');
    }
}
