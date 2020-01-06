<?php

namespace backend\modules\org\controllers\api;

/**
* This is the class for REST controller "PurchaseInfoController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PurchaseInfoController extends \yii\rest\ActiveController
{
public $modelClass = '\backend\modules\org\models\PurchaseInfo';
}
