<?php

namespace backend\modules\org\models;

use Yii;
use \backend\modules\org\models\base\OrderAmount as BaseOrderAmount;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order_amount".
 */
class OrderAmount extends BaseOrderAmount
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
