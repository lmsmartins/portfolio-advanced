<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m221103_192059_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'body' => $this->text()->notNull(),
            'slug' => $this->text()->notNull(),
            'is_published' => $this->boolean()->notNull(),
            'created_at' => $this->bigInteger()->notNull(),
            'updated_at' => $this->bigInteger()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
