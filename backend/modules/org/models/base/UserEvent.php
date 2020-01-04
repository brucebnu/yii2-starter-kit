<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;

/**
 * This is the base-model class for table "user_event".
 *
 * @property integer $event_id
 * @property string $aliasModel
 */
abstract class UserEvent extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => Yii::t('models', 'Event ID'),
        ];
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\org\models\query\UserEventQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\UserEventQuery(get_called_class());
    }


}
