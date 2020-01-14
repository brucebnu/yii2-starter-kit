<?php

namespace common\models;

use common\commands\AddToTimelineCommand;
use common\models\query\UserQuery;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $auth_key
 * @property string $access_token
 * @property string $oauth_client
 * @property string $oauth_client_user_id
 * @property string $publicIdentity
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $logged_at
 * @property string $password write-only password
 *
 * @property \common\models\UserProfile $userProfile
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_DELETED = 3;

    const ROLE_USER = 'user';
    const ROLE_MANAGER = 'manager';
    const ROLE_ADMINISTRATOR = 'administrator';

    const EVENT_AFTER_SIGNUP = 'afterSignup';
    const EVENT_AFTER_LOGIN = 'afterLogin';


    # 注册来源
    CONST SOURCE_PC = 'PC';
    CONST SOURCE_IOS = 'iOS';
    CONST SOURCE_ANDROID = 'Android';
    CONST SOURCE_UNKNOWN = 'Unknown';
    CONST SOURCE_BACKEND = 'Backend';
    public static function sources()
    {
        return [
            self::SOURCE_BACKEND => Yii::t('common', 'Backend'),
            self::SOURCE_ANDROID => Yii::t('common', 'Android'),
            self::SOURCE_IOS => Yii::t('common', 'iOS'),
            self::SOURCE_PC => Yii::t('common', 'PC'),
            self::SOURCE_UNKNOWN => Yii::t('common', 'Unknown'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::find()
            ->active()
            ->andWhere(['id' => $id])
            ->one();
    }

    /**
     * @return UserQuery
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::find()
            ->active()
            ->andWhere(['access_token' => $token])
            ->one();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return User|array|null
     */
    public static function findByUsername($username)
    {
        return static::find()
            ->active()
            ->andWhere(['username' => $username])
            ->one();
    }

    /**
     * Finds user by username or email
     *
     * @param string $login
     * @return User|array|null
     */
    public static function findByLogin($login)
    {
        return static::find()
            ->active()
            ->andWhere(['or', ['username' => $login], ['email' => $login]])
            ->one();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            'auth_key' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'auth_key'
                ],
                'value' => Yii::$app->getSecurity()->generateRandomString()
            ],
            'access_token' => [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'access_token'
                ],
                'value' => function () {
                    return Yii::$app->getSecurity()->generateRandomString(40);
                }
            ]
        ];
    }

    /**
     * @return array
     */
    public function scenarios()
    {
        return ArrayHelper::merge(
            parent::scenarios(),
            [
                'oauth_create' => [
                    'oauth_client', 'oauth_client_user_id', 'email', 'username', '!status'
                ]
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'unique'],
            ['email','email'],
            ['status', 'default', 'value' => self::STATUS_NOT_ACTIVE],
            ['status', 'in', 'range' => array_keys(self::statuses())],
            [['username'], 'filter', 'filter' => function ($value) {
                return \yii\helpers\Html::encode($value);
            }] ,
            [['calling_code'], 'string'],
        ];
    }

    /**
     * Returns user statuses list
     * @return array|mixed
     */
    public static function statuses()
    {
        return [
            self::STATUS_NOT_ACTIVE => Yii::t('common', 'Not Active'),
            self::STATUS_ACTIVE => Yii::t('common', 'Active'),
            self::STATUS_DELETED => Yii::t('common', 'Deleted')
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('common', 'Username'),
            'email' => Yii::t('common', 'E-mail'),
            'status' => Yii::t('common', 'Status'),
            'access_token' => Yii::t('common', 'API access token'),
            'created_at' => Yii::t('common', 'Created at'),
            'updated_at' => Yii::t('common', 'Updated at'),
            'logged_at' => Yii::t('common', 'Last login'),
        ];
    }


    /**
     * 获取手机信息key value 数组
     *
     * @param string $k key
     * @param string $v value
     * @return array
     */
    public static function getPhoneData($k='country_code',$v='title'){

        $data = [];
        foreach (self::getPhoneConfigData() as $key => $value){

            if(!isset($value[$k]) || !isset($value[$v])){
                continue;
            }

            $data[$value[$k]] = $value[$v];

        }
        return $data;
        /*
        array_keys(\common\models\User::getPhoneData('country_code','title')

        \common\models\User::getPhoneData('country_code','title');
        $country_code = [
            'CN' => Yii::t('backend', 'China'),
            'TW' => Yii::t('backend', 'Taiwan'),
            'AU' => Yii::t('backend', 'Australia'),
            'NZ' => Yii::t('backend', 'New Zealand'),
        ];

        \common\models\User::getPhoneData('call_code','country_code')
        $country_code = [
            '+86'  => 'CN',
            '+886' => 'TW',
            '+61'  => 'AU',
            '+64'  => 'NZ',
            '+63'  => 'PH',
            '+852' => 'HK',
            '+853' => 'MO',
        ];
        */
    }
    /*
    public static function getPhoneCallToCountry(){

    }
    */

    /**
     * 手机配置信息
     * @Todo List
     *
     * @return array
     */
    public static function getPhoneConfigData(){
        return [
            [
                'call_code'     => '+86',
                'country_code'  => 'CN',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/cn_64.png',
                'title'         => Yii::t('frontend','China'),
            ],
            [
                'call_code'     => '+61',
                'country_code'  => 'AU',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/au_64.png',
                'title'         => Yii::t('frontend','Australia'),
            ],
            [
                'call_code'     => '+852',
                'country_code'  => 'HK',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/hk_64.png',
                'title'         => Yii::t('frontend','Hong Kong'),
            ],
            [
                'call_code'     => '+853',
                'country_code'  => 'MO',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/mo_64.png',
                'title'         => Yii::t('frontend','Macao'),
            ],
            [
                'call_code'     => '+64',
                'country_code'  => 'NZ',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/nz_64.png',
                'title'         => Yii::t('frontend','New Zealand'),
            ],
            [
                'call_code'     => '+63',
                'country_code'  => 'PH',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/Philippines.png',
                'title'         => Yii::t('frontend','Philippines'),
            ],
            [
                'call_code'     => '+886',
                'country_code'  => 'TW',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/tw_64.png',
                'title'         => Yii::t('frontend','Taiwan'),
            ],
            [
                'call_code'     => '+82',
                'country_code'  => 'KR',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/South_Korea_64.png',
                'title'         => Yii::t('frontend','South Korea'),
            ],
            [
                'call_code'     => '+81',
                'country_code'  => 'JP',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/Japan_64.png',
                'title'         => Yii::t('frontend','Japan'),
            ],

            // 英国、泰国、瑞典
            [
                'call_code'     => '+44',
                'country_code'  => 'GB',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/England_64.png',
                'title'         => Yii::t('frontend','Great Britain'),
            ],
            [
                'call_code'     => '+66',
                'country_code'  => 'TH',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/Thailand_64.png',
                'title'         => Yii::t('frontend','Thailand'),
            ],
            [
                'call_code'     => '+46',
                'country_code'  => 'SE',
                'icon_src'      => 'https://tax-z2-static-v1.ezpaychain.com/Japan_64.png',
                'title'         => Yii::t('frontend','Sweden'),
            ],

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::class, ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    /**
     * Creates user profile and application event
     * @param array $profileData
     */
    public function afterSignup(array $profileData = [])
    {
        $this->refresh();
        Yii::$app->commandBus->handle(new AddToTimelineCommand([
            'category' => 'user',
            'event' => 'signup',
            'data' => [
                'public_identity' => $this->getPublicIdentity(),
                'user_id' => $this->getId(),
                'created_at' => $this->created_at,

                # 2019-08-08
                # 后续添加，监控
                'operator_id'    => Yii::$app->user->isGuest ? 0 : Yii::$app->user->identity->id, # 如果登录，操作者
                'absolute_url'  => Yii::$app->request->absoluteUrl,
                'user_agent'    => Yii::$app->request->headers->get('user-agent', ''),
                'accept_language'=> Yii::$app->request->headers->get('accept-language', ''),
                'referer'       => Yii::$app->request->headers->get('referer', ''),
                'ip'            => Yii::$app->request->userIP,
            ]
        ]));
        // this->getUserOrg(); # 初始化机构用户数据
        $profile = new UserProfile();
        $profile->locale = Yii::$app->language;
        $profile->load($profileData, '');
        $this->link('userProfile', $profile);
        $this->trigger(self::EVENT_AFTER_SIGNUP);
        // Default role
        $auth = Yii::$app->authManager;
        $auth->assign($auth->getRole(User::ROLE_USER), $this->getId());
    }

    /**
     * @return string
     */
    public function getPublicIdentity()
    {
        if ($this->userProfile && $this->userProfile->getFullname()) {
            return $this->userProfile->getFullname();
        }
        if ($this->username) {
            return $this->username;
        }
        return $this->email;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
}
