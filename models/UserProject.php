<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_project".
 *
 * @property integer $user_id
 * @property integer $project_id
 * @property integer $task_id
 * @property string $name
 * @property integer $hours
 * @property string $percentage_of_completion
 * @property string $description
 * @property string $estimate
 * @property string $create_data
 * @property string $close_date
 * @property integer $is_close
 *
 * @property Project $project
 * @property User $user
 */
class UserProject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'project_id', 'hours', 'is_close'], 'integer'],
            [['description'], 'string'],
            [['create_data', 'close_date'], 'safe'],
            [['name', 'percentage_of_completion', 'estimate'], 'string', 'max' => 255],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'project_id' => 'Project ID',
            'task_id' => 'Task ID',
            'name' => 'Name',
            'hours' => 'Hours',
            'percentage_of_completion' => 'Percentage Of Completion',
            'description' => 'Description',
            'estimate' => 'Estimate',
            'create_data' => 'Create Data',
            'close_date' => 'Close Date',
            'is_close' => 'Is Close',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
