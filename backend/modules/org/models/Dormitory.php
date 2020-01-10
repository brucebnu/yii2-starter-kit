<?php

namespace backend\modules\org\models;

use Yii;
use \backend\modules\org\models\base\Dormitory as BaseDormitory;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "dormitory".
 */
class Dormitory extends BaseDormitory
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
