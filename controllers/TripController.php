<?php

namespace app\controllers;

use app\models\Direction;
use app\models\Project;
use app\models\Userdata;
use Yii;
use app\models\Trip;
use app\models\Prikaz;
use app\models\TripSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Client;
use yii\helpers\Json;


/**
 * TripController implements the CRUD actions for Trip model.
 */
class TripController extends BehaviorsController
{


    /**
     * Lists all Trip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $poisk1 = 0;
        $poisk2 = 0;

        $searchModel = new TripSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$poisk1,$poisk2);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trip model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionKomand($id)
    {
        $this->layout = false;
        return $this->render('komand', [
            'model' => $this->findModel($id),
        ]);

    }

    public function actionKomand1($id)
    {
        $this->layout = false;
        return $this->render('komand1', [
            'model' => $this->findModel($id),
        ]);

    }


    /**
     * Creates a new Trip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trip();

        $dat = new \DateTime();
        $sat = $dat->format('Y');
        $sat1 = $sat.'-01-01';
        $sat2 = $sat.'-12-31';
        $dat1 = \DateTime::createFromFormat('Y-m-d',$sat1)->format('U');
        $dat2 = \DateTime::createFromFormat('Y-m-d',$sat2)->format('U');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'userdata'=> Userdata::find()->where(['status' => 1])->orderBy('pib')->all(),
                'direction'=> Direction::find()->asArray()->orderBy('sity')->all(),
                'project'=> Project::find()->asArray()->orderBy('name_project')->all(),
               // 'prikaz'=> Prikaz::find()->asArray()->orderBy('nomberprikaz DESC')->all(),
                'prikaz'=> Prikaz::find()->where(['between','dateprikaz',$dat1,$dat2])->asArray()->orderBy('nomberprikaz DESC')->all(),
                'dat1' => $dat1,

            ]);
        }
    }





    /**
     * Updates an existing Trip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);





        if ($model->idusers == Yii::$app->user->id) {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'userdata' => Userdata::find()->all(),
                    'direction' => Direction::find()->asArray()->all(),
                    'project' => Project::find()->asArray()->all(),
                    'prikaz' => Prikaz::find()->asArray()->all(),

                ]);
            }
        }
        else
        {
            throw new NotFoundHttpException('РЕДАКТИРОВАТЬ МОЖЕТ ТОЛЬКО РЕГИСТРАТОР ДАННОЙ КОМАНДИРОВКИ');
        }
    }

    /**
     * Deletes an existing Trip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);

        if ($model->idusers == Yii::$app->user->id)
        {
            $this->findModel($id)->delete();



        }
        else
        {

            throw new NotFoundHttpException('УДАЛЯТЬ МОЖЕТ ТОЛЬКО РЕГИСТРАТОР ДАННОЙ КОМАНДИРОВКИ');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trip::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
