<?php

use yii\db\Schema;
use yii\db\Migration;

class m151007_071645_create_table_prikaz extends Migration
{
    public function up()
    {

        $this->createTable(
            'prikaz',
            [
                'id'=>Schema::TYPE_PK,
                'nomberprikaz'=>Schema::TYPE_STRING.' NOT NULL',
                'dateprikaz'=>Schema::TYPE_INTEGER.' NOT NULL',
            ]

        );

    }






    public function down()
    {
        $this->dropTable('prikaz');
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
