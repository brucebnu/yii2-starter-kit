<?php

namespace common\validators;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberType;
use yii\validators\Validator;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Validates the given attribute value with the PhoneNumberUtil library.
 * @package borales\extensions\phoneInput
 */
class PhoneInputValidator extends \borales\extensions\phoneInput\PhoneInputValidator
{
    /**
     * @var mixed
     */
    public $region;
    /**
     * @var integer
     */
    public $type;

    public $calling_code = '+86';//默认加86  国家区号;


//添加默认属性字段
    public $calling_code_attribute = 'calling_code';


//此处给手机号添加国家区号
    public function validateAttribute($model, $attribute)
    {
        $calling_code = $this->calling_code_attribute;
        $qian = [" ", "　", "\t", "\n", "\r"];
        $model->$attribute = str_replace($qian, '', $model->$attribute);
        //2018-12-24  提交自动添加86 先去掉
        $model->$attribute = ltrim($model->$attribute, $model->calling_code);
        $model->$attribute = ltrim($model->$attribute, 0);
        $number = $this->calling_code . $model->$attribute;
        //默认是中国码
        if (isset($model->$calling_code) && !empty($model->$calling_code)) {
            $number = $model->$calling_code . $model->$attribute;
        }

        $result = $this->validateValue($number);
        if (!empty($result)) {
            $this->addError($model, $attribute, $result[0], $result[1]);
        }
    }

    /**
     * @inheritdoc
     */
    public function clientValidateAttribute($model, $attribute, $view)
    {
        $telInputId = Html::getInputId($model, $attribute);
        $options = Json::htmlEncode([
            'message' => \Yii::$app->getI18n()->format($this->message, [
                'attribute' => $model->getAttributeLabel($attribute)
            ], \Yii::$app->language)
        ]);
        return <<<JS
                var options = $options, telInput = $("#$telInputId");
                //var countryData =  telInput.intlTelInput('getSelectedCountryData');
                if($.trim(telInput.val())){
                    if(!telInput.intlTelInput("isValidNumber")){
                        messages.push(options.message);
                    }
                }
JS;
    }
}
