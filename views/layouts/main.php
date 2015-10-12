<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Командировки',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItem = [

        ['label' => '<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Главная', 'url' => ['/site/index'], 'encode' => false,],

    ];

  if (Yii::$app->user->isGuest):
    $menuItem[] =  ['label' => 'Регистрация', 'url' => ['/users/index']];
    $menuItem[] = ['label' => 'Войти', 'url' => ['/site/login']];

  else:
    $menuItem[] =
        ['label' => ' <span class="glyphicon glyphicon-book" aria-hidden="true"></span> Справочники','encode' => false,
            'items' => [
                ['label' => '<span class="glyphicon glyphicon-book" aria-hidden="true"></span> Департаменты', 'url' => ['/depart/index'],'encode' => false,],
                ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Сотрудкики', 'url' => ['/userdata/index'],'encode' => false,],
                ['label' => '<span class="glyphicon glyphicon-road" aria-hidden="true"></span> Направление', 'url' => ['/direction/index'],'encode' => false,],
                ['label' => '<span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span> Клиенты', 'url' => ['/client/index'],'encode' => false,],
                ['label' => '<span class="glyphicon glyphicon-file" aria-hidden="true"></span> Проекты', 'url' => ['/project/index'],'encode' => false,],
                ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Пользователи', 'url' => ['/users/index'],'encode' => false,],
                ['label' => '<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Приказы', 'url' => ['/prikaz/index'],'encode' => false,],
                ['label' => '<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Командировки', 'url' => ['/trip/index'],'encode' => false,],
            ],
        ];

    $menuItem[] = [
        'label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
       'linkOptions' => ['data-method' => 'post']
        ];
  endif;




    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItem,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Командировки <?= date('Y') ?></p>


    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
