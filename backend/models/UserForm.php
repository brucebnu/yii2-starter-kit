<?php
namespace backend\models;

use common\models\User;
use yii\base\Exception;
use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;
use common\validators\PhoneInputValidator;

/**
 * Create user form
 */
class UserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $roles;

    public $country_code;
    public $calling_code;
    public $phone_number;
    public $source;

    private $model;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['phone_number','string','when'=>function($model){
                // var_dump($phone_number);exit;
                 return $model->phone_number = str_replace(' ','',$model->phone_number);
            }],
            ['phone_number','filter','filter'=>'trim'],
            [['phone_number'], PhoneInputValidator::class, 'region' => array_values(\common\models\User::getPhoneData('call_code','country_code')) ],
            [['phone_number','calling_code','country_code'], 'required'],
             ['username', 'unique', 'targetClass' => User::class, 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],
            ['phone_number', 'unique', 'targetClass' => User::class, 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],
             //['phone_number','is_phone'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [['calling_code','country_code'],'string','max' => 8],
            [['source'],'string','max' => 32],
            ['email', 'filter', 'filter' => 'trim'],

            //['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass'=> User::class, 'filter' => function ($query) {
                if (!$this->getModel()->isNewRecord) {
                    $query->andWhere(['not', ['id'=>$this->getModel()->id]]);
                }
            }],

            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 6],

            [['status'], 'integer'],
            [['roles'], 'each',
                'rule' => ['in', 'range' => ArrayHelper::getColumn(
                    Yii::$app->authManager->getRoles(),
                    'name'
                )]
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('backend', 'Username'),
            'country_code' => Yii::t('backend', 'Country code'),
            'calling_code' => Yii::t('backend', 'Calling code'),
            'phone_number' => Yii::t('backend', 'Phone number'),
            'email' => Yii::t('backend', 'Email'),
            'status' => Yii::t('backend', 'Status'),
            'password' => Yii::t('backend', 'Password'),
            'roles' => Yii::t('backend', 'Roles'),
        ];
    }

    /**
     *  [is_phone 手机号格式验证(中国)]
     *  @return boolean [description]
     */
    function is_phone()
    {
        if(!preg_match("/^1[34578]{1}\d{9}$/",$this->phone_number)){
           return $this->addError('phone_number',Yii::t('frontend','Phone number is illegal'));
        }
    }

    /**
     * @param User $model
     * @return mixed
     */
    public function setModel($model)
    {
        $this->username = $model->username;
        $this->phone_number = $model->phone_number;
        $this->country_code = $model->country_code;
        $this->calling_code = $model->calling_code;
        $this->email = $model->email;
        $this->status = $model->status;
        $this->source = $model->source;

        $this->model = $model;
        $this->roles = ArrayHelper::getColumn(
            Yii::$app->authManager->getRolesByUser($model->getId()),
            'name'
        );
        //dd($this->model);
        return $this->model;
    }

    /**
     * @return User
     */
    public function getModel()
    {
        if (!$this->model) {
            $this->model = new User();
        }
        return $this->model;
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     * @throws Exception
     */
    public function save()
    {
        if ($this->validate()) {
            $model = $this->getModel();
            $isNewRecord = $model->getIsNewRecord();
            $model->username = $this->username;
            $model->phone_number = $this->phone_number;
            $model->country_code = $this->country_code;
            $model->calling_code = $this->calling_code;
            $model->email = $this->email;
            $model->status = $this->status;
            $model->source = $this->source;

            if ($this->password) {
                $model->setPassword($this->password);
            }
            if (!$model->save()) {
                //var_dump($model->getErrors());exit;
                throw new Exception('Model not saved');
            }
            if ($isNewRecord) {
                $model->afterSignup();
            }
            $auth = Yii::$app->authManager;
            $auth->revokeAll($model->getId());

            if ($this->roles && is_array($this->roles)) {
                foreach ($this->roles as $role) {
                    $auth->assign($auth->getRole($role), $model->getId());
                }
            }

            return !$model->hasErrors();
        }
        return null;
    }
}
