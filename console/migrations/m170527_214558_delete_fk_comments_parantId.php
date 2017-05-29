<?php

use yii\db\Migration;

class m170527_214558_delete_fk_comments_parantId extends Migration
{
    public function up()
    {
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
    }

    public function down()
    {
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
}
