<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model app\models\Trip */

$dat = new \DateTime();
$sat = $dat->format('Y');



$sql = "SELECT numbertrip FROM trip where dt = '$sat' ORDER BY  numbertrip DESC limit 1 ";
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
        'dat1' => $dat1,
         $model->numbertrip = $value+1,
        $model->daily = 240,
        $model->cena_pr = 0.00,
        $model->event =0,
        $model->taxi =0,
        $model->predstav =0,
        $model->stoimost_pr =0,


    ]);



    ?>

</div>
