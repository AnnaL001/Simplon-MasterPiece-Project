<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blood_alert".
 *
 * @property int $alert_id
 * @property string $alert_text
 * @property int $blood_typeId
 * @property int $branch_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BloodType $bloodType
 * @property Branch $branch
 * @property DonorResponse[] $donorResponses
 */
class BloodAlert extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blood_alert';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alert_text', 'blood_typeId', 'branch_id', 'created_by', 'updated_by'], 'required'],
            [['alert_text'], 'string'],
            [['blood_typeId', 'branch_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['blood_typeId'], 'exist', 'skipOnError' => true, 'targetClass' => BloodType::className(), 'targetAttribute' => ['blood_typeId' => 'blood_typeId']],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::className(), 'targetAttribute' => ['branch_id' => 'branch_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'alert_id' => 'Alert ID',
            'alert_text' => 'Alert Text',
            'blood_typeId' => 'Blood Type ID',
            'branch_id' => 'Branch ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
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
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branch::className(), ['branch_id' => 'branch_id']);
    }

    /**
     * Gets query for [[DonorResponses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonorResponses()
    {
        return $this->hasMany(DonorResponse::className(), ['alert_id' => 'alert_id']);
    }
}
