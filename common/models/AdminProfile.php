<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admin_profile".
 *
 * @property int $admin_profileId
 * @property int $user_id
 * @property string $firstname
 * @property string $middlename
 * @property string $surname
 * @property string $phoneNo
 * @property int $branch_id
 * @property int $gender_id
 * @property int $hospital_roleId
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Branch $branch
 * @property Gender $gender
 * @property HospitalRole $hospitalRole
 * @property User $user
 */
class AdminProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'firstname', 'middlename', 'surname', 'phoneNo', 'branch_id', 'gender_id', 'hospital_roleId'], 'required'],
            [['user_id', 'branch_id', 'gender_id', 'hospital_roleId'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['firstname', 'middlename', 'surname', 'phoneNo'], 'string', 'max' => 255],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::className(), 'targetAttribute' => ['branch_id' => 'branch_id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'gender_id']],
            [['hospital_roleId'], 'exist', 'skipOnError' => true, 'targetClass' => HospitalRole::className(), 'targetAttribute' => ['hospital_roleId' => 'hospital_roleId']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'admin_profileId' => 'Admin Profile ID',
            'user_id' => 'User ID',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'surname' => 'Surname',
            'phoneNo' => 'Phone No',
            'branch_id' => 'Branch ID',
            'gender_id' => 'Gender ID',
            'hospital_roleId' => 'Hospital Role ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['gender_id' => 'gender_id']);
    }

    /**
     * Gets query for [[HospitalRole]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalRole()
    {
        return $this->hasOne(HospitalRole::className(), ['hospital_roleId' => 'hospital_roleId']);
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
