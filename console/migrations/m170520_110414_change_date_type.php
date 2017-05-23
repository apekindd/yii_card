<?php

use yii\db\Migration;

class m170520_110414_change_date_type extends Migration
{
    public function up()
    {
        $this->dropColumn('post','date_create');
        $this->dropColumn('post','date_update');
        $this->dropColumn('deck','date_create');
        $this->dropColumn('deck','date_update');

        $this->addColumn('post','created_at', $this->integer(11));
        $this->addColumn('post','updated_at', $this->integer(11));
        $this->addColumn('deck','created_at', $this->integer(11));
        $this->addColumn('deck','updated_at', $this->integer(11));
    }

    public function down()
    {
        $this->dropColumn('post','created_at');
        $this->dropColumn('post','updated_at');
        $this->dropColumn('deck','created_at');
        $this->dropColumn('deck','updated_at');

        $this->addColumn('post','date_create', $this->timestamp());
        $this->addColumn('post','date_update', $this->timestamp());
        $this->addColumn('deck','date_create', $this->timestamp());
        $this->addColumn('deck','date_update', $this->timestamp());
    }
}
