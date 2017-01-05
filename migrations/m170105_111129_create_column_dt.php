<?php

use yii\db\Schema;
use yii\db\Migration;

class m170105_111129_create_column_dt extends Migration
{
    public function up()
    {
        $this->addColumn('trip', 'dt','int not NULL DEFAULT 2016 ');
    }

    public function down()
    {

    }

}
