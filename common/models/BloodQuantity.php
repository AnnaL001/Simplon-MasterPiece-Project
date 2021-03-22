<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blood_quantity".
 *
 * @property int $quantity_id
 * @property int $quantityInPints
 *
 * @property Donation[] $donations
 */
class BloodQuantity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blood_quantity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantityInPints'], 'required'],
            [['quantityInPints'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'quantity_id' => 'Quantity ID',
            'quantityInPints' => 'Quantity In Pints',
        ];
    }

    /**
     * Gets query for [[Donations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonations()
    {
        return $this->hasMany(Donation::className(), ['quantity_id' => 'quantity_id']);
    }
}
