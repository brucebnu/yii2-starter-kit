<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;

/**
 * This is the base-model class for table "user_flight".
 *
 * @property integer $user_org_flight_id
 * @property integer $user_id
 * @property integer $org_id
 * @property string $arrival_flight
 * @property string $arrival_datetime
 * @property string $departure_flight
 * @property string $departure_datetime
 * @property string $pickup_special_request
 * @property string $visa_expiry_date
 * @property string $travel_insurance
 * @property string $address
 *
 * @property \backend\modules\org\models\Organization $org
 * @property \backend\modules\org\models\UserOrg $user
 * @property string $aliasModel
 */
abstract class UserFlight extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
    const TRAVEL_INSURANCE_SELF = 'Self';
    const TRAVEL_INSURANCE_ENTRUST = 'Entrust';
    const TRAVEL_INSURANCE_NO = 'No';
    var $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_flight';
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
            [['user_org_flight_id'], 'required'],
            [['user_org_flight_id', 'user_id', 'org_id'], 'integer'],
            [['arrival_datetime', 'departure_datetime', 'visa_expiry_date'], 'safe'],
            [['pickup_special_request', 'travel_insurance'], 'string'],
            [['arrival_flight', 'departure_flight', 'address'], 'string', 'max' => 255],
            [['user_org_flight_id'], 'unique'],
            [['org_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\Organization::className(), 'targetAttribute' => ['org_id' => 'org_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\UserOrg::className(), 'targetAttribute' => ['user_id' => 'user_id']],
            ['travel_insurance', 'in', 'range' => [
                    self::TRAVEL_INSURANCE_SELF,
                    self::TRAVEL_INSURANCE_ENTRUST,
                    self::TRAVEL_INSURANCE_NO,
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
            'user_org_flight_id' => Yii::t('models', 'User Org Flight ID'),
            'user_id' => Yii::t('models', 'User ID'),
            'org_id' => Yii::t('models', 'Org ID'),
            'arrival_flight' => Yii::t('models', 'Arrival Flight'),
            'arrival_datetime' => Yii::t('models', 'Arrival Datetime'),
            'departure_flight' => Yii::t('models', 'Departure Flight'),
            'departure_datetime' => Yii::t('models', 'Departure Datetime'),
            'pickup_special_request' => Yii::t('models', 'Pickup Special Request'),
            'visa_expiry_date' => Yii::t('models', 'Visa Expiry Date'),
            'travel_insurance' => Yii::t('models', 'Travel Insurance'),
            'address' => Yii::t('models', 'Address'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'user_id' => Yii::t('models', '用户'),
            'org_id' => Yii::t('models', '组织ID'),
            'arrival_flight' => Yii::t('models', '到达航班'),
            'arrival_datetime' => Yii::t('models', '到达时间'),
            'departure_flight' => Yii::t('models', '离境航班'),
            'departure_datetime' => Yii::t('models', '离境时间'),
            'pickup_special_request' => Yii::t('models', '接机备注'),
            'visa_expiry_date' => Yii::t('models', '签证到期'),
            'travel_insurance' => Yii::t('models', '旅游保险'),
            'address' => Yii::t('models', '英文地址'),
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
    public function getUser()
    {
        return $this->hasOne(\backend\modules\org\models\UserOrg::className(), ['user_id' => 'user_id']);
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\org\models\query\UserFlightQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\UserFlightQuery(get_called_class());
    }


    /**
     * get column travel_insurance enum value label
     * @param string $value
     * @return string
     */
    public static function getTravelInsuranceValueLabel($value){
        $labels = self::optsTravelInsurance();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column travel_insurance ENUM value labels
     * @return array
     */
    public static function optsTravelInsurance()
    {
        return [
            self::TRAVEL_INSURANCE_SELF => Yii::t('models', 'Self'),
            self::TRAVEL_INSURANCE_ENTRUST => Yii::t('models', 'Entrust'),
            self::TRAVEL_INSURANCE_NO => Yii::t('models', 'No'),
        ];
    }

}