<?php

use yii\db\Schema;
use yii\db\Migration;

class m150926_090928_create_depart extends Migration
{
    public function up()
    {

        $this->createTable(
            'depart',
            [
                'id'=>Schema::TYPE_PK,
                'name_depart'=>Schema::TYPE_STRING.' NOT NULL',
            ]

        );

    }






    public function down()
    {
        $this->dropTable('depart');
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
