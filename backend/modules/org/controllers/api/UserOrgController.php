<?php

namespace backend\modules\org\controllers\api;

/**
* This is the class for REST controller "UserOrgController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class UserOrgController extends \yii\rest\ActiveController
{
public $modelClass = '\backend\modules\org\models\UserOrg';
}
