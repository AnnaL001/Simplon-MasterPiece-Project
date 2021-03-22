<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%donation}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%branch}}`
 * - `{{%user}}`
 * - `{{%blood_quantity}}`
 */
class m210225_200233_create_donation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%donation}}', [
            'donation_id' => $this->primaryKey(),
            'branch_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'quantity_id' => $this->integer()->notNull(),
            'verification' => $this->string(),
            'verified_by' => $this->integer(),
        ]);

        // creates index for column `branch_id`
        $this->createIndex(
            '{{%idx-donation-branch_id}}',
            '{{%donation}}',
            'branch_id'
        );

        // add foreign key for table `{{%branch}}`
        $this->addForeignKey(
            '{{%fk-donation-branch_id}}',
            '{{%donation}}',
            'branch_id',
            '{{%branch}}',
            'branch_id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-donation-user_id}}',
            '{{%donation}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-donation-user_id}}',
            '{{%donation}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `quantity_id`
        $this->createIndex(
            '{{%idx-donation-quantity_id}}',
            '{{%donation}}',
            'quantity_id'
        );

        // add foreign key for table `{{%blood_quantity}}`
        $this->addForeignKey(
            '{{%fk-donation-quantity_id}}',
            '{{%donation}}',
            'quantity_id',
            '{{%blood_quantity}}',
            'quantity_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%branch}}`
        $this->dropForeignKey(
            '{{%fk-donation-branch_id}}',
            '{{%donation}}'
        );

        // drops index for column `branch_id`
        $this->dropIndex(
            '{{%idx-donation-branch_id}}',
            '{{%donation}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-donation-user_id}}',
            '{{%donation}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-donation-user_id}}',
            '{{%donation}}'
        );

        // drops foreign key for table `{{%blood_quantity}}`
        $this->dropForeignKey(
            '{{%fk-donation-quantity_id}}',
            '{{%donation}}'
        );

        // drops index for column `quantity_id`
        $this->dropIndex(
            '{{%idx-donation-quantity_id}}',
            '{{%donation}}'
        );

        $this->dropTable('{{%donation}}');
    }
}
