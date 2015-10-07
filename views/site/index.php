<?php

use yii\helpers\Html;
#use yii\grid\GridView;
use app\models\Trip;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute'=>'numbertrip',
                'label'=>'№ Командировки',

            ],





            [
                'attribute'=>'iduserdata',
                'label'=>'Фамилия Имя Отчество',

                'value'=> function($data)
                {
                    return $data->userdata1->pib;
                }
            ],

            [
                'attribute'=>'test1',
                'label'=>'Должность',

                'value'=> function($data)
                {
                    return $data->userdata1->position;
                }
            ],


            [
                'attribute'=>'test',

                'value'=> function($data)
                {
                    return $data->client1->directions->sity;
                }
            ],




            [
                'attribute'=>'idclient',
                'label'=>'Предприятие для командировки ',
                'headerOptions' => ['width' => '380'],
                'filter'=>ArrayHelper::map(\app\models\Client::find()->orderBy('nameclient')->asArray()->all(), 'id', 'nameclient'),
                'width'=>'150px',
                'value'=> function($data)
                {
                    return $data->client1->nameclient;
                }
            ],


            'target',



           // 'date_kup_bilet:datetime',

            [
                'attribute'=>'date_otpr',
                'label' => 'Дата отправления',
                'format' => 'datetime',

            ],
            [
                'attribute'=>'date_pr',
                'label' => 'Дата прибытия.',
                'format' => 'datetime',

            ],

            [
                'attribute'=>'date_otpr1',
                'label' => 'Дата отправления',
                'format' => 'datetime',

            ],
            [
                'attribute'=>'date_pr1',
                'label' => 'Дата прибытия.',
                'format' => 'datetime',

            ],


            [
                'attribute'=>'idpr',
                'label'=>'Номер Приказа ',
                'value'=> function($data)
                {
                    return $data->prikaz1->nomberprikaz;
                }
            ],



            // 'budzhet',
            // 'zhurnal',
            // 'note',
            // 'created_at',
            // 'updated_at',

            [
                'attribute'=>'ssilka',
                'label'=>'Ссылка ',
                'format' => 'raw',
                'value'=>function ($data) {
                    return Html::a(Html::encode('Командировка'), Url::to(['trip/komand', 'id' => $data->id ]),array('target' => '_blank'));

                },
            ],







            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'trip'
            ],




        ],
    ]);




    ?>

</div>
