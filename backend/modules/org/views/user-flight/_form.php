<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserFlight $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="card card-primary card-outline user-flight-form">
    <?php $form = ActiveForm::begin([
        'id' => 'UserFlight',
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
        

<!-- attribute org_user_flight_id -->

<!-- attribute user_id -->
			<?= $form->field($model, 'user_id')->textInput() ?>

<!-- attribute org_id -->
			<?= $form->field($model, 'org_id')->textInput() ?>

<!-- attribute arrival_datetime -->
			<?= $form->field($model, 'arrival_datetime')->textInput() ?>

<!-- attribute departure_datetime -->
			<?= $form->field($model, 'departure_datetime')->textInput() ?>

<!-- attribute visa_expiry_date -->
			<?= $form->field($model, 'visa_expiry_date')->textInput() ?>

<!-- attribute pickup_special_request -->
			<?= $form->field($model, 'pickup_special_request')->textarea(['rows' => 6]) ?>

<!-- attribute travel_insurance -->
			<?=                         $form->field($model, 'travel_insurance')->dropDownList(
                            \backend\modules\org\models\UserFlight::optstravelinsurance()
                        ); ?>

<!-- attribute arrival_flight -->
			<?= $form->field($model, 'arrival_flight')->textInput(['maxlength' => true]) ?>

<!-- attribute departure_flight -->
			<?= $form->field($model, 'departure_flight')->textInput(['maxlength' => true]) ?>

<!-- attribute address -->
			<?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>        <?php $this->endBlock(); ?>
        
        <?=
            yii\bootstrap4\Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('backend', 'UserFlight'),
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

