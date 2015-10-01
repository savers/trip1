<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \app\models\Direction;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nameclient',

            [
                'attribute'=>'iddirection',
                'filter'=>ArrayHelper::map(Direction::find()->orderBy('sity')->asArray()->all(), 'id', 'sity'),
                'label'=>'Направление',

                'value'=> function($data)
                {
                    return $data->directions->sity;
                }
            ],



            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
