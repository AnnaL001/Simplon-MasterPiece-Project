<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hospital_role".
 *
 * @property int $hospital_roleId
 * @property string $hospital_role
 *
 * @property AdminProfile[] $adminProfiles
 */
class HospitalRole extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hospital_role';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hospital_role'], 'required'],
            [['hospital_role'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hospital_roleId' => 'Hospital Role ID',
            'hospital_role' => 'Hospital Role',
        ];
    }

    /**
     * Gets query for [[AdminProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdminProfiles()
    {
        return $this->hasMany(AdminProfile::className(), ['hospital_roleId' => 'hospital_roleId']);
    }
}
