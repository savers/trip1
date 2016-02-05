<?php

use yii\db\Schema;
use yii\db\Migration;

class m160205_093933_create_column_date_zvit_us extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('trip', 'date_zvit_us','integer NULL');
        $this->alterColumn('trip', 'stoimost_pr','float NULL');

    }

    public function down()
    {
        echo "m160205_093933_create_column_date_zvit_us cannot be reverted.\n";

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
