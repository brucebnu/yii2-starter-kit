<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "user_dormitory".
 *
 * @property integer $user_dormitory_id
 * @property integer $org_id
 * @property integer $user_id
 * @property integer $dormitory_id
 * @property string $period_week
 * @property integer $started_at
 * @property integer $ended_at
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \backend\modules\org\models\Dormitory $dormitory
 * @property \backend\modules\org\models\Organization $org
 * @property \backend\modules\org\models\UserOrg $user
 * @property string $aliasModel
 */
abstract class UserDormitory extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_dormitory';
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
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_id', 'user_id', 'dormitory_id', 'period_week'], 'required'],
            [['org_id', 'user_id', 'dormitory_id', 'started_at', 'ended_at'], 'integer'],
            [['period_week'], 'string', 'max' => 255],
            [['dormitory_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\Dormitory::className(), 'targetAttribute' => ['dormitory_id' => 'dormitory_id']],
            [['org_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\Organization::className(), 'targetAttribute' => ['org_id' => 'org_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\UserOrg::className(), 'targetAttribute' => ['user_id' => 'user_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_dormitory_id' => Yii::t('models', 'User Dormitory ID'),
            'org_id' => Yii::t('models', 'Org ID'),
            'user_id' => Yii::t('models', 'User ID'),
            'dormitory_id' => Yii::t('models', 'Dormitory ID'),
            'period_week' => Yii::t('models', 'Period Week'),
            'started_at' => Yii::t('models', 'Started At'),
            'ended_at' => Yii::t('models', 'Ended At'),
            'created_at' => Yii::t('models', 'Created At'),
            'updated_at' => Yii::t('models', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'org_id' => Yii::t('models', '学校'),
            'user_id' => Yii::t('models', '用户'),
            'dormitory_id' => Yii::t('models', '宿舍'),
            'period_week' => Yii::t('models', '几周'),
            'started_at' => Yii::t('models', '开始'),
            'ended_at' => Yii::t('models', '结束'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDormitory()
    {
        return $this->hasOne(\backend\modules\org\models\Dormitory::className(), ['dormitory_id' => 'dormitory_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(\backend\modules\org\models\Organization::className(), ['org_id' => 'org_id']);
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
     * @return \backend\modules\org\models\query\UserDormitoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\UserDormitoryQuery(get_called_class());
    }


}
