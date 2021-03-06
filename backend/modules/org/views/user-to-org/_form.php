<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserToOrg $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="card card-primary card-outline user-to-org-form">
    <?php $form = ActiveForm::begin([
        'id' => 'UserToOrg',
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

<!-- attribute user_id -->
			<?= $form->field($model, 'user_id')->textInput() ?>

<!-- attribute role_name -->
			<?=                         $form->field($model, 'role_name')->dropDownList(
                            \backend\modules\org\models\UserToOrg::optsrolename()
                        ); ?>

<!-- attribute status -->
			<?=                         $form->field($model, 'status')->dropDownList(
                            \backend\modules\org\models\UserToOrg::optsstatus()
                        ); ?>

<!-- attribute org_title -->
			<?= $form->field($model, 'org_title')->textInput(['maxlength' => true]) ?>        <?php $this->endBlock(); ?>
        
        <?=
            yii\bootstrap4\Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('backend', 'UserToOrg'),
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

