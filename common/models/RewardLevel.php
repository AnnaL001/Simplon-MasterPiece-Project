<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reward_level".
 *
 * @property int $level_id
 * @property string $level_name
 *
 * @property DonorProfile[] $donorProfiles
 */
class RewardLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reward_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level_name'], 'required'],
            [['level_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'level_id' => 'Level ID',
            'level_name' => 'Level Name',
        ];
    }

    /**
     * Gets query for [[DonorProfiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonorProfiles()
    {
        return $this->hasMany(DonorProfile::className(), ['level_id' => 'level_id']);
    }
}
