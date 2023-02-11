<?php

use yii\db\Migration;

/**
 * Class m220914_205841_alter_date_columns_in_project_table
 */
class m220914_205841_alter_date_columns_in_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('project', 'start_date', 'date');
        $this->alterColumn('project', 'end_date', 'date');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('project', 'start_date', 'integer');
        $this->alterColumn('project', 'end_date', 'integer');
    }

}
