<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrikazSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prikazs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prikaz-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать приказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nomberprikaz',
            'dateprikaz:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
