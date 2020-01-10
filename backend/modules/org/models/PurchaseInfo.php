<?php

namespace backend\modules\org\models;

use Yii;
use \backend\modules\org\models\base\PurchaseInfo as BasePurchaseInfo;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "purchase_info".
 */
class PurchaseInfo extends BasePurchaseInfo
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
