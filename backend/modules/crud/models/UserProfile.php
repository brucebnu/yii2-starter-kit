<?php

namespace backend\modules\crud\models;

use Yii;
use \backend\modules\crud\models\base\UserProfile as BaseUserProfile;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_profile".
 */
class UserProfile extends BaseUserProfile
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
