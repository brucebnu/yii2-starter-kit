<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\Dormitory $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="card card-primary card-outline dormitory-form">
    <?php $form = ActiveForm::begin([
        'id' => 'Dormitory',
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
        

<!-- attribute org_id -->
			<?= $form->field($model, 'org_id')->textInput() ?>

<!-- attribute dormitory_type -->
			<?=                         $form->field($model, 'dormitory_type')->dropDownList(
                            \backend\modules\org\models\Dormitory::optsdormitorytype()
                        ); ?>

<!-- attribute period_week -->
			<?= $form->field($model, 'period_week')->textInput(['maxlength' => true]) ?>

<!-- attribute started_at -->
			<?= $form->field($model, 'started_at')->textInput() ?>

<!-- attribute ended_at -->
			<?= $form->field($model, 'ended_at')->textInput() ?>        <?php $this->endBlock(); ?>
        
        <?=
            yii\bootstrap4\Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('backend', 'Dormitory'),
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

