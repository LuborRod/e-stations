<?php


namespace app\modules\api\controllers\base;


class BaseController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function init()
    {
        parent::init();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }
}