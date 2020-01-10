<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserFileStorage $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="card card-primary card-outline user-file-storage-form">
    <?php $form = ActiveForm::begin([
        'id' => 'UserFileStorage',
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

<!-- attribute component -->
			<?= $form->field($model, 'component')->textInput(['maxlength' => true]) ?>

<!-- attribute base_url -->
			<?= $form->field($model, 'base_url')->textInput(['maxlength' => true]) ?>

<!-- attribute path -->
			<?= $form->field($model, 'path')->textInput(['maxlength' => true]) ?>

<!-- attribute size -->
			<?= $form->field($model, 'size')->textInput() ?>

<!-- attribute status -->
			<?= $form->field($model, 'status')->textInput() ?>

<!-- attribute longitude -->
			<?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

<!-- attribute latitude -->
			<?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

<!-- attribute type -->
			<?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

<!-- attribute name -->
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!-- attribute area -->
			<?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

<!-- attribute bucket -->
			<?= $form->field($model, 'bucket')->textInput(['maxlength' => true]) ?>

<!-- attribute upload_ip -->
			<?= $form->field($model, 'upload_ip')->textInput(['maxlength' => true]) ?>

<!-- attribute hash -->
			<?= $form->field($model, 'hash')->textInput(['maxlength' => true]) ?>        <?php $this->endBlock(); ?>
        
        <?=
            yii\bootstrap4\Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('backend', 'UserFileStorage'),
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

