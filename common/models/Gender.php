<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gender".
 *
 * @property int $gender_id
 * @property string $gender_name
 *
 * @property AdminProfile[] $adminProfiles
 * @property DonorProfile[] $donorProfiles
 */
class Gender extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gender';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender_name'], 'required'],
            [['gender_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gender_id' => 'Gender ID',
            'gender_name' => 'Gender Name',
        ];
    }

    /**
     * Gets query for [[AdminProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdminProfiles()
    {
        return $this->hasMany(AdminProfile::className(), ['gender_id' => 'gender_id']);
    }

    /**
     * Gets query for [[DonorProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonorProfiles()
    {
        return $this->hasMany(DonorProfile::className(), ['gender_id' => 'gender_id']);
    }
}
