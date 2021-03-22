<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donor_response".
 *
 * @property int $response_id
 * @property int $user_id
 * @property int $alert_id
 * @property string $response
 *
 * @property BloodAlert $alert
 * @property User $user
 */
class DonorResponse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donor_response';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'alert_id', 'response'], 'required'],
            [['user_id', 'alert_id'], 'integer'],
            [['response'], 'string', 'max' => 255],
            [['alert_id'], 'exist', 'skipOnError' => true, 'targetClass' => BloodAlert::className(), 'targetAttribute' => ['alert_id' => 'alert_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'response_id' => 'Response ID',
            'user_id' => 'User ID',
            'alert_id' => 'Alert ID',
            'response' => 'Response',
        ];
    }

    /**
     * Gets query for [[Alert]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlert()
    {
        return $this->hasOne(BloodAlert::className(), ['alert_id' => 'alert_id']);
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
