<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;

/**
 * This is the base-model class for table "cn_town".
 *
 * @property integer $town_id
 * @property integer $region_id
 * @property string $town_name
 *
 * @property \backend\modules\org\models\CnRegion $region
 * @property string $aliasModel
 */
abstract class CnTown extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cn_town';
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
            [['town_id', 'region_id', 'town_name'], 'required'],
            [['town_id', 'region_id'], 'integer'],
            [['town_name'], 'string', 'max' => 50],
            [['town_id'], 'unique'],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\CnRegion::className(), 'targetAttribute' => ['region_id' => 'region_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'town_id' => Yii::t('models', 'Town ID'),
            'region_id' => Yii::t('models', 'Region ID'),
            'town_name' => Yii::t('models', 'Town Name'),
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
     * @return \backend\modules\org\models\query\CnTownQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\CnTownQuery(get_called_class());
    }


}
