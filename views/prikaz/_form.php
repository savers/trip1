<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Prikaz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prikaz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomberprikaz')->textInput(['maxlength' => true]) ?>


    <?=  $form->field($model, 'dateprikaz')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату и время ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?><br>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
