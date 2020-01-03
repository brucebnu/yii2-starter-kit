<?php

namespace backend\modules\org;

use dmstr\web\traits\AccessBehaviorTrait;

class Module extends \yii\base\Module
{
    //use AccessBehaviorTrait;

    public $controllerNamespace = 'backend\modules\org\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
