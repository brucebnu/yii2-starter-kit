<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserExpress $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="card card-primary card-outline user-express-form">
    <?php $form = ActiveForm::begin([
        'id' => 'UserExpress',
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

<!-- attribute user_address_id -->
			<?= $form->field($model, 'user_address_id')->textInput() ?>

<!-- attribute completion_time -->
			<?= $form->field($model, 'completion_time')->textInput() ?>

<!-- attribute express_type -->
			<?=                         $form->field($model, 'express_type')->dropDownList(
                            \backend\modules\org\models\UserExpress::optsexpresstype()
                        ); ?>

<!-- attribute express_title -->
			<?= $form->field($model, 'express_title')->textInput(['maxlength' => true]) ?>

<!-- attribute express_no -->
			<?= $form->field($model, 'express_no')->textInput(['maxlength' => true]) ?>

<!-- attribute express_info_url -->
			<?= $form->field($model, 'express_info_url')->textInput(['maxlength' => true]) ?>        <?php $this->endBlock(); ?>
        
        <?=
            yii\bootstrap4\Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('backend', 'UserExpress'),
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
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Save')),
        [
            'id' => 'save-' . $model->formName(),
            'class' => 'btn btn-success'
        ]);
        ?>

        <?php ActiveForm::end(); ?>
    </div>

</div>

