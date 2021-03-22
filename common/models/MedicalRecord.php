<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "medical_record".
 *
 * @property int $record_id
 * @property int $blood_typeId
 * @property string $date_of_birth
 * @property int $user_id
 * @property int $weight
 * @property float $haemoglobin_level
 * @property string $presence_of_conditions
 * @property int $blood_compatibility
 * @property string $comments
 * @property int $updated_by
 *
 * @property BloodType $bloodType
 * @property User $user
 */
class MedicalRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medical_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blood_typeId', 'date_of_birth', 'user_id', 'weight', 'haemoglobin_level', 'presence_of_conditions', 'comments', 'updated_by'], 'required'],
            [['blood_typeId', 'user_id', 'weight', 'blood_compatibility', 'updated_by'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['haemoglobin_level'], 'number'],
            [['comments'], 'string'],
            [['presence_of_conditions'], 'string', 'max' => 255],
            [['blood_typeId'], 'exist', 'skipOnError' => true, 'targetClass' => BloodType::className(), 'targetAttribute' => ['blood_typeId' => 'blood_typeId']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'record_id' => 'Record ID',
            'blood_typeId' => 'Blood Type ID',
            'date_of_birth' => 'Date Of Birth',
            'user_id' => 'User ID',
            'weight' => 'Weight',
            'haemoglobin_level' => 'Haemoglobin Level',
            'presence_of_conditions' => 'Presence Of Conditions',
            'blood_compatibility' => 'Blood Compatibility',
            'comments' => 'Comments',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[BloodType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBloodType()
    {
        return $this->hasOne(BloodType::className(), ['blood_typeId' => 'blood_typeId']);
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
