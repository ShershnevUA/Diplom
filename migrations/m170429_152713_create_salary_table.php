<?php

use yii\db\Migration;

/**
 * Handles the creation of table `slary`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170429_152713_create_salary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('salary', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'sum' => $this->integer(),
            'description' => $this->text(),
            'data' => $this->dateTime(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-salary-user_id',
            'salary',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-salary-user_id',
            'salary',
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
            'fk-salary-user_id',
            'slary'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-salary-user_id',
            'salary'
        );

        $this->dropTable('salary');
    }
}
