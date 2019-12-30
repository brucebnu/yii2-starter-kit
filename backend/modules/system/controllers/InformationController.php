<?php
/**
 * Author: Eugine Terentev <eugine@terentev.net>
 */

namespace backend\modules\system\controllers;


use Yii;
use yii\web\Response;
use Probe\ProviderFactory;

class InformationController extends \backend\controllers\Controller
{

    //public $layout = '@backend/views/layouts/common';

    public function actionIndex()
    {
        $provider = ProviderFactory::create();
        if ($provider) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                if ($key = Yii::$app->request->get('data')) {
                    switch ($key) {
                        case 'cpu_usage':
                            return $provider->getCpuUsage();
                            break;
                        case 'memory_usage':
                            if($provider->getTotalMem()){
                                return ($provider->getTotalMem() - $provider->getFreeMem()) / $provider->getTotalMem();
                            }else{
                                return 0;
                            }

                            break;
                    }
                }
            } else {
                return $this->render('index', ['provider' => $provider]);
            }
        }

        return $this->render('fail');
    }
}
