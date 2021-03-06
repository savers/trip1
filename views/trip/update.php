<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Trip */


$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php

 $date_zvit_us1 ='';
    if(isset($model->date_zvit_us)) {

        $date_zvit_us1 = $model->date_zvit_us = date('Y-m-d H:i', $model->date_zvit_us);

    }



    if(isset($model->date_zvit)) {

  echo      $this->render('_form', [
            'model' => $model,
            $model->date_kup_bilet = date('Y-m-d H:i', $model->date_kup_bilet),
            $model->date_otpr = date('Y-m-d H:i', $model->date_otpr),
            $model->date_otpr1 = date('Y-m-d H:i', $model->date_otpr1),
            $model->date_pr = date('Y-m-d H:i', $model->date_pr),
            $model->date_pr1 = date('Y-m-d H:i', $model->date_pr1),
            $model->date_zvit = date('Y-m-d H:i', $model->date_zvit),
            'userdata' => $userdata,
            'direction' => $direction,
            'project' => $project,
            'prikaz' => $prikaz,
            $model->date_zvit = $date_zvit_us1,

        ]);

    }
    else
    {
        echo         $this->render('_form', [
            'model' => $model,
            $model->date_kup_bilet = date('Y-m-d H:i', $model->date_kup_bilet),
            $model->date_otpr = date('Y-m-d H:i', $model->date_otpr),
            $model->date_otpr1 = date('Y-m-d H:i', $model->date_otpr1),
            $model->date_pr = date('Y-m-d H:i', $model->date_pr),
            $model->date_pr1 = date('Y-m-d H:i', $model->date_pr1),

            'userdata' => $userdata,
            'direction' => $direction,
            'project' => $project,
            'prikaz' => $prikaz,
            $model->date_zvit = $date_zvit_us1,
        ]);


    }


    ?>

</div>
