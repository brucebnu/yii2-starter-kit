<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserAddress $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="card card-primary card-outline user-address-form">
    <?php $form = ActiveForm::begin([
        'id' => 'UserAddress',
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

<!-- attribute detailed -->
			<?= $form->field($model, 'detailed')->textInput(['maxlength' => true]) ?>

<!-- attribute consignee -->
			<?= $form->field($model, 'consignee')->textInput(['maxlength' => true]) ?>

<!-- attribute gender -->
			<?=                         $form->field($model, 'gender')->dropDownList(
                            \backend\modules\org\models\UserAddress::optsgender()
                        ); ?>

<!-- attribute country -->
			<?= $form->field($model, 'country')->textInput() ?>

<!-- attribute province -->
			<?= $form->field($model, 'province')->textInput() ?>

<!-- attribute city -->
			<?= $form->field($model, 'city')->textInput() ?>

<!-- attribute region -->
			<?= $form->field($model, 'region')->textInput() ?>

<!-- attribute town -->
			<?= $form->field($model, 'town')->textInput() ?>

<!-- attribute sort -->
			<?= $form->field($model, 'sort')->textInput() ?>

<!-- attribute status -->
			<?=                         $form->field($model, 'status')->dropDownList(
                            \backend\modules\org\models\UserAddress::optsstatus()
                        ); ?>

<!-- attribute longitude -->
			<?= $form->field($model, 'longitude')->textInput() ?>

<!-- attribute latitude -->
			<?= $form->field($model, 'latitude')->textInput() ?>

<!-- attribute email -->
			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!-- attribute alias -->
			<?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

<!-- attribute phone_number -->
			<?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>        <?php $this->endBlock(); ?>
        
        <?=
            yii\bootstrap4\Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('backend', 'UserAddress'),
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

