<?php

use yii\db\Migration;

class m170520_132944_add_type_deck_post extends Migration
{
    public function up()
    {
        $this->addColumn('post','type',$this->string(4)->defaultValue('post'));
        $this->addColumn('deck','type',$this->string(4)->defaultValue('deck'));
    }

    public function down()
    {
        $this->dropColumn('post','type');
        $this->dropColumn('deck','type');
    }
}
