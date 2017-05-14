<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m170513_151632_create_comment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'element_id' => $this->integer()->notNull(),
            'element_type' => $this->string()->notNull(),
            'parent_id' => $this->integer()->defaultValue(0),
            'date_create' => $this->timestamp()
        ]);


        // creates index for column `user_id`
        $this->createIndex(
            'idx-comment-user_id',
            'comment',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-comment-user_id',
            'comment',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `parent_id`
        $this->createIndex(
            'idx-comment-parent_id',
            'comment',
            'parent_id'
        );

        // add foreign key for table `comment`
        $this->addForeignKey(
            'fk-comment-parent_id',
            'comment',
            'parent_id',
            'comment',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `comment`
        $this->dropForeignKey(
            'fk-comment-user_id',
            'comment'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-comment-user_id',
            'comment'
        );

        // drops foreign key for table `comment`
        $this->dropForeignKey(
            'fk-comment-parent_id',
            'comment'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            'idx-comment-parent_id',
            'comment'
        );

        $this->dropTable('comment');
    }
}
