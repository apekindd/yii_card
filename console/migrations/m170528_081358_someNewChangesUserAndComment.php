<?php

use yii\db\Migration;

class m170528_081358_someNewChangesUserAndComment extends Migration
{
    public function up()
    {
        $this->alterColumn('comment', 'element_type', $this->string(4));

        $this->addColumn('user','images',$this->string(255));
        $this->addColumn('user','name',$this->string(255));
        $this->addColumn('user','soc_id',$this->integer(1));
        $this->addColumn('user','soc_type',$this->integer(1));
    }

    public function down()
    {
        $this->alterColumn('comment', 'element_type', $this->string(255));
        $this->dropColumn('user','name');
        $this->dropColumn('user','soc_id');
        $this->dropColumn('user','soc_type');
    }
}
