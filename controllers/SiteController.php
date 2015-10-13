<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Users;


use app\models\Direction;
use app\models\Project;
use app\models\Userdata;
use app\models\Trip;
use app\models\TripSearch;
use yii\web\NotFoundHttpException;



class SiteController extends BehaviorsController
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()

    {


        $poisk1 = Yii::$app->request->post('from_date');
        $poisk2 = Yii::$app->request->post('to_date');





            $searchModel = new TripSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$poisk1,$poisk2);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,

            ]);








    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login(Yii::$app->request->post())) {
            return $this->goHome();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['/site/index']);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
