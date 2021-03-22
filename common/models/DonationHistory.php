<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donation_history".
 *
 * @property int $history_id
 * @property int $donation_id
 *
 * @property Donation $donation
 */
class DonationHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donation_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['donation_id'], 'required'],
            [['donation_id'], 'integer'],
            [['donation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Donation::className(), 'targetAttribute' => ['donation_id' => 'donation_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'history_id' => 'History ID',
            'donation_id' => 'Donation ID',
        ];
    }

    /**
     * Gets query for [[Donation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonation()
    {
        return $this->hasOne(Donation::className(), ['donation_id' => 'donation_id']);
    }
}
