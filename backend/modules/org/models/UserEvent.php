<?php

namespace backend\modules\org\models;

use Yii;
use \backend\modules\org\models\base\UserEvent as BaseUserEvent;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_event".
 */
class UserEvent extends BaseUserEvent
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
