<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Trip */


$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


<?php

$datetime1 = new DateTime(date('Y-m-d', $model->date_otpr));
$datetime2 = new DateTime(date('Y-m-d', $model->date_pr1));
$interval = $datetime1->diff($datetime2);
$interval = $interval->format('%R%a');
$interval = ($interval + 1)*($model->daily);
$interval = $interval+$model->event+$model->taxi+$model->predstav+$model->cena_pr+$model->stoimost_pr;
$interval = number_format($interval, 2, ',', ' ');

?>




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'iduserdata',
                'value' => $model->userdata1->pib
            ],
            [
                'attribute'=>'idclient',
                'value' => $model->client1->nameclient
            ],
            [
                'attribute'=>'idproject',
                'value' => $model->project1->name_project
            ],
            [
                'attribute'=>'idusers',
                'value' => $model->users1->username
            ],

            'date_kup_bilet:datetime',
            'date_otpr:datetime',
            'date_pr:datetime',
            'date_otpr1:datetime',
            'date_pr1:datetime',

            [
                'attribute'=>'status_trip',
                'value' => $model->status_trip == 1 ? 'Официальная' : 'Неофициальная'

            ],

            'numbertrip',
            'target',

            [
                'attribute'=>'daily',
                'format' => ['decimal', 2],

            ],
            'vidtransport',
            [
                'attribute'=>'cena_pr',
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
                'attribute'=>'stoimost_pr',
                'format' => ['decimal', 2],

            ],
            [
                'attribute'=>'predstav',
                'format' => ['decimal', 2],

            ],


            [
                'attribute'=>'budzhet',
                'value' => $model->budzhet == 1 ? 'Относится' : 'Неотносится'

            ],

            'date_zvit:datetime',
            'date_zvit_us:datetime',

            [
                'attribute'=>'key',
                'value' => $model->key == 1 ? 'Нужен' : 'Ненужен'

            ],
            [
                'attribute'=>'zhurnal',
                'value' => $model->zhurnal == 1 ? 'Внесено' : 'Невнесено'

            ],

            [
                'attribute'=>'idpr',
                'value' => $model->prikaz1->nomberprikaz
            ],



            'note',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'label'=>'<font color="red">Всего</font>',
                'format' => 'raw',

                'value' => '<b><font color="red">'.$interval.'</font></b>' ,

            ],
        ],
    ]) ?>

</div>
