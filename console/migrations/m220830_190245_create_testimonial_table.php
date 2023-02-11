<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%testimonial}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%project}}`
 * - `{{%file}}`
 */
class m220830_190245_create_testimonial_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%testimonial}}', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'customer_image_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'customer_name' => $this->string()->notNull(),
            'review' => $this->text()->notNull(),
            'rating' => $this->integer()->notNull(),
        ]);

        // creates index for column `project_id`
        $this->createIndex(
            '{{%idx-testimonial-project_id}}',
            '{{%testimonial}}',
            'project_id'
        );

        // add foreign key for table `{{%project}}`
        $this->addForeignKey(
            '{{%fk-testimonial-project_id}}',
            '{{%testimonial}}',
            'project_id',
            '{{%project}}',
            'id',
            'CASCADE'
        );

        // creates index for column `customer_image_id`
        $this->createIndex(
            '{{%idx-testimonial-customer_image_id}}',
            '{{%testimonial}}',
            'customer_image_id'
        );

        // add foreign key for table `{{%file}}`
        $this->addForeignKey(
            '{{%fk-testimonial-customer_image_id}}',
            '{{%testimonial}}',
            'customer_image_id',
            '{{%file}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%project}}`
        $this->dropForeignKey(
            '{{%fk-testimonial-project_id}}',
            '{{%testimonial}}'
        );

        // drops index for column `project_id`
        $this->dropIndex(
            '{{%idx-testimonial-project_id}}',
            '{{%testimonial}}'
        );

        // drops foreign key for table `{{%file}}`
        $this->dropForeignKey(
            '{{%fk-testimonial-customer_image_id}}',
            '{{%testimonial}}'
        );

        // drops index for column `customer_image_id`
        $this->dropIndex(
            '{{%idx-testimonial-customer_image_id}}',
            '{{%testimonial}}'
        );

        $this->dropTable('{{%testimonial}}');
    }
}
