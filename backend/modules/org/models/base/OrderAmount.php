<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "order_amount".
 *
 * @property integer $amount_id
 * @property integer $order_id
 * @property string $currency_type
 * @property string $transaction_price
 * @property string $payment_type
 * @property string $pay_order_src
 * @property integer $update_at
 * @property integer $created_at
 *
 * @property \backend\modules\org\models\Order $order
 * @property string $aliasModel
 */
abstract class OrderAmount extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
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
            [['order_id', 'update_at'], 'integer'],
            [['transaction_price'], 'number'],
            [['payment_type'], 'string'],
            [['currency_type', 'pay_order_src'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\Order::className(), 'targetAttribute' => ['order_id' => 'order_id']],
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
            'currency_type' => Yii::t('models', 'Currency Type'),
            'transaction_price' => Yii::t('models', 'Transaction Price'),
            'payment_type' => Yii::t('models', 'Payment Type'),
            'pay_order_src' => Yii::t('models', 'Pay Order Src'),
            'created_at' => Yii::t('models', 'Created At'),
            'update_at' => Yii::t('models', 'Update At'),
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
            'currency_type' => Yii::t('models', '货币类型'),
            'transaction_price' => Yii::t('models', '成交金额'),
            'payment_type' => Yii::t('models', '支付方法'),
            'pay_order_src' => Yii::t('models', '支付凭证'),
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
