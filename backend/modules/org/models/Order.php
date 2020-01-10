<?php

namespace backend\modules\org\models;

use Yii;
use \backend\modules\org\models\base\Order as BaseOrder;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order".
 */
class Order extends BaseOrder
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
