<?php

use yii\db\Schema;
use yii\db\Migration;

class m151001_085919_create_table_trip extends Migration
{
    public function safeUp()
    {

        $this->createTable(
            'trip',
            [
                'id'=>Schema::TYPE_PK,
                'iduserdata'=>Schema::TYPE_INTEGER.' NOT NULL',
                'idclient'=>Schema::TYPE_INTEGER.' NOT NULL',
                'idproject'=>Schema::TYPE_INTEGER.' NOT NULL',
                'idusers'=>Schema::TYPE_INTEGER.' NOT NULL',
                'date_kup_bilet'=>Schema::TYPE_INTEGER.' NOT NULL',
                'date_otpr'=>Schema::TYPE_INTEGER.' NOT NULL',
                'date_pr'=>Schema::TYPE_INTEGER.' NOT NULL',
                'date_otpr1'=>Schema::TYPE_INTEGER.' NOT NULL',
                'date_pr1'=>Schema::TYPE_INTEGER.' NOT NULL',
                'status_trip'=>Schema::TYPE_SMALLINT.' NOT NULL',
                'numbertrip'=>Schema::TYPE_INTEGER.' NOT NULL',
                'target'=>Schema::TYPE_STRING.' NOT NULL',
                'daily'=>Schema::TYPE_FLOAT.' NOT NULL',
                'vidtransport'=>Schema::TYPE_STRING.' NOT NULL',
                'cena_pr'=>Schema::TYPE_FLOAT.' NOT NULL',
                'event'=>Schema::TYPE_FLOAT.' NOT NULL',
                'taxi'=>Schema::TYPE_FLOAT.' NOT NULL',
                'predstav'=>Schema::TYPE_FLOAT.' NOT NULL',
                'budzhet'=>Schema::TYPE_SMALLINT.' NOT NULL',
                'date_zvit'=>Schema::TYPE_INTEGER.' NOT NULL',
                'key'=>Schema::TYPE_SMALLINT.' NOT NULL',
                'zhurnal'=>Schema::TYPE_SMALLINT.' NOT NULL',
                'note'=>Schema::TYPE_STRING,
                'created_at'=>Schema::TYPE_INTEGER.' NOT NULL',
                'updated_at'=>Schema::TYPE_INTEGER.' NOT NULL',


            ]

        );
        $this->addForeignKey('tripuserdata','trip','iduserdata','userdata','id');
        $this->addForeignKey('tripclient','trip','idclient','client','id');
        $this->addForeignKey('tripproject','trip','idproject','project','id');
        $this->addForeignKey('tripusers','trip','idusers','users','id');

    }

    public function safeDown()
    {
        $this->dropTable('trip');
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
