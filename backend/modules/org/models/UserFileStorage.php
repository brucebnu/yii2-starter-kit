<?php

namespace backend\modules\org\models;

use Yii;
use \backend\modules\org\models\base\UserFileStorage as BaseUserFileStorage;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_file_storage".
 */
class UserFileStorage extends BaseUserFileStorage
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
