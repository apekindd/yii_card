<?php

use yii\db\Migration;

/**
 * Handles the creation of table `deck`.
 */
class m170514_132558_create_deck_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('deck', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'code' => $this->string(255)->notNull(),
            'preview_text' => $this->string(255),
            'detail_text' => $this->text(),
            'images' => $this->text(),
            'active' => $this->integer(1)->defaultValue(1)->notNull(),
            'date_create' => $this->timestamp(),
            'date_update' => $this->timestamp(),
            'seo_description' => $this->string(255),
            'unique' => $this->string(32),
            'dust' => $this->integer(),
            'views' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('deck');
    }
}
