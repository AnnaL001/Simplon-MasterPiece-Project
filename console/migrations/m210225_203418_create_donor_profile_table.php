<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%donor_profile}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%medical_record}}`
 * - `{{%gender}}`
 */
class m210225_203418_create_donor_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%donor_profile}}', [
            'donor_profileId' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'firstname' => $this->string()->notNull(),
            'middlename' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'phoneNo' => $this->string()->notNull(),
            'record_id' => $this->integer()->notNull(),
            'gender_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-donor_profile-user_id}}',
            '{{%donor_profile}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-donor_profile-user_id}}',
            '{{%donor_profile}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `record_id`
        $this->createIndex(
            '{{%idx-donor_profile-record_id}}',
            '{{%donor_profile}}',
            'record_id'
        );

        // add foreign key for table `{{%medical_record}}`
        $this->addForeignKey(
            '{{%fk-donor_profile-record_id}}',
            '{{%donor_profile}}',
            'record_id',
            '{{%medical_record}}',
            'record_id',
            'CASCADE'
        );

        // creates index for column `gender_id`
        $this->createIndex(
            '{{%idx-donor_profile-gender_id}}',
            '{{%donor_profile}}',
            'gender_id'
        );

        // add foreign key for table `{{%gender}}`
        $this->addForeignKey(
            '{{%fk-donor_profile-gender_id}}',
            '{{%donor_profile}}',
            'gender_id',
            '{{%gender}}',
            'gender_id',
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
            '{{%fk-donor_profile-user_id}}',
            '{{%donor_profile}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-donor_profile-user_id}}',
            '{{%donor_profile}}'
        );

        // drops foreign key for table `{{%medical_record}}`
        $this->dropForeignKey(
            '{{%fk-donor_profile-record_id}}',
            '{{%donor_profile}}'
        );

        // drops index for column `record_id`
        $this->dropIndex(
            '{{%idx-donor_profile-record_id}}',
            '{{%donor_profile}}'
        );

        // drops foreign key for table `{{%gender}}`
        $this->dropForeignKey(
            '{{%fk-donor_profile-gender_id}}',
            '{{%donor_profile}}'
        );

        // drops index for column `gender_id`
        $this->dropIndex(
            '{{%idx-donor_profile-gender_id}}',
            '{{%donor_profile}}'
        );

        $this->dropTable('{{%donor_profile}}');
    }
}
