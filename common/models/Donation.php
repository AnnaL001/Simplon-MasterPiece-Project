<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donation".
 *
 * @property int $donation_id
 * @property int $user_id
 * @property int $alert_id
 * @property int $quantity_id
 * @property string|null $verification
 * @property int|null $verified_by
 * @property string $created_at
 * @property string $updated_at
 *
 * @property BloodAlert $alert
 * @property BloodQuantity $quantity
 * @property User $user
 * @property DonationHistory[] $donationHistories
 */
class Donation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'alert_id', 'quantity_id'], 'required'],
            [['user_id', 'alert_id', 'quantity_id', 'verified_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['verification'], 'string', 'max' => 255],
            [['alert_id'], 'exist', 'skipOnError' => true, 'targetClass' => BloodAlert::className(), 'targetAttribute' => ['alert_id' => 'alert_id']],
            [['quantity_id'], 'exist', 'skipOnError' => true, 'targetClass' => BloodQuantity::className(), 'targetAttribute' => ['quantity_id' => 'quantity_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'donation_id' => 'Donation ID',
            'user_id' => 'User ID',
            'alert_id' => 'Alert ID',
            'quantity_id' => 'Quantity ID',
            'verification' => 'Verification',
            'verified_by' => 'Verified By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
     * Gets query for [[Quantity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuantity()
    {
        return $this->hasOne(BloodQuantity::className(), ['quantity_id' => 'quantity_id']);
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

    /**
     * Gets query for [[DonationHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonationHistories()
    {
        return $this->hasMany(DonationHistory::className(), ['donation_id' => 'donation_id']);
    }
}
