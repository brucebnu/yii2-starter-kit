<?php

namespace backend\modules\org\models\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\org\models\UserExpress]].
 *
 * @see \backend\modules\org\models\UserExpress
 */
class UserExpressQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\modules\org\models\UserExpress[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\modules\org\models\UserExpress|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
