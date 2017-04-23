<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m170323_104747_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string()->unique(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'phone_number' => $this->string(),
            'position' => $this->string(),
            'rate' => $this->string(),
            'password' => $this->string(),
            'time' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
