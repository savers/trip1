<?php

use yii\db\Schema;
use yii\db\Migration;

class m150929_132439_create_table_project extends Migration
{
    public function up()
    {

        $this->createTable(
            'project',
            [
                'id'=>Schema::TYPE_PK,
                'name_project'=>Schema::TYPE_STRING.' NOT NULL',
            ]

        );

    }






    public function down()
    {
        $this->dropTable('project');
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
