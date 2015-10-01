<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \app\models\DirectionSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DirectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать направление', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

         'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

             'sity',

            ['class' => 'yii\grid\ActionColumn'],
        ],

        'showFooter' => true,

    ]); ?>

</div>
