<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\OrderAmount $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="card card-primary card-outline order-amount-form">
    <?php $form = ActiveForm::begin([
        'id' => 'OrderAmount',
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
        

<!-- attribute order_id -->
			<?= $form->field($model, 'order_id')->textInput() ?>

<!-- attribute update_at -->
			<?= $form->field($model, 'update_at')->textInput() ?>

<!-- attribute transaction_price -->
			<?= $form->field($model, 'transaction_price')->textInput(['maxlength' => true]) ?>

<!-- attribute payment_type -->
			<?=                         $form->field($model, 'payment_type')->dropDownList(
                            \backend\modules\org\models\OrderAmount::optspaymenttype()
                        ); ?>

<!-- attribute currency_type -->
			<?= $form->field($model, 'currency_type')->textInput(['maxlength' => true]) ?>

<!-- attribute pay_order_src -->
			<?= $form->field($model, 'pay_order_src')->textInput(['maxlength' => true]) ?>        <?php $this->endBlock(); ?>
        
        <?=
            yii\bootstrap4\Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('backend', 'OrderAmount'),
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

