<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%donor_response}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%blood_alert}}`
 */
class m210225_204600_create_donor_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%donor_response}}', [
            'response_id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'alert_id' => $this->integer()->notNull(),
            'response' => $this->string()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-donor_response-user_id}}',
            '{{%donor_response}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-donor_response-user_id}}',
            '{{%donor_response}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `alert_id`
        $this->createIndex(
            '{{%idx-donor_response-alert_id}}',
            '{{%donor_response}}',
            'alert_id'
        );

        // add foreign key for table `{{%blood_alert}}`
        $this->addForeignKey(
            '{{%fk-donor_response-alert_id}}',
            '{{%donor_response}}',
            'alert_id',
            '{{%blood_alert}}',
            'alert_id',
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
            '{{%fk-donor_response-user_id}}',
            '{{%donor_response}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-donor_response-user_id}}',
            '{{%donor_response}}'
        );

        // drops foreign key for table `{{%blood_alert}}`
        $this->dropForeignKey(
            '{{%fk-donor_response-alert_id}}',
            '{{%donor_response}}'
        );

        // drops index for column `alert_id`
        $this->dropIndex(
            '{{%idx-donor_response-alert_id}}',
            '{{%donor_response}}'
        );

        $this->dropTable('{{%donor_response}}');
    }
}
