<?php

use yii\db\Schema;
use yii\db\Migration;

class m151008_131622_create_column_otpravlsity extends Migration
{
    public function Up()
    {
        $this->addColumn('trip', 'idotpr','integer not NULL');
        // $this->addForeignKey('tripprikaz','trip','idpr','prikaz','id');
    }

    public function safeDown()
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
