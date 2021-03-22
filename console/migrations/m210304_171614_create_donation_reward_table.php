<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%donation_reward}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%donor_profile}}`
 * - `{{%reward_level}}`
 */
class m210304_171614_create_donation_reward_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%donation_reward}}', [
            'reward_id' => $this->primaryKey(),
            'donor_profileId' => $this->integer()->notNull(),
            'reward_points' => $this->integer()->notNull(),
            'level_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `donor_profileId`
        $this->createIndex(
            '{{%idx-donation_reward-donor_profileId}}',
            '{{%donation_reward}}',
            'donor_profileId'
        );

        // add foreign key for table `{{%donor_profile}}`
        $this->addForeignKey(
            '{{%fk-donation_reward-donor_profileId}}',
            '{{%donation_reward}}',
            'donor_profileId',
            '{{%donor_profile}}',
            'donor_profileId',
            'CASCADE'
        );

        // creates index for column `level_id`
        $this->createIndex(
            '{{%idx-donation_reward-level_id}}',
            '{{%donation_reward}}',
            'level_id'
        );

        // add foreign key for table `{{%reward_level}}`
        $this->addForeignKey(
            '{{%fk-donation_reward-level_id}}',
            '{{%donation_reward}}',
            'level_id',
            '{{%reward_level}}',
            'level_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%donor_profile}}`
        $this->dropForeignKey(
            '{{%fk-donation_reward-donor_profileId}}',
            '{{%donation_reward}}'
        );

        // drops index for column `donor_profileId`
        $this->dropIndex(
            '{{%idx-donation_reward-donor_profileId}}',
            '{{%donation_reward}}'
        );

        // drops foreign key for table `{{%reward_level}}`
        $this->dropForeignKey(
            '{{%fk-donation_reward-level_id}}',
            '{{%donation_reward}}'
        );

        // drops index for column `level_id`
        $this->dropIndex(
            '{{%idx-donation_reward-level_id}}',
            '{{%donation_reward}}'
        );

        $this->dropTable('{{%donation_reward}}');
    }
}
