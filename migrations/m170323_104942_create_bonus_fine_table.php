<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bonus_fines`.
 */
class m170323_104942_create_bonus_fine_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bonus_fine', [
            'id' => $this->primaryKey(),
            'sum' => $this->integer(),
            'description' => $this->string(),
            'time' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('bonus_fine');
    }
}
