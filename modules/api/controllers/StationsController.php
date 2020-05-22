<?php

namespace app\modules\api\controllers;

use app\modules\api\controllers\base\BaseController;
use Yii;
use app\models\Stations;
use yii\db\ActiveRecord;
use yii\web\BadRequestHttpException;
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
     * @return Stations|array
     */
    public function actionCreate()
    {
        $station = new Stations();
        $request['Stations'] = Yii::$app->request->post();

        if ($station->load($request) && $station->save()) {
            return $station;
        }

        return $station->getErrors();
    }

    /**
     * @return Stations|array
     * @throws NotFoundHttpException if the model cannot be found
     * @throws BadRequestHttpException
     */
    public function actionUpdate()
    {
        if(!$id = Yii::$app->request->post('id')) {
            throw new BadRequestHttpException("You have to set 'id' of station for update");
        };
        $request['Stations'] = Yii::$app->request->post();

        $station = $this->findModel($id);

        if ($station->load($request) && $station->save()) {
            return $station;
        }

        return $station->getErrors();
    }

    /**
     * Deletes an existing Stations model.
     * @return bool
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->post('id');
        $this->findModel($id)->delete();

        return true;
    }


    /**
     * @return array|ActiveRecord[]
     */
    public function actionGetStationsByCity()
    {
        $city = Yii::$app->request->post('city');

        return Stations::getStationsByCity($city);
    }

    /**
     * @return array|ActiveRecord[]
     */
    public function actionGetStationsByCityWhichCurrentlyOpen()
    {
        $city = Yii::$app->request->post('city');

        return Stations::getStationsByCityWhichCurrentlyOpen($city);
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
