<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customers`.
 */
class m170323_104818_create_customer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'phone_number' => $this->string(),
            'time' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('customer');
    }
}
