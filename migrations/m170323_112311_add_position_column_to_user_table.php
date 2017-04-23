<?php

use yii\db\Migration;

/**
 * Handles adding position to table `users`.
 * Has foreign keys to the tables:
 *
 * - `roles`
 */
class m170323_112311_add_position_column_to_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'role_id', $this->integer()->notNull());

        // creates index for column `role_id`
        $this->createIndex(
            'idx-user-role_id',
            'user',
            'role_id'
        );

        // add foreign key for table `roles`
        $this->addForeignKey(
            'fk-user-role_id',
            'user',
            'role_id',
            'role',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `roles`
        $this->dropForeignKey(
            'fk-user-role_id',
            'user'
        );

        // drops index for column `role_id`
        $this->dropIndex(
            'idx-user-role_id',
            'user'
        );

        $this->dropColumn('user', 'role_id');
    }
}
