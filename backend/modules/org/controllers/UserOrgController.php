<?php

namespace backend\modules\org\controllers;

use backend\modules\org\models\UserOrg;

/**
* This is the class for controller "UserOrgController".
*/
class UserOrgController extends \backend\modules\org\controllers\base\UserOrgController
{

    public function actionRegister($user_id)
    {
        //dd($this->layout);
        $model = UserOrg::find($user_id)->one();

        //dd($model, empty($model));
        if(empty($model)){
            $model = new UserOrg;
            $model->save(false);
        }

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            return $this->render('register', [
                'model' => $model,
            ]);
        }

    }





}
