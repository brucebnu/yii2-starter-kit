<?php

namespace backend\controllers;

use Yii;
use backend\models\search\TimelineEventSearch;

/**
 * Application timeline controller
 */
class TimelineEventController extends \backend\controllers\Controller
{
    public $layout = '@backend/themes/adminlte3/layout/master.php';

    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TimelineEventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = [
            'defaultOrder' => ['created_at' => SORT_DESC]
        ];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
