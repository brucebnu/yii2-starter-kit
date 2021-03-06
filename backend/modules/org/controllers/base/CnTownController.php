<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\controllers\base;

use backend\modules\org\models\CnTown;
    use backend\modules\org\models\search\CnTownSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
* CnTownController implements the CRUD actions for CnTown model.
*/
class CnTownController extends \backend\controllers\Controller
{


/**
* @var boolean whether to enable CSRF validation for the actions in this controller.
* CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
*/
public $enableCsrfValidation = false;


/**
* Lists all CnTown models.
* @return mixed
*/
public function actionIndex()
{
            $searchModel  = new CnTownSearch;
        $dataProvider = $searchModel->search($_GET);
    
    Tabs::clearLocalStorage();

    Url::remember();
    \Yii::$app->session['__crudReturnUrl'] = null;

    return $this->render('index', [
    'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
}

/**
* Displays a single CnTown model.
* @param integer $town_id
*
* @return mixed
*/
public function actionView($town_id)
{
    \Yii::$app->session['__crudReturnUrl'] = Url::previous();
    Url::remember();
    Tabs::rememberActiveState();

    return $this->render('view', [
    'model' => $this->findModel($town_id),
    ]);
}

/**
* Creates a new CnTown model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate()
{
    $model = new CnTown;

    try {
    if ($model->load($_POST) && $model->save()) {
    return $this->redirect(['view', 'town_id' => $model->town_id]);
    } elseif (!\Yii::$app->request->isPost) {
    $model->load($_GET);
    }
    } catch (\Exception $e) {
    $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
    $model->addError('_exception', $msg);
    }
    return $this->render('create', ['model' => $model]);
    }

    /**
    * Updates an existing CnTown model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $town_id
    * @return mixed
    */
    public function actionUpdate($town_id)
    {
    $model = $this->findModel($town_id);

    if ($model->load($_POST) && $model->save()) {
    return $this->redirect(Url::previous());
    } else {
    return $this->render('update', [
    'model' => $model,
    ]);
    }
}

/**
* Deletes an existing CnTown model.
* If deletion is successful, the browser will be redirected to the 'index' page.
* @param integer $town_id
* @return mixed
*/
public function actionDelete($town_id)
{
    exit('sorry :(');
    try {
    $this->findModel($town_id)->delete();
    } catch (\Exception $e) {
    $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
    \Yii::$app->getSession()->addFlash('error', $msg);
    return $this->redirect(Url::previous());
    }

    // TODO: improve detection
    $isPivot = strstr('$town_id',',');
    if ($isPivot == true) {
    return $this->redirect(Url::previous());
    } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
    Url::remember(null);
    $url = \Yii::$app->session['__crudReturnUrl'];
    \Yii::$app->session['__crudReturnUrl'] = null;

    return $this->redirect($url);
    } else {
    return $this->redirect(['index']);
    }
}

/**
* Finds the CnTown model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $town_id
* @return CnTown the loaded model
* @throws HttpException if the model cannot be found
*/
protected function findModel($town_id)
{
        if (($model = CnTown::findOne($town_id)) !== null) {
    return $model;
    } else {
    throw new HttpException(404, 'The requested page does not exist.');
    }
}

}
