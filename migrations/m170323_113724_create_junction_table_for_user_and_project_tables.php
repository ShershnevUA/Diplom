<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users_projects`.
 * Has foreign keys to the tables:
 *
 * - `users`
 * - `projects`
 */
class m170323_113724_create_junction_table_for_user_and_project_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_project', [
            'user_id' => $this->integer(),
            'project_id' => $this->integer(),
            'hours' => $this->integer(),
            'percentage_of_completion' => $this->string(),
            'PRIMARY KEY(user_id, project_id)',
        ]);

        // creates index for column `users_id`
        $this->createIndex(
            'idx-user_project-user_id',
            'user_project',
            'user_id'
        );

        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-user_project-user_id',
            'user_project',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `projects_id`
        $this->createIndex(
            'idx-user_project-project_id',
            'user_project',
            'project_id'
        );

        // add foreign key for table `projects`
        $this->addForeignKey(
            'fk-user_project-project_id',
            'user_project',
            'project_id',
            'project',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `users`
        $this->dropForeignKey(
            'fk-user_project-user_id',
            'user_project'
        );

        // drops index for column `users_id`
        $this->dropIndex(
            'idx-user_project-user_id',
            'user_project'
        );

        // drops foreign key for table `projects`
        $this->dropForeignKey(
            'fk-user_project-project_id',
            'user_project'
        );

        // drops index for column `projects_id`
        $this->dropIndex(
            'idx-user_project-project_id',
            'user_project'
        );

        $this->dropTable('user_project');
    }
}
