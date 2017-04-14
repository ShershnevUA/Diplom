<?php

use yii\db\Migration;

/**
 * Handles the creation of table `role`.
 */
class m170414_175830_create_role_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'name' =>$this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('role');
    }
}
