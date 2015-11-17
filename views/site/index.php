<?php

use yii\helpers\Html;
#use yii\grid\GridView;
use app\models\Trip;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use kartik\grid\GridView;
use kartik\export\ExportMenu;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="trip-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?php    $form = ActiveForm::begin();

    echo DatePicker::widget([
        'name' => 'from_date',
        'type' => DatePicker::TYPE_RANGE,
        'name2' => 'to_date',
        'pluginOptions' => [
            'autoclose'=>true,
        ]
    ]);

    echo '<br>';
    echo Html::submitButton('Поиск', ['class' => 'btn btn-primary']);


    ActiveForm::end();

    ?>

<br><br>

    <?php  $gridColumns = [
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'trip'
        ],


        [
            'attribute'=>'ssilka',
            'label'=>'Ссылка ',
            'format' => 'raw',
            'value'=>function ($data) {
                return Html::a(Html::encode('Командировка'), Url::to(['trip/komand', 'id' => $data->id ]),array('target' => '_blank'));

            },
        ],


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











    ];
    ?>


    <?php  echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' =>  $gridColumns,

    ]);

    echo  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' =>  $gridColumns,

    ]);


    ?>






</div>
