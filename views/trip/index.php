<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Trip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'iduserdata',
            'idclient',
            'idproject',
            'idusers',
            'date_kup_bilet:datetime',
            // 'date_otpr',
            // 'date_pr',
            // 'date_otpr1',
            // 'date_pr1',
            // 'status_trip',
            // 'numbertrip',
            // 'target',
            // 'daily',
            // 'vidtransport',
            // 'cena_pr',
            // 'event',
            // 'taxi',
            // 'predstav',
            // 'budzhet',
            // 'date_zvit',
            // 'key',
            // 'zhurnal',
            // 'note',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
