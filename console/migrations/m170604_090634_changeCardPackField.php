<?php

use yii\db\Migration;

class m170604_090634_changeCardPackField extends Migration
{
    public function up()
    {
        $this->alterColumn('card', 'pack', $this->integer()->notNull());

        $this->renameColumn('card','pack', 'pack_id');

        // creates index for column `pack`
        $this->createIndex(
            'idx-card-pack_id',
            'card',
            'pack_id'
        );

        // add foreign key for table `card`
        $this->addForeignKey(
            'fk-card-pack_id',
            'card',
            'pack_id',
            'pack',
            'id',
            'CASCADE'
        );


    }

    public function down()
    {
        // drops foreign key for table `card`
        $this->dropForeignKey(
            'fk-card-pack_id',
            'card'
        );

        // drops index for column `pack`
        $this->dropIndex(
            'idx-card-pack_id',
            'card'
        );

        $this->renameColumn('card','pack_id', 'pack');

        $this->alterColumn('card', 'pack', $this->string()->notNull());
    }
}
