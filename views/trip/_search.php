<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TripSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'iduserdata') ?>

    <?= $form->field($model, 'idclient') ?>

    <?= $form->field($model, 'idproject') ?>

    <?= $form->field($model, 'idusers') ?>

    <?php // echo $form->field($model, 'date_kup_bilet') ?>

    <?php // echo $form->field($model, 'date_otpr') ?>

    <?php // echo $form->field($model, 'date_pr') ?>

    <?php // echo $form->field($model, 'date_otpr1') ?>

    <?php // echo $form->field($model, 'date_pr1') ?>

    <?php // echo $form->field($model, 'status_trip') ?>

    <?php // echo $form->field($model, 'numbertrip') ?>

    <?php // echo $form->field($model, 'target') ?>

    <?php // echo $form->field($model, 'daily') ?>

    <?php // echo $form->field($model, 'vidtransport') ?>

    <?php // echo $form->field($model, 'cena_pr') ?>

    <?php // echo $form->field($model, 'event') ?>

    <?php // echo $form->field($model, 'taxi') ?>

    <?php // echo $form->field($model, 'predstav') ?>

    <?php // echo $form->field($model, 'budzhet') ?>

    <?php // echo $form->field($model, 'date_zvit') ?>

    <?php // echo $form->field($model, 'key') ?>

    <?php // echo $form->field($model, 'zhurnal') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
