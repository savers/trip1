<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prikaz */


$this->params['breadcrumbs'][] = ['label' => 'Prikazs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prikaz-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        $model->dateprikaz = date('Y-m-d H:i', $model->dateprikaz),
    ]) ?>

</div>
