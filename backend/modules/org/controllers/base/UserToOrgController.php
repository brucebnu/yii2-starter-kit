<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\controllers\base;

use backend\modules\org\models\UserToOrg;
    use backend\modules\org\models\search\UserToOrgSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use yii\filters\AccessControl;
use dmstr\bootstrap\Tabs;

/**
* UserToOrgController implements the CRUD actions for UserToOrg model.
*/
class UserToOrgController extends \backend\controllers\Controller
{


/**
* @var boolean whether to enable CSRF validation for the actions in this controller.
* CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
*/
public $enableCsrfValidation = false;


/**
* Lists all UserToOrg models.
* @return mixed
*/
public function actionIndex()
{
            $searchModel  = new UserToOrgSearch;
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
* Displays a single UserToOrg model.
* @param integer $user_to_ort_id
*
* @return mixed
*/
public function actionView($user_to_ort_id)
{
    \Yii::$app->session['__crudReturnUrl'] = Url::previous();
    Url::remember();
    Tabs::rememberActiveState();

    return $this->render('view', [
    'model' => $this->findModel($user_to_ort_id),
    ]);
}

/**
* Creates a new UserToOrg model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate()
{
    $model = new UserToOrg;

    try {
    if ($model->load($_POST) && $model->save()) {
    return $this->redirect(['view', 'user_to_ort_id' => $model->user_to_ort_id]);
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
    * Updates an existing UserToOrg model.
    * If update is successful, the browser will be redirected to the 'view' page.
    * @param integer $user_to_ort_id
    * @return mixed
    */
    public function actionUpdate($user_to_ort_id)
    {
    $model = $this->findModel($user_to_ort_id);

    if ($model->load($_POST) && $model->save()) {
    return $this->redirect(Url::previous());
    } else {
    return $this->render('update', [
    'model' => $model,
    ]);
    }
}

/**
* Deletes an existing UserToOrg model.
* If deletion is successful, the browser will be redirected to the 'index' page.
* @param integer $user_to_ort_id
* @return mixed
*/
public function actionDelete($user_to_ort_id)
{
    exit('sorry :(');
    try {
    $this->findModel($user_to_ort_id)->delete();
    } catch (\Exception $e) {
    $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
    \Yii::$app->getSession()->addFlash('error', $msg);
    return $this->redirect(Url::previous());
    }

    // TODO: improve detection
    $isPivot = strstr('$user_to_ort_id',',');
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
* Finds the UserToOrg model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param integer $user_to_ort_id
* @return UserToOrg the loaded model
* @throws HttpException if the model cannot be found
*/
protected function findModel($user_to_ort_id)
{
        if (($model = UserToOrg::findOne($user_to_ort_id)) !== null) {
    return $model;
    } else {
    throw new HttpException(404, 'The requested page does not exist.');
    }
}

}
