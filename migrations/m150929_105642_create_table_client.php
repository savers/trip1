<?php

use yii\db\Schema;
use yii\db\Migration;

class m150929_105642_create_table_client extends Migration
{
    public function safeUp()
    {

        $this->createTable(
            'client',
            [
                'id'=>Schema::TYPE_PK,
                'iddirection'=>Schema::TYPE_INTEGER,
                'nameclient'=>Schema::TYPE_STRING.' NOT NULL',

            ]

        );
        $this->addForeignKey('clientdirection','client','iddirection','direction','id');


    }

    public function safeDown()
    {
        $this->dropTable('client');
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
