<?php

use yii\db\Migration;

/**
 * Handles adding position to table `bonus_fine`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170324_110651_add_position_column_to_bonus_fine_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('bonus_fine', 'user_id', $this->integer()->notNull());

        // creates index for column `user_id`
        $this->createIndex(
            'idx-bonus_fine-user_id',
            'bonus_fine',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-bonus_fine-user_id',
            'bonus_fine',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-bonus_fine-user_id',
            'bonus_fine'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-bonus_fine-user_id',
            'bonus_fine'
        );

        $this->dropColumn('bonus_fine', 'user_id');
    }
}
