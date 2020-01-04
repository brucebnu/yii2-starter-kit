<?php

namespace backend\modules\org\models;

use Yii;
use \backend\modules\org\models\base\Organization as BaseOrganization;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "organization".
 */
class Organization extends BaseOrganization
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
