<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "purchase_info".
 *
 * @property integer $purchase_invoice_id
 * @property string $pubchase_tag
 * @property string $pubchase_invoice_price
 * @property string $pubchase_invoice_src
 * @property integer $org_id
 * @property integer $updated_at
 * @property integer $created_at
 * @property integer $updated_by
 * @property integer $created_by
 *
 * @property \backend\modules\org\models\Organization $org
 * @property string $aliasModel
 */
abstract class PurchaseInfo extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase_info';
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
            ],
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
            [['pubchase_invoice_price'], 'number'],
            [['org_id'], 'integer'],
            [['pubchase_tag', 'pubchase_invoice_src'], 'string', 'max' => 255],
            [['org_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\Organization::className(), 'targetAttribute' => ['org_id' => 'org_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'purchase_invoice_id' => Yii::t('backend', 'Purchase Invoice ID'),
            'pubchase_tag' => Yii::t('backend', 'Pubchase Tag'),
            'pubchase_invoice_price' => Yii::t('backend', 'Pubchase Invoice Price'),
            'pubchase_invoice_src' => Yii::t('backend', 'Pubchase Invoice Src'),
            'org_id' => Yii::t('backend', 'Org ID'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_by' => Yii::t('backend', 'Updated By'),
            'created_by' => Yii::t('backend', 'Created By'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'pubchase_tag' => Yii::t('backend', '采购标签'),
            'pubchase_invoice_price' => Yii::t('backend', '发票价格'),
            'pubchase_invoice_src' => Yii::t('backend', '发票地址'),
            'org_id' => Yii::t('backend', '机构'),
            'updated_at' => Yii::t('backend', '更新时间'),
            'created_at' => Yii::t('backend', '创建时间'),
            'updated_by' => Yii::t('backend', '更新者'),
            'created_by' => Yii::t('backend', '创建者'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrg()
    {
        return $this->hasOne(\backend\modules\org\models\Organization::className(), ['org_id' => 'org_id'])->inverseOf('purchaseInfos');
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\org\models\query\PurchaseInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\PurchaseInfoQuery(get_called_class());
    }


}