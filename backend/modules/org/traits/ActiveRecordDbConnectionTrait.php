<?php

namespace backend\modules\org\traits;

trait ActiveRecordDbConnectionTrait
{
    public static function getDb()
    {
        return \Yii::$app->org;
    }
}
