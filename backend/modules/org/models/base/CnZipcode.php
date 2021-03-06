<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;

/**
 * This is the base-model class for table "cn_zipcode".
 *
 * @property integer $zip_id
 * @property integer $region_id
 * @property string $zip_number
 * @property string $code
 *
 * @property \backend\modules\org\models\CnRegion $region
 * @property string $aliasModel
 */
abstract class CnZipcode extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cn_zipcode';
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
            [['region_id', 'zip_number', 'code'], 'required'],
            [['region_id'], 'integer'],
            [['zip_number', 'code'], 'string', 'max' => 20],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\CnRegion::className(), 'targetAttribute' => ['region_id' => 'region_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'zip_id' => Yii::t('backend', 'Zip ID'),
            'region_id' => Yii::t('backend', 'Region ID'),
            'zip_number' => Yii::t('backend', 'Zip Number'),
            'code' => Yii::t('backend', 'Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(\backend\modules\org\models\CnRegion::className(), ['region_id' => 'region_id']);
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\org\models\query\CnZipcodeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\CnZipcodeQuery(get_called_class());
    }


}
