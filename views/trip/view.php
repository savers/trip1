<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trip */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'iduserdata',
            'idclient',
            'idproject',
            'idusers',
            'date_kup_bilet',
            'date_otpr',
            'date_pr',
            'date_otpr1',
            'date_pr1',
            'status_trip',
            'numbertrip',
            'target',
            'daily',
            'vidtransport',
            'cena_pr',
            'event',
            'taxi',
            'predstav',
            'budzhet',
            'date_zvit',
            'key',
            'zhurnal',
            'note',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
