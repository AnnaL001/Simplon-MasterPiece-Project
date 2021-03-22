<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "branch".
 *
 * @property int $branch_id
 * @property string $branch_name
 * @property string $branch_desc
 * @property int $location_id
 *
 * @property AdminProfile[] $adminProfiles
 * @property BloodAlert[] $bloodAlerts
 * @property Location $location
 * @property Donation[] $donations
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['branch_name', 'branch_desc', 'location_id'], 'required'],
            [['branch_desc'], 'string'],
            [['location_id'], 'integer'],
            [['branch_name'], 'string', 'max' => 255],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'location_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'branch_name' => 'Branch Name',
            'branch_desc' => 'Branch Desc',
            'location_id' => 'Location ID',
        ];
    }

    /**
     * Gets query for [[AdminProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdminProfiles()
    {
        return $this->hasMany(AdminProfile::className(), ['branch_id' => 'branch_id']);
    }

    /**
     * Gets query for [[BloodAlerts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBloodAlerts()
    {
        return $this->hasMany(BloodAlert::className(), ['branch_id' => 'branch_id']);
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
     * Gets query for [[Donations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonations()
    {
        return $this->hasMany(Donation::className(), ['branch_id' => 'branch_id']);
    }
}
