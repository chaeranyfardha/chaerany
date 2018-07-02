<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180625_024750_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()->unique(),
            'slug' => $this->string(64)->notNull()->unique(),
            'meta_description' => $this->string(160),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
