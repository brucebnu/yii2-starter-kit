<?php
/**
 * /Users/brucebnu/Programming/backend/github/yii2-starter-kit/console/runtime/giiant/f197ab8e55d1e29a2dea883e84983544
 *
 * @package default
 */


namespace backend\modules\crud\controllers\api;

/**
 * This is the class for REST controller "UserProfileController".
 */
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class UserProfileController extends \yii\rest\ActiveController
{
	public $modelClass = '\backend\modules\crud\models\UserProfile';
}
