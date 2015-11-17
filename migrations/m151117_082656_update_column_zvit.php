<?php

use yii\db\Schema;
use yii\db\Migration;

class m151117_082656_update_column_zvit extends Migration
{
    public function up()
    {
        $this->alterColumn('trip', 'date_zvit','integer NULL');

    }

    public function safeDown()
    {
        echo "m151117_082656_update_column_zvit cannot be reverted.\n";

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
