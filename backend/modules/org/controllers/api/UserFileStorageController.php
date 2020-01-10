<?php

namespace backend\modules\org\controllers\api;

/**
* This is the class for REST controller "UserFileStorageController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class UserFileStorageController extends \yii\rest\ActiveController
{
public $modelClass = '\backend\modules\org\models\UserFileStorage';
}
