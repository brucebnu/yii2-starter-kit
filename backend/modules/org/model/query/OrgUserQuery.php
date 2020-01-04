<?php

namespace backend\modules\org\model\query;

/**
 * This is the ActiveQuery class for [[\backend\modules\org\model\OrgUser]].
 *
 * @see \backend\modules\org\model\OrgUser
 */
class OrgUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \backend\modules\org\model\OrgUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \backend\modules\org\model\OrgUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
