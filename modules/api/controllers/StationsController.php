<?php

namespace app\modules\api\controllers;

use app\modules\api\controllers\base\BaseController;
use Yii;
use app\models\Stations;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StationsController implements the CRUD actions for Stations model.
 */
class StationsController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    /**
     * Lists all Stations models.
     * @return mixed
     */
    public function actionIndex()
    {
        return Stations::find()->all();
    }


    /**
     * Creates a new Stations model.
     * @return bool|array
     */
    public function actionCreate()
    {
        $model = new Stations();
        $request['Stations'] = Yii::$app->request->post();

        if ($model->load($request) && $model->save()) {
            return true;
        }

        return $model->getErrors();
    }

    /**
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return true;
        }

        return $model->getErrors();
    }

    /**
     * Deletes an existing Stations model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return true;
    }

    /**
     * Finds the Stations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Stations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Stations::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}