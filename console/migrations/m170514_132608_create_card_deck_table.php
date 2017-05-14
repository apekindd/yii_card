<?php

use yii\db\Migration;

/**
 * Handles the creation of table `card_deck`.
 */
class m170514_132608_create_card_deck_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('card_deck', [
            'id' => $this->primaryKey(),
            'card_id' => $this->integer()->notNull(),
            'deck_id' => $this->integer()->notNull(),
            'card_cnt' => $this->integer()->defaultValue(1)->notNull(),
        ]);

        // creates index for column `card_id`
        $this->createIndex(
            'idx-card_deck-card_id',
            'card_deck',
            'card_id'
        );

        // add foreign key for table `card`
        $this->addForeignKey(
            'fk-card_deck-card_id',
            'card_deck',
            'card_id',
            'card',
            'id',
            'CASCADE'
        );

        // creates index for column `deck_id`
        $this->createIndex(
            'idx-card_deck-deck_id',
            'card_deck',
            'deck_id'
        );

        // add foreign key for table `deck`
        $this->addForeignKey(
            'fk-card_deck-deck_id',
            'card_deck',
            'deck_id',
            'deck',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `card_deck`
        $this->dropForeignKey(
            'fk-card_deck-card_id',
            'card_deck'
        );

        // drops index for column `card_id`
        $this->dropIndex(
            'idx-card_deck-card_id',
            'card_deck'
        );

        // drops foreign key for table `card_deck`
        $this->dropForeignKey(
            'fk-card_deck-deck_id',
            'card_deck'
        );

        // drops index for column `deck_id`
        $this->dropIndex(
            'idx-card_deck-deck_id',
            'card_deck'
        );

        $this->dropTable('card_deck');
    }
}
