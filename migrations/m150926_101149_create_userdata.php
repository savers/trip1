<?php

use yii\db\Schema;
use yii\db\Migration;

class m150926_101149_create_userdata extends Migration
{
    public function safeUp()
    {

        $this->createTable(
            'userdata',
            [
                'id'=>Schema::TYPE_PK,
                'id_depart'=>Schema::TYPE_INTEGER,
                'pib'=>Schema::TYPE_STRING.' NOT NULL',
                'position'=>Schema::TYPE_STRING.' NOT NULL',
                'pasport'=>Schema::TYPE_STRING.' NOT NULL',
                'status'=>Schema::TYPE_INTEGER,

            ]

        );
        $this->addForeignKey('user_depart_id','userdata','id_depart','depart','id');


    }

    public function safeDown()
    {
        $this->dropTable('userdata');
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
