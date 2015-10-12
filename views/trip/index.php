<?php

use yii\helpers\Html;
#use yii\grid\GridView;
use app\models\Trip;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\datetime\DateTimePicker;
use kartik\grid\GridView;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить командировку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?php     $gridColumns = [



            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute'=>'numbertrip',
                'label'=>'№ Командировки',

            ],





            [
                'attribute'=>'iduserdata',
                'filter'=>ArrayHelper::map(\app\models\Userdata::find()->orderBy('pib')->asArray()->all(), 'id', 'pib'),
                'label'=>'Фамилия Имя Отчество',

                'value'=> function($data)
                {
                    return $data->userdata1->pib;
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




            [
                'attribute'=>'idproject',
                'label'=>'Проект/Клиент для командировки',
                'filter'=>ArrayHelper::map(\app\models\Project::find()->orderBy('name_project')->asArray()->all(), 'id', 'name_project'),

                'value'=> function($data)
                {
                    return $data->project1->name_project;
                }
            ],

            // 'date_kup_bilet:datetime',

            [

             /*  'filter' => DatePicker::widget([
                    'name' => 'date_otpr',
                    'type' => DatePicker::TYPE_RANGE,
                    'name2' => 'to',
                    'pluginOptions' => [
                        'autoclose'=>true,
                    ]

                ]), */

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
                'label' => 'Количество дней',
                //'format' => 'datetime',
                'value' => function($data){

                    $datetime1 = new DateTime(date('Y-m-d',$data->date_otpr));
                    $datetime2 = new DateTime(date('Y-m-d',$data->date_pr1));
                    $interval = $datetime1->diff($datetime2);
                    $interval =$interval->format('%R%a');
                    $interval =$interval+1;
                    return $interval;



                },
            ],

            [
                'attribute'=>'daily',
                'format' => ['decimal', 2],

            ],


            [
                'label' => 'Командировочные',
                'format' => ['decimal', 2],

                'value' => function($data) {



                    $datetime1 = new DateTime(date('Y-m-d', $data->date_otpr));
                    $datetime2 = new DateTime(date('Y-m-d', $data->date_pr1));
                    $interval = $datetime1->diff($datetime2);
                    $interval = $interval->format('%R%a');
                    $interval = ($interval + 1)*($data->daily);
                    return $interval;
                }
            ],

            [
                'attribute'=>'cena_pr',
                'label' => 'Стоимость проезда',
                'format' => ['decimal', 2],

            ],

            [
                'attribute'=>'event',
                'format' => ['decimal', 2],

            ],
            [
                'attribute'=>'taxi',
                'format' => ['decimal', 2],

            ],
            [
                'attribute'=>'predstav',
                'format' => ['decimal', 2],

            ],


            [
                'label' => 'Всего ',
                'format' => ['decimal', 2],

                'value' => function($data) {



                    $datetime1 = new DateTime(date('Y-m-d', $data->date_otpr));
                    $datetime2 = new DateTime(date('Y-m-d', $data->date_pr1));
                    $interval = $datetime1->diff($datetime2);
                    $interval = $interval->format('%R%a');
                    $interval = ($interval + 1)*($data->daily);
                    $interval = $interval+$data->event+$data->taxi+$data->predstav+$data->cena_pr;

                    return $interval;
                }
            ],



            // 'budzhet',
            // 'zhurnal',
            // 'note',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],






    ];?>







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
