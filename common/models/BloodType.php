<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blood_type".
 *
 * @property int $blood_typeId
 * @property string $blood_typeName
 *
 * @property BloodAlert[] $bloodAlerts
 * @property MedicalRecord[] $medicalRecords
 */
class BloodType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blood_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blood_typeName'], 'required'],
            [['blood_typeName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'blood_typeId' => 'Blood Type ID',
            'blood_typeName' => 'Blood Type Name',
        ];
    }

    /**
     * Gets query for [[BloodAlerts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBloodAlerts()
    {
        return $this->hasMany(BloodAlert::className(), ['blood_typeId' => 'blood_typeId']);
    }

    /**
     * Gets query for [[MedicalRecords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalRecords()
    {
        return $this->hasMany(MedicalRecord::className(), ['blood_typeId' => 'blood_typeId']);
    }
}
