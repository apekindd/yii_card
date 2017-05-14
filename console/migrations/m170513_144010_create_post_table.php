<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m170513_144010_create_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'code' => $this->string(255)->notNull(),
            'preview_text' => $this->string(255),
            'detail_text' => $this->text(),
            'images' => $this->text(),
            'date_create' => $this->timestamp(),
            'date_update' => $this->timestamp(),
            'active' => $this->integer(1)->defaultValue(1),
            'views' => $this->integer()->defaultValue(0),
            'user_id' => $this->integer()->notNull(),
            'seo_description' => $this->string(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-post-user_id',
            'post',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-post-user_id',
            'post',
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

        // drops foreign key for table `post`
        $this->dropForeignKey(
            'fk-post-user_id',
            'post'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-post-user_id',
            'post'
        );

        $this->dropTable('post');
    }
}
