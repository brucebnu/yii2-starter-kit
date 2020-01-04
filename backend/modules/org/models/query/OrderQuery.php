<?php

namespace backend\modules\org\models\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\org\models\Order]].
 *
 * @see \backend\modules\org\models\Order
 */
class OrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\modules\org\models\Order[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\modules\org\models\Order|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
