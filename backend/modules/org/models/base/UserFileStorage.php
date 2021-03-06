<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "user_file_storage".
 *
 * @property integer $user_file_storage_id
 * @property integer $user_id
 * @property string $component
 * @property string $base_url
 * @property string $path
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property string $upload_ip
 * @property string $hash
 * @property integer $status
 * @property string $longitude
 * @property string $latitude
 * @property string $area
 * @property string $bucket
 * @property integer $created_at
 * @property integer $created_by
 *
 * @property \backend\modules\org\models\UserOrg $user
 * @property string $aliasModel
 */
abstract class UserFileStorage extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_file_storage';
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
            [['user_id', 'component', 'base_url', 'path'], 'required'],
            [['user_id', 'size', 'status'], 'integer'],
            [['longitude', 'latitude'], 'number'],
            [['component', 'type', 'name', 'area', 'bucket'], 'string', 'max' => 255],
            [['base_url', 'path'], 'string', 'max' => 1024],
            [['upload_ip'], 'string', 'max' => 15],
            [['hash'], 'string', 'max' => 32],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \backend\modules\org\models\UserOrg::className(), 'targetAttribute' => ['user_id' => 'user_id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_file_storage_id' => Yii::t('backend', 'User File Storage ID'),
            'user_id' => Yii::t('backend', 'User ID'),
            'component' => Yii::t('backend', 'Component'),
            'base_url' => Yii::t('backend', 'Base Url'),
            'path' => Yii::t('backend', 'Path'),
            'type' => Yii::t('backend', 'Type'),
            'size' => Yii::t('backend', 'Size'),
            'name' => Yii::t('backend', 'Name'),
            'upload_ip' => Yii::t('backend', 'Upload Ip'),
            'hash' => Yii::t('backend', 'Hash'),
            'status' => Yii::t('backend', 'Status'),
            'longitude' => Yii::t('backend', 'Longitude'),
            'latitude' => Yii::t('backend', 'Latitude'),
            'area' => Yii::t('backend', 'Area'),
            'bucket' => Yii::t('backend', 'Bucket'),
            'created_at' => Yii::t('backend', 'Created At'),
            'created_by' => Yii::t('backend', 'Created By'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'user_id' => Yii::t('backend', '所属'),
            'component' => Yii::t('backend', 'identity;passport;airTicket;travelItinerary'),
            'base_url' => Yii::t('backend', '域名/'),
            'path' => Yii::t('backend', '域名后访问路径'),
            'type' => Yii::t('backend', 'image/jpeg'),
            'size' => Yii::t('backend', 'KB大小'),
            'name' => Yii::t('backend', '客户端文件名'),
            'upload_ip' => Yii::t('backend', '上传客户端IP'),
            'hash' => Yii::t('backend', '唯一'),
            'status' => Yii::t('backend', '0：关闭；10：公开；20：私有'),
            'area' => Yii::t('backend', '存储区域'),
            'bucket' => Yii::t('backend', '桶'),
            'created_by' => Yii::t('backend', '上传者'),
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
     * @return \backend\modules\org\models\query\UserFileStorageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\UserFileStorageQuery(get_called_class());
    }


}
