<?php

use yii\db\Schema;
use yii\db\Migration;

class m160112_090233_create_column_vid extends Migration
{
    public function up()
    {

        $this->addColumn('client', 'namevid','string NULL');

    }

    public function down()
    {
        echo "m160112_090233_create_column_vid cannot be reverted.\n";

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
