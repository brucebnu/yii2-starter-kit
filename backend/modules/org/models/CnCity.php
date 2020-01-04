<?php

namespace backend\modules\org\models;

use Yii;
use \backend\modules\org\models\base\CnCity as BaseCnCity;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cn_city".
 */
class CnCity extends BaseCnCity
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
