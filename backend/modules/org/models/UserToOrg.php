<?php

namespace backend\modules\org\models;

use Yii;
use \backend\modules\org\models\base\UserToOrg as BaseUserToOrg;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_to_org".
 */
class UserToOrg extends BaseUserToOrg
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
