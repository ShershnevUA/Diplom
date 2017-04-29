<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $position
 * @property string $rate
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 * @property string $time
 * @property integer $role_id
 *
 * @property BonusFine[] $bonusFines
 * @property Salary[] $salaries
 * @property Role $role
 * @property UserProject[] $userProjects
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'safe'],
            [['role_id'], 'required'],
            [['role_id'], 'integer'],
            [['email', 'first_name', 'last_name', 'phone_number', 'position', 'rate', 'password', 'auth_key', 'access_token'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'position' => 'Position',
            'rate' => 'Rate',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'time' => 'Time',
            'role_id' => 'Role ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBonusFines()
    {
        return $this->hasMany(BonusFine::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalaries()
    {
        return $this->hasMany(Salary::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProjects()
    {
        return $this->hasMany(UserProject::className(), ['user_id' => 'id']);
    }
}
