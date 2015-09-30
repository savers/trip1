<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;
use yii\helpers\ArrayHelper;
use app\models\Depart;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */





?>
<div class="user-data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить данные сотрудника', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,


        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'attribute'=>'id_depart',
               'filter'=>ArrayHelper::map(Depart::find()->orderBy('name_depart')->asArray()->all(), 'id', 'name_depart'),
               'label'=>'Департамент',

                'value'=> function($data)
                {
                    return $data->idDepart->name_depart;
                }
            ],
            'pib',
            'position',
            'pasport',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],






        ],
    ]); ?>

</div>
