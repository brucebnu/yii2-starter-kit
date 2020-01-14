<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;

/**
 * This is the base-model class for table "dormitory".
 *
 * @property integer $dormitory_id
 * @property integer $org_id
 * @property string $dormitory_type
 * @property string $period_week
 * @property integer $started_at
 * @property integer $ended_at
 *
 * @property \backend\modules\org\models\Organization $org
 * @property \backend\modules\org\models\UserDormitory[] $userDormitories
 * @property string $aliasModel
 */
abstract class Dormitory extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
    const DORMITORY_TYPE_1_P = '1-P';
    const DORMITORY_TYPE_1_A = '1-A';
    const DORMITORY_TYPE_1_B = '1-B';
    const DORMITORY_TYPE_2_A = '2-A';
    const DORMITORY_TYPE_3_A = '3-A';
    var $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dormitory';
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
            [['org_id', 'dormitory_type', 'period_week', 'started_at', 'ended_at'], 'required'],
            [['org_id', 'started_at', 'ended_at'], 'integer'],
            [['dormitory_type'], 'string'],
            [['period_week'], 'string', 'max' => 255],
            [['org_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\Organization::className(), 'targetAttribute' => ['org_id' => 'org_id']],
            ['dormitory_type', 'in', 'range' => [
                    self::DORMITORY_TYPE_1_P,
                    self::DORMITORY_TYPE_1_A,
                    self::DORMITORY_TYPE_1_B,
                    self::DORMITORY_TYPE_2_A,
                    self::DORMITORY_TYPE_3_A,
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dormitory_id' => Yii::t('models', 'Dormitory ID'),
            'org_id' => Yii::t('models', 'Org ID'),
            'dormitory_type' => Yii::t('models', 'Dormitory Type'),
            'period_week' => Yii::t('models', 'Period Week'),
            'started_at' => Yii::t('models', 'Started At'),
            'ended_at' => Yii::t('models', 'Ended At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'org_id' => Yii::t('models', '学校'),
            'dormitory_type' => Yii::t('models', '房型'),
            'period_week' => Yii::t('models', '周数'),
            'started_at' => Yii::t('models', '开始'),
            'ended_at' => Yii::t('models', '结束'),
        ]);
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
    public function getUserDormitories()
    {
        return $this->hasMany(\backend\modules\org\models\UserDormitory::className(), ['dormitory_id' => 'dormitory_id']);
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\org\models\query\DormitoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\DormitoryQuery(get_called_class());
    }


    /**
     * get column dormitory_type enum value label
     * @param string $value
     * @return string
     */
    public static function getDormitoryTypeValueLabel($value){
        $labels = self::optsDormitoryType();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column dormitory_type ENUM value labels
     * @return array
     */
    public static function optsDormitoryType()
    {
        return [
            self::DORMITORY_TYPE_1_P => Yii::t('models', '1 P'),
            self::DORMITORY_TYPE_1_A => Yii::t('models', '1 A'),
            self::DORMITORY_TYPE_1_B => Yii::t('models', '1 B'),
            self::DORMITORY_TYPE_2_A => Yii::t('models', '2 A'),
            self::DORMITORY_TYPE_3_A => Yii::t('models', '3 A'),
        ];
    }

}