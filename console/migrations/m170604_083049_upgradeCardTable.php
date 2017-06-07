<?php

use yii\db\Migration;

class m170604_083049_upgradeCardTable extends Migration
{
    public function up()
    {
        $this->alterColumn('card','quality', $this->integer()->notNull());

        $this->createTable('pack', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'name_en' => $this->string(255),
            'wild' => $this->integer(1)->defaultValue(0)
        ]);
    }

    public function down()
    {
        $this->alterColumn('card','quality', $this->string()->notNull());

        $this->dropTable('pack');
    }
}
