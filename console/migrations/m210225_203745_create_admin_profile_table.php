<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%admin_profile}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%branch}}`
 * - `{{%gender}}`
 */
class m210225_203745_create_admin_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%admin_profile}}', [
            'admin_profileId' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'firstname' => $this->string()->notNull(),
            'middlename' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'phoneNo' => $this->string()->notNull(),
            'branch_id' => $this->integer()->notNull(),
            'gender_id' => $this->integer()->notNull(),
            'hospital_role_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-admin_profile-user_id}}',
            '{{%admin_profile}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-admin_profile-user_id}}',
            '{{%admin_profile}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `branch_id`
        $this->createIndex(
            '{{%idx-admin_profile-branch_id}}',
            '{{%admin_profile}}',
            'branch_id'
        );

        // add foreign key for table `{{%branch}}`
        $this->addForeignKey(
            '{{%fk-admin_profile-branch_id}}',
            '{{%admin_profile}}',
            'branch_id',
            '{{%branch}}',
            'branch_id',
            'CASCADE'
        );

        // creates index for column `gender_id`
        $this->createIndex(
            '{{%idx-admin_profile-gender_id}}',
            '{{%admin_profile}}',
            'gender_id'
        );

        // add foreign key for table `{{%gender}}`
        $this->addForeignKey(
            '{{%fk-admin_profile-gender_id}}',
            '{{%admin_profile}}',
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
            '{{%fk-admin_profile-user_id}}',
            '{{%admin_profile}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-admin_profile-user_id}}',
            '{{%admin_profile}}'
        );

        // drops foreign key for table `{{%branch}}`
        $this->dropForeignKey(
            '{{%fk-admin_profile-branch_id}}',
            '{{%admin_profile}}'
        );

        // drops index for column `branch_id`
        $this->dropIndex(
            '{{%idx-admin_profile-branch_id}}',
            '{{%admin_profile}}'
        );

        // drops foreign key for table `{{%gender}}`
        $this->dropForeignKey(
            '{{%fk-admin_profile-gender_id}}',
            '{{%admin_profile}}'
        );

        // drops index for column `gender_id`
        $this->dropIndex(
            '{{%idx-admin_profile-gender_id}}',
            '{{%admin_profile}}'
        );

        $this->dropTable('{{%admin_profile}}');
    }
}
