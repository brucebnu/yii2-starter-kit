<?php

namespace backend\modules\org\controllers;

use yii\web\Controller;

class DefaultController extends \backend\controllers\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
