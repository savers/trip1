<?php

use yii\db\Schema;
use yii\db\Migration;

class m150930_084827_create_column_auth_key extends Migration
{
    public function up()
    {

        $this->addColumn('users', 'auth_key','string');

    }

    public function down()
    {
        echo "m150930_084827_create_column_auth_key cannot be reverted.\n";

        return false;
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
