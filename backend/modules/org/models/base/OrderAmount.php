<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "order_amount".
 *
 * @property integer $amount_id
 * @property integer $order_id
 * @property string $transaction_price
 * @property string $currency_type
 * @property string $amount_type
 * @property string $payment_type
 * @property string $pay_order_src
 * @property integer $update_at
 * @property integer $update_by
 * @property integer $created_at
 * @property integer $created_by
 *
 * @property \backend\modules\org\models\Order $order
 * @property string $aliasModel
 */
abstract class OrderAmount extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
    const CURRENCY_TYPE_RMB = 'RMB';
    const CURRENCY_TYPE_USD = 'USD';
    const CURRENCY_TYPE_PHP = 'PHP';
    const CURRENCY_TYPE_JPY = 'JPY';
    const CURRENCY_TYPE_HKD = 'HKD';
    const AMOUNT_TYPE_TUITION = 'tuition';
    const AMOUNT_TYPE_VISA = 'visa';
    const AMOUNT_TYPE_INSURANCE = 'insurance';
    const AMOUNT_TYPE_SSP = 'SSP';
    const PAYMENT_TYPE_WECHAT = 'Wechat';
    const PAYMENT_TYPE_ALIPAY = 'Alipay';
    const PAYMENT_TYPE_TRANSFER = 'Transfer';
    const PAYMENT_TYPE_CASH = 'Cash';
    var $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_amount';
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
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
            ],
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'update_at', 'update_by'], 'integer'],
            [['transaction_price', 'payment_type', 'pay_order_src', 'update_at', 'update_by'], 'required'],
            [['transaction_price'], 'number'],
            [['currency_type', 'amount_type', 'payment_type'], 'string'],
            [['pay_order_src'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\Order::className(), 'targetAttribute' => ['order_id' => 'order_id']],
            ['currency_type', 'in', 'range' => [
                    self::CURRENCY_TYPE_RMB,
                    self::CURRENCY_TYPE_USD,
                    self::CURRENCY_TYPE_PHP,
                    self::CURRENCY_TYPE_JPY,
                    self::CURRENCY_TYPE_HKD,
                ]
            ],
            ['amount_type', 'in', 'range' => [
                    self::AMOUNT_TYPE_TUITION,
                    self::AMOUNT_TYPE_VISA,
                    self::AMOUNT_TYPE_INSURANCE,
                    self::AMOUNT_TYPE_SSP,
                ]
            ],
            ['payment_type', 'in', 'range' => [
                    self::PAYMENT_TYPE_WECHAT,
                    self::PAYMENT_TYPE_ALIPAY,
                    self::PAYMENT_TYPE_TRANSFER,
                    self::PAYMENT_TYPE_CASH,
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
            'amount_id' => Yii::t('models', 'Amount ID'),
            'order_id' => Yii::t('models', 'Order ID'),
            'transaction_price' => Yii::t('models', 'Transaction Price'),
            'currency_type' => Yii::t('models', 'Currency Type'),
            'amount_type' => Yii::t('models', 'Amount Type'),
            'payment_type' => Yii::t('models', 'Payment Type'),
            'pay_order_src' => Yii::t('models', 'Pay Order Src'),
            'created_at' => Yii::t('models', 'Created At'),
            'update_at' => Yii::t('models', 'Update At'),
            'created_by' => Yii::t('models', 'Created By'),
            'update_by' => Yii::t('models', 'Update By'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'amount_id' => Yii::t('models', '交易ID'),
            'order_id' => Yii::t('models', '订单ID'),
            'transaction_price' => Yii::t('models', '成交金额'),
            'currency_type' => Yii::t('models', '货币类型'),
            'amount_type' => Yii::t('models', '费用类型'),
            'payment_type' => Yii::t('models', '支付方法'),
            'pay_order_src' => Yii::t('models', '支付凭证'),
            'created_at' => Yii::t('models', '创建时间'),
            'update_at' => Yii::t('models', '更新时间'),
            'created_by' => Yii::t('models', '创建者'),
            'update_by' => Yii::t('models', '更新者'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\backend\modules\org\models\Order::className(), ['order_id' => 'order_id']);
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\org\models\query\OrderAmountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\OrderAmountQuery(get_called_class());
    }


    /**
     * get column currency_type enum value label
     * @param string $value
     * @return string
     */
    public static function getCurrencyTypeValueLabel($value){
        $labels = self::optsCurrencyType();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column currency_type ENUM value labels
     * @return array
     */
    public static function optsCurrencyType()
    {
        return [
            self::CURRENCY_TYPE_RMB => Yii::t('models', 'Rmb'),
            self::CURRENCY_TYPE_USD => Yii::t('models', 'Usd'),
            self::CURRENCY_TYPE_PHP => Yii::t('models', 'Php'),
            self::CURRENCY_TYPE_JPY => Yii::t('models', 'Jpy'),
            self::CURRENCY_TYPE_HKD => Yii::t('models', 'Hkd'),
        ];
    }

    /**
     * get column amount_type enum value label
     * @param string $value
     * @return string
     */
    public static function getAmountTypeValueLabel($value){
        $labels = self::optsAmountType();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column amount_type ENUM value labels
     * @return array
     */
    public static function optsAmountType()
    {
        return [
            self::AMOUNT_TYPE_TUITION => Yii::t('models', 'Tuition'),
            self::AMOUNT_TYPE_VISA => Yii::t('models', 'Visa'),
            self::AMOUNT_TYPE_INSURANCE => Yii::t('models', 'Insurance'),
            self::AMOUNT_TYPE_SSP => Yii::t('models', 'Ssp'),
        ];
    }

    /**
     * get column payment_type enum value label
     * @param string $value
     * @return string
     */
    public static function getPaymentTypeValueLabel($value){
        $labels = self::optsPaymentType();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column payment_type ENUM value labels
     * @return array
     */
    public static function optsPaymentType()
    {
        return [
            self::PAYMENT_TYPE_WECHAT => Yii::t('models', 'Wechat'),
            self::PAYMENT_TYPE_ALIPAY => Yii::t('models', 'Alipay'),
            self::PAYMENT_TYPE_TRANSFER => Yii::t('models', 'Transfer'),
            self::PAYMENT_TYPE_CASH => Yii::t('models', 'Cash'),
        ];
    }

}