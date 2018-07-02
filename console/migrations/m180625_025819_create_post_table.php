<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180625_025819_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull()->unique(),
            'slug' => $this->string(128)->notNull()->unique(),
            'lead_photo' => $this->string(128),
             'lead_text' => $this->text(),
            'content' => $this->text()->notNull(),
            'meta_description' => $this->string(160),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'category_id' => $this->integer()->notNull()
            
        ]);
        $this->createIndex('post_index', 'post',
                ['created_by', 'updated_by']);
        $this->addForeignKey('fk_post_category', 'post',
                'category_id', 'category', 'id', 'CASCADE', 'CASCADE');
         $this->addForeignKey('fk_post_user_created_by', 'post',
                'created_by', 'user', 'id', 'CASCADE', 'CASCADE');
         $this->addForeignKey('fk_post_user_updated_by', 'post',
                'updated_by', 'user', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_post_category', 'post');
         $this->dropForeignKey('fk_post_user_created_by', 'post');
         $this->dropForeignKey('fk_post_user_updated_by', 'post');
        $this->dropTable('post');
    }
}
