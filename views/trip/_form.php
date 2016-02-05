<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use app\models\Direction;
use yii\helpers\Url;
use app\models\Client;

/* @var $this yii\web\View */
/* @var $model app\models\Trip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iduserdata')->dropDownList(
        ArrayHelper::map($userdata, 'id', 'pib'),
        ['prompt'=>'Выберите сотрудника']
    ) ?>

     <?= $form->field($model, 'test')->dropDownList(

         ArrayHelper::map($direction, 'id', 'sity'),
         [
             'prompt'=>'Выберите направление',
             'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('client/lists?id=').'"+$(this).val(), function( data ) {
                  $( "select#trip-idclient" ).html( data );
                });
            ']);

     ?>

    <?= $form->field($model, 'idclient')->dropDownList(

        ['prompt'=>'Выберите организацию']
    );

    ?>

    <?= $form->field($model, 'idproject')->dropDownList(
        ArrayHelper::map($project, 'id', 'name_project'),
        ['prompt'=>'Выберите проект']
    ) ?>




    <?=  $form->field($model, 'date_kup_bilet')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату и время ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'weekStart'=>1
        ]
    ]);
    ?><br>


    <?=  $form->field($model, 'date_otpr')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату и время ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'weekStart'=>1
        ]
    ]);
    ?><br>


    <?=  $form->field($model, 'date_pr')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату и время ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'weekStart'=>1
        ]
    ]);
    ?><br>

    <?=  $form->field($model, 'date_otpr1')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату и время ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'weekStart'=>1
        ]
    ]);
    ?><br>


    <?=  $form->field($model, 'date_pr1')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату и время ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'weekStart'=>1
        ]
    ]);
    ?><br>




    <?= $form->field($model, 'status_trip')->dropDownList(
        [
            '1' => 'Официальная',
            '0' => 'Неофициальная',

        ]
    ) ?>




    <?= $form->field($model, 'numbertrip')->textInput() ?>



    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'daily')->textInput() ?>

    <?= $form->field($model, 'vidtransport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cena_pr')->textInput() ?>


    <?= $form->field($model, 'event')->textInput() ?>

    <?= $form->field($model, 'taxi')->textInput() ?>

    <?= $form->field($model, 'stoimost_pr')->textInput() ?>

    <?= $form->field($model, 'predstav')->textInput() ?>


    <?= $form->field($model, 'budzhet')->dropDownList(
        [
            '1' => 'Относится',
            '0' => 'Не относится',

        ]
    ) ?>


    <?=  $form->field($model, 'date_zvit')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату и время ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'weekStart'=>1
        ]
    ]);
    ?><br>


    <?=  $form->field($model, 'date_zvit_us')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберите дату и время ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'weekStart'=>1
        ]
    ]);
    ?><br>


    <?= $form->field($model, 'key')->dropDownList(
        [
            '0' => 'Не нужен',
            '1' => 'Нужен',

        ]
    ) ?>

    <?= $form->field($model, 'zhurnal')->dropDownList(
        [
            '1' => 'Внесено',
            '0' => 'Не Внесено',

        ]
    ) ?>


    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idpr')->dropDownList(
        ArrayHelper::map($prikaz, 'id', 'nomberprikaz'),
        ['prompt'=>'Выберите приказ']
    ) ?>


    <?= $form->field($model, 'idotpr')->dropDownList(
        ArrayHelper::map($direction, 'id', 'sity'),
        ['prompt'=>'Выберите город отправления']
    ) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
