<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\org\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "user_org".
 *
 * @property integer $user_id
 * @property string $passport_no
 * @property string $nationality
 * @property string $passport_full_Name
 * @property string $full_name
 * @property string $nick_name
 * @property string $gender
 * @property string $birthday
 * @property string $emergency_contact
 * @property string $phone_calling_code
 * @property integer $phone
 * @property string $phone_native_calling_code
 * @property integer $phone_native
 * @property string $linked_training
 * @property string $company_type
 * @property string $company_title
 * @property string $passport_info
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property \backend\modules\org\models\UserAddress[] $userAddresses
 * @property \backend\modules\org\models\UserCourse[] $userCourses
 * @property \backend\modules\org\models\UserDormitory[] $userDormitories
 * @property \backend\modules\org\models\UserExpress[] $userExpresses
 * @property \backend\modules\org\models\UserFileStorage[] $userFileStorages
 * @property \backend\modules\org\models\UserFlight[] $userFlights
 * @property \backend\modules\org\models\UserToAgency[] $userToAgencies
 * @property \backend\modules\org\models\UserToOrg[] $userToOrgs
 * @property string $aliasModel
 */
abstract class UserOrg extends \yii\db\ActiveRecord
{



    /**
    * ENUM field values
    */
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';
    const LINKED_TRAINING_YES = 'Yes';
    const LINKED_TRAINING_NO = 'No';
    const COMPANY_TYPE_INDIVIDUAL = 'Individual';
    const COMPANY_TYPE_SCHOOL = 'School';
    const COMPANY_TYPE_COMPANY = 'Company';
    var $enum_labels = false;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_org';
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
            [['user_id'], 'required'],
            [['user_id', 'phone', 'phone_native'], 'integer'],
            [['gender', 'linked_training', 'company_type', 'passport_info'], 'string'],
            [['birthday'], 'safe'],
            [['passport_no', 'full_name', 'nick_name', 'emergency_contact', 'company_title'], 'string', 'max' => 255],
            [['nationality'], 'string', 'max' => 32],
            [['passport_full_Name'], 'string', 'max' => 40],
            [['phone_calling_code', 'phone_native_calling_code'], 'string', 'max' => 8],
            [['user_id'], 'unique'],
            ['gender', 'in', 'range' => [
                    self::GENDER_MALE,
                    self::GENDER_FEMALE,
                ]
            ],
            ['linked_training', 'in', 'range' => [
                    self::LINKED_TRAINING_YES,
                    self::LINKED_TRAINING_NO,
                ]
            ],
            ['company_type', 'in', 'range' => [
                    self::COMPANY_TYPE_INDIVIDUAL,
                    self::COMPANY_TYPE_SCHOOL,
                    self::COMPANY_TYPE_COMPANY,
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
            'user_id' => Yii::t('backend', 'User ID'),
            'passport_no' => Yii::t('backend', 'Passport No'),
            'nationality' => Yii::t('backend', 'Nationality'),
            'passport_full_Name' => Yii::t('backend', 'Passport Full Name'),
            'full_name' => Yii::t('backend', 'Full Name'),
            'nick_name' => Yii::t('backend', 'Nick Name'),
            'gender' => Yii::t('backend', 'Gender'),
            'birthday' => Yii::t('backend', 'Birthday'),
            'emergency_contact' => Yii::t('backend', 'Emergency Contact'),
            'phone_calling_code' => Yii::t('backend', 'Phone Calling Code'),
            'phone' => Yii::t('backend', 'Phone'),
            'phone_native_calling_code' => Yii::t('backend', 'Phone Native Calling Code'),
            'phone_native' => Yii::t('backend', 'Phone Native'),
            'linked_training' => Yii::t('backend', 'Linked Training'),
            'company_type' => Yii::t('backend', 'Company Type'),
            'company_title' => Yii::t('backend', 'Company Title'),
            'passport_info' => Yii::t('backend', 'Passport Info'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'passport_no' => Yii::t('backend', '护照号'),
            'nationality' => Yii::t('backend', '国籍'),
            'passport_full_Name' => Yii::t('backend', '护照全名'),
            'full_name' => Yii::t('backend', '全名'),
            'nick_name' => Yii::t('backend', '昵称'),
            'gender' => Yii::t('backend', '性别'),
            'birthday' => Yii::t('backend', '生日'),
            'emergency_contact' => Yii::t('backend', '紧急联系人'),
            'phone_calling_code' => Yii::t('backend', '国际区号'),
            'phone' => Yii::t('backend', '手机号'),
            'phone_native_calling_code' => Yii::t('backend', '国际区号'),
            'phone_native' => Yii::t('backend', '游学手机号'),
            'linked_training' => Yii::t('backend', '海外进修规划'),
            'company_type' => Yii::t('backend', '公司类型'),
            'company_title' => Yii::t('backend', '公司名称'),
            'passport_info' => Yii::t('backend', '护照识别'),
            'created_at' => Yii::t('backend', '创建时间'),
            'updated_at' => Yii::t('backend', '更新时间'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAddresses()
    {
        return $this->hasMany(\backend\modules\org\models\UserAddress::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCourses()
    {
        return $this->hasMany(\backend\modules\org\models\UserCourse::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDormitories()
    {
        return $this->hasMany(\backend\modules\org\models\UserDormitory::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserExpresses()
    {
        return $this->hasMany(\backend\modules\org\models\UserExpress::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFileStorages()
    {
        return $this->hasMany(\backend\modules\org\models\UserFileStorage::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFlights()
    {
        return $this->hasMany(\backend\modules\org\models\UserFlight::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserToAgencies()
    {
        return $this->hasMany(\backend\modules\org\models\UserToAgency::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserToOrgs()
    {
        return $this->hasMany(\backend\modules\org\models\UserToOrg::className(), ['user_id' => 'user_id']);
    }


    
    /**
     * @inheritdoc
     * @return \backend\modules\org\models\query\UserOrgQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\org\models\query\UserOrgQuery(get_called_class());
    }


    /**
     * get column gender enum value label
     * @param string $value
     * @return string
     */
    public static function getGenderValueLabel($value){
        $labels = self::optsGender();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column gender ENUM value labels
     * @return array
     */
    public static function optsGender()
    {
        return [
            self::GENDER_MALE => Yii::t('backend', 'Male'),
            self::GENDER_FEMALE => Yii::t('backend', 'Female'),
        ];
    }

    /**
     * get column linked_training enum value label
     * @param string $value
     * @return string
     */
    public static function getLinkedTrainingValueLabel($value){
        $labels = self::optsLinkedTraining();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column linked_training ENUM value labels
     * @return array
     */
    public static function optsLinkedTraining()
    {
        return [
            self::LINKED_TRAINING_YES => Yii::t('backend', 'Yes'),
            self::LINKED_TRAINING_NO => Yii::t('backend', 'No'),
        ];
    }

    /**
     * get column company_type enum value label
     * @param string $value
     * @return string
     */
    public static function getCompanyTypeValueLabel($value){
        $labels = self::optsCompanyType();
        if(isset($labels[$value])){
            return $labels[$value];
        }
        return $value;
    }

    /**
     * column company_type ENUM value labels
     * @return array
     */
    public static function optsCompanyType()
    {
        return [
            self::COMPANY_TYPE_INDIVIDUAL => Yii::t('backend', 'Individual'),
            self::COMPANY_TYPE_SCHOOL => Yii::t('backend', 'School'),
            self::COMPANY_TYPE_COMPANY => Yii::t('backend', 'Company'),
        ];
    }

}
