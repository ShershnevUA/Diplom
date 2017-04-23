<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project_status`.
 */
class m170323_105408_create_project_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('project_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'time' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('project_status');
    }
}
