<?php

use yii\db\Migration;

class m170523_165754_change_date_field_comment extends Migration
{
    public function up()
    {
        $this->dropColumn('comment','date_create');
        $this->addColumn('comment','created_at', $this->integer(11));
        $this->addColumn('comment','updated_at', $this->integer(11));
    }

    public function down()
    {
        $this->dropColumn('comment','created_at');
        $this->dropColumn('comment','updated_at');
        $this->addColumn('comment','date_create', $this->timestamp());
    }
}
