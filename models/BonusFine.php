<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bonus_fine".
 *
 * @property integer $id
 * @property integer $sum
 * @property string $description
 * @property string $time
 * @property integer $user_id
 *
 * @property User $user
 */
class BonusFine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bonus_fine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sum', 'user_id'], 'integer'],
            [['time'], 'safe'],
            [['user_id'], 'required'],
            [['description'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sum' => 'Sum',
            'description' => 'Description',
            'time' => 'Time',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
