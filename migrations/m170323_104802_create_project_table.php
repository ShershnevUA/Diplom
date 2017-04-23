<?php

use yii\db\Migration;

/**
 * Handles the creation of table `projects`.
 */
class m170323_104802_create_project_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
//            'customer_id' => $this->integer(),
//            'project_status_id' => $this->integer(),
            'name' => $this->string(),
            'description' => $this->string(),
            'rate' => $this->integer(),
            'number_of_hours' => $this->integer(),
            'time' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('project');
    }
}
