<?php

use yii\db\Migration;

/**
 * Handles the creation of table `socAuth`.
 */
class m170609_140937_create_socAuth_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('soc_auth', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(255)->notNull(),
            'image'=> $this->string(40),
            'soc_type' => $this->integer(),
            'soc_id' => $this->string(),
            'auth_string' => $this->string(32),
            'permissions' => $this->integer()->defaultValue(1)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('soc_auth');
    }
}
