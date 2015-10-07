<?php

use yii\db\Schema;
use yii\db\Migration;

class m151007_074037_create_key extends Migration
{
    public function up()
    {

        $this->addForeignKey('tripidpr','trip','idpr','prikaz','id');

    }

    public function down()
    {
        echo "m151007_074037_create_key cannot be reverted.\n";

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
