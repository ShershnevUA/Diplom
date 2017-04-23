<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m170323_104859_create_role_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('role', [
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
        $this->dropTable('role');
    }
}
