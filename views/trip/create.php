<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model app\models\Trip */


$sql = 'SELECT numbertrip FROM trip ORDER BY numbertrip DESC limit 1 ';
$result = Yii::$app->db->createCommand($sql)->queryOne();
$value = ArrayHelper::getValue($result, 'numbertrip');



$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'userdata' => $userdata,
        'direction' => $direction,
        'project'=>$project,
        'prikaz'=> $prikaz,
         $model->numbertrip = $value+1,
        $model->daily = 240,
        $model->cena_pr = 0.00,
        $model->event =0,
        $model->taxi =0,
        $model->predstav =0,


    ]);



    ?>

</div>
