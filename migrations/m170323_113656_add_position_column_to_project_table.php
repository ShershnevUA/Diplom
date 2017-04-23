<?php

use yii\db\Migration;

/**
 * Handles adding position to table `projects`.
 * Has foreign keys to the tables:
 *
 * - `customers`
 * - `project_status`
 */
class m170323_113656_add_position_column_to_project_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('project', 'customer_id', $this->integer()->notNull());
        $this->addColumn('project', 'status_id', $this->integer()->notNull());

        // creates index for column `customer_id`
        $this->createIndex(
            'idx-project-customer_id',
            'project',
            'customer_id'
        );

        // add foreign key for table `customers`
        $this->addForeignKey(
            'fk-project-customer_id',
            'project',
            'customer_id',
            'customer',
            'id',
            'CASCADE'
        );

        // creates index for column `status_id`
        $this->createIndex(
            'idx-project-status_id',
            'project',
            'status_id'
        );

        // add foreign key for table `project_status`
        $this->addForeignKey(
            'fk-project-status_id',
            'project',
            'status_id',
            'project_status',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `customers`
        $this->dropForeignKey(
            'fk-project-customer_id',
            'project'
        );

        // drops index for column `customer_id`
        $this->dropIndex(
            'idx-project-customer_id',
            'project'
        );

        // drops foreign key for table `project_status`
        $this->dropForeignKey(
            'fk-project-status_id',
            'project'
        );

        // drops index for column `status_id`
        $this->dropIndex(
            'idx-project-status_id',
            'project'
        );

        $this->dropColumn('project', 'customer_id');
        $this->dropColumn('project', 'status_id');
    }
}
