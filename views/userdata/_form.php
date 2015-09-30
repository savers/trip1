<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\UserData */
/* @var $form yii\widgets\ActiveForm */
/* @var $depart app\models\Depart */
?>

<div class="user-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_depart')->dropDownList(
        ArrayHelper::map($depart, 'id', 'name_depart')
    ) ?>


    <?= $form->field($model, 'pib')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pasport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
