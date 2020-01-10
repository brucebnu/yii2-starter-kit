<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserOrg $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="card card-primary card-outline user-org-form">
    <?php $form = ActiveForm::begin([
        'id' => 'UserOrg',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-danger',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                #'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ],
    ]);
    ?>
    <div class="card-body">
        <?php $this->beginBlock('main'); ?>
        

<!-- attribute user_id -->
			<?= $form->field($model, 'user_id')->textInput() ?>

<!-- attribute phone -->
			<?= $form->field($model, 'phone')->textInput() ?>

<!-- attribute phone_native -->
			<?= $form->field($model, 'phone_native')->textInput() ?>

<!-- attribute gender -->
			<?=                         $form->field($model, 'gender')->dropDownList(
                            \backend\modules\org\models\UserOrg::optsgender()
                        ); ?>

<!-- attribute linked_training -->
			<?=                         $form->field($model, 'linked_training')->dropDownList(
                            \backend\modules\org\models\UserOrg::optslinkedtraining()
                        ); ?>

<!-- attribute company_type -->
			<?=                         $form->field($model, 'company_type')->dropDownList(
                            \backend\modules\org\models\UserOrg::optscompanytype()
                        ); ?>

<!-- attribute passport_info -->
			<?= $form->field($model, 'passport_info')->textarea(['rows' => 6]) ?>

<!-- attribute birthday -->
			<?= $form->field($model, 'birthday')->textInput() ?>

<!-- attribute passport_no -->
			<?= $form->field($model, 'passport_no')->textInput(['maxlength' => true]) ?>

<!-- attribute full_name -->
			<?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

<!-- attribute nick_name -->
			<?= $form->field($model, 'nick_name')->textInput(['maxlength' => true]) ?>

<!-- attribute emergency_contact -->
			<?= $form->field($model, 'emergency_contact')->textInput(['maxlength' => true]) ?>

<!-- attribute company_title -->
			<?= $form->field($model, 'company_title')->textInput(['maxlength' => true]) ?>

<!-- attribute nationality -->
			<?= $form->field($model, 'nationality')->textInput(['maxlength' => true]) ?>

<!-- attribute passport_full_Name -->
			<?= $form->field($model, 'passport_full_Name')->textInput(['maxlength' => true]) ?>

<!-- attribute phone_calling_code -->
			<?= $form->field($model, 'phone_calling_code')->textInput(['maxlength' => true]) ?>

<!-- attribute phone_native_calling_code -->
			<?= $form->field($model, 'phone_native_calling_code')->textInput(['maxlength' => true]) ?>        <?php $this->endBlock(); ?>
        
        <?=
            yii\bootstrap4\Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('backend', 'UserOrg'),
    'content' => $this->blocks['main'],
    'active'  => true,
],
                    ]
                 ]
            );
        ?>        <?php echo $form->errorSummary($model); ?>
    </div>

    <div class="card-footer">
        <?= Html::submitButton(
        '<i class="fa fa-check"></i> ' .
        ($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Save')),
        [
            'id' => 'save-' . $model->formName(),
            'class' => 'btn btn-success'
        ]);
        ?>

        <?php ActiveForm::end(); ?>
    </div>

</div>

