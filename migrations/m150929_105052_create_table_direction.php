<?php

use yii\db\Schema;
use yii\db\Migration;

class m150929_105052_create_table_direction extends Migration
{
    public function up()
    {

        $this->createTable(
            'direction',
            [
                'id'=>Schema::TYPE_PK,
                'sity'=>Schema::TYPE_STRING.' NOT NULL',
            ]

        );

    }






    public function down()
    {
        $this->dropTable('direction');
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
