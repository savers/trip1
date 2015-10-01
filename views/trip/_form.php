<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Trip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iduserdata')->textInput() ?>

    <?= $form->field($model, 'idclient')->textInput() ?>

    <?= $form->field($model, 'idproject')->textInput() ?>


    <?=  $form->field($model, 'date_kup_bilet')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?><br>


    <?=  $form->field($model, 'date_otpr')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?><br>


    <?=  $form->field($model, 'date_pr')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?><br>

    <?=  $form->field($model, 'date_otpr1')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?><br>


    <?=  $form->field($model, 'date_pr1')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?><br>









    <?= $form->field($model, 'status_trip')->textInput() ?>

    <?= $form->field($model, 'numbertrip')->textInput() ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'daily')->textInput() ?>

    <?= $form->field($model, 'vidtransport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cena_pr')->textInput() ?>

    <?= $form->field($model, 'event')->textInput() ?>

    <?= $form->field($model, 'taxi')->textInput() ?>

    <?= $form->field($model, 'predstav')->textInput() ?>

    <?= $form->field($model, 'budzhet')->textInput() ?>

    <?=  $form->field($model, 'date_zvit')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?><br>

    <?= $form->field($model, 'key')->textInput() ?>

    <?= $form->field($model, 'zhurnal')->textInput() ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
