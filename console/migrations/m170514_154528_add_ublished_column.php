<?php

use yii\db\Migration;

class m170514_154528_add_ublished_column extends Migration
{
    public function up()
    {
        $this->addColumn('post','publish',$this->integer()->defaultValue(0));
        $this->addColumn('deck','publish',$this->integer()->defaultValue(0));
    }

    public function down()
    {
        $this->dropColumn('post','publish');
        $this->dropColumn('deck','publish');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
