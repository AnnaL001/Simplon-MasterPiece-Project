<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donor_profile".
 *
 * @property int $donor_profileId
 * @property int $user_id
 * @property string $firstname
 * @property string $middlename
 * @property string $surname
 * @property resource|null $image
 * @property string $phoneNo
 * @property int $gender_id
 * @property int $reward_points
 * @property int $level_id
 * @property int $donor_eligibility
 * @property int $location_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Gender $gender
 * @property RewardLevel $level
 * @property Location $location
 * @property User $user
 */
class DonorProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donor_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'firstname', 'middlename', 'surname', 'phoneNo', 'gender_id', 'location_id'], 'required'],
            [['user_id', 'gender_id', 'reward_points', 'level_id', 'donor_eligibility', 'location_id'], 'integer'],
            [['image'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['firstname', 'middlename', 'surname', 'phoneNo'], 'string', 'max' => 255],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'gender_id']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => RewardLevel::className(), 'targetAttribute' => ['level_id' => 'level_id']],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'location_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'donor_profileId' => 'Donor Profile ID',
            'user_id' => 'User ID',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'surname' => 'Surname',
            'image' => 'Image',
            'phoneNo' => 'Phone No',
            'gender_id' => 'Gender ID',
            'reward_points' => 'Reward Points',
            'level_id' => 'Level ID',
            'donor_eligibility' => 'Donor Eligibility',
            'location_id' => 'Location ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['gender_id' => 'gender_id']);
    }

    /**
     * Gets query for [[Level]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(RewardLevel::className(), ['level_id' => 'level_id']);
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['location_id' => 'location_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
