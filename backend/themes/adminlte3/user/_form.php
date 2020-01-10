<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */

$country_code = array_keys(\common\models\User::getPhoneData('country_code','title'));
$iso2 = 'CN';

if (isset($model->country_code) && in_array($model->country_code, $country_code)) {
    $iso2 = $model->country_code;
}

?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    echo $form->field($model, 'phone_number')->textInput(['type' => 'tel'])->widget(
        \borales\extensions\phoneInput\PhoneInput::class,
        [
            'jsOptions' => [
                'allowExtensions' => true,

                //显示的国家
                //'separateDialCode'=>false,
                'initialCountry' => $iso2,

                //不显示的国家
                // 'excludeCountries'=>

                //前端验证
                // 'onlyCountries' => ['CN','AU' ],
                'onlyCountries' => $country_code,
            ]
        ]
    );

    ?>
    <?php echo $form->field($model, 'username', ['inputOptions' => ['style' => 'position:none;']]); ?>
    <?php echo $form->field($model, 'calling_codes')->textInput(['readonly' => 'readonly']) ?>
    <?php echo $form->field($model, 'country_code') ?>
    <!-- ['readonly'=>'readonly'] -->
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordInput() ?>
    <?php echo $form->field($model, 'status')->dropDownList(User::statuses()) ?>
    <?php echo $form->field($model, 'source')->dropDownList(User::sources()) ?>
    <?php echo $form->field($model, 'invitation_code') ?>
    <?php echo $form->field($model, 'roles')->checkboxList($roles) ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
