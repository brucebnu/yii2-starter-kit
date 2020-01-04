<?php

namespace backend\modules\org\model;

use Yii;
use \backend\modules\org\model\base\OrgUser as BaseOrgUser;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "org_user".
 */
class OrgUser extends BaseOrgUser
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
