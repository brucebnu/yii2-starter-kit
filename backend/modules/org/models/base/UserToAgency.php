<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;

/**
 * This is the base-model class for table "user_to_agency".
 *
 * @property integer $user_to_agency
 * @property integer $user_id
 * @property string $agency_name
 * @property string $agency_contact
 *
 * @property \backend\modules\org\models\UserOrg $user
 * @property string $aliasModel
 */
abstract class UserToAgency extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_to_agency';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('org');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['agency_name', 'agency_contact'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\UserOrg::className(), 'targetAttribute' => ['user_id' => 'user_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_to_agency' => Yii::t('models', 'User To Agency'),
            'user_id' => Yii::t('models', 'User ID'),
            'agency_name' => Yii::t('models', 'Agency Name'),
            'agency_contact' => Yii::t('models', 'Agency Contact'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'user_id' => Yii::t('models', '代理'),
            'agency_name' => Yii::t('models', '代理名称'),
            'agency_contact' => Yii::t('models', '代理联系方式'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\backend\modules\org\models\UserOrg::className(), ['user_id' => 'user_id']);
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\org\models\query\UserToAgencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\UserToAgencyQuery(get_called_class());
    }


}
