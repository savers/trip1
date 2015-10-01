<?php

use yii\db\Schema;
use yii\db\Migration;

class m150930_103727_create_column_username extends Migration
{
    public function up()
    {
        $this->addColumn('users', 'username','string not NULL');
    }

    public function down()
    {
        echo "m150930_103727_create_column_username cannot be reverted.\n";

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
