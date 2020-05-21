<?php

namespace app\modules\api;

use yii\web\Response;
use yii\web\User;

class Module extends \yii\base\Module
{
    public $layout = false;

    public function init()
    {
        parent::init();
        $this->setBasePath(__DIR__);

        if (!\Yii::$app->request->getIsConsoleRequest()) {
            \Yii::$app->response->headers->set('content-type', 'text/plain');
            \Yii::$app->response->format = Response::FORMAT_RAW;
        }
    }
}
