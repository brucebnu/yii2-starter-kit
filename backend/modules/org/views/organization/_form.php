<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var backend\modules\org\models\Organization $model
 * @var yii\widgets\ActiveForm $form
 */

?>
<div class="card card-primary card-outline organization-form">
    <?php $form = ActiveForm::begin([
        'id' => 'Organization',
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


        <!-- attribute org_parent_id -->
        <?= $form->field($model, 'org_parent_id')->textInput() ?>

        <!-- attribute created_id -->
        <?= $form->field($model, 'created_id')->textInput() ?>

        <!-- attribute sort -->
        <?= $form->field($model, 'sort')->textInput() ?>

        <!-- attribute country -->
        <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

        <!-- attribute status -->
        <?= $form->field($model, 'status')->dropDownList(
            \backend\modules\org\models\Organization::optsstatus()
        ); ?>

        <!-- attribute title -->
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <!-- attribute address -->
        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <!-- attribute inland_phone -->
        <?= $form->field($model, 'inland_phone')->textInput(['maxlength' => true]) ?>

        <!-- attribute foreign_phone -->
        <?= $form->field($model, 'foreign_phone')->textInput(['maxlength' => true]) ?>

        <!-- attribute email -->
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <!-- attribute home_site -->
        <?= $form->field($model, 'home_site')->textInput(['maxlength' => true]) ?>

        <!-- attribute school_logo_src -->
        <?= $form->field($model, 'school_logo_src')->textInput(['maxlength' => true]) ?>        <?php $this->endBlock(); ?>

        <?=
        yii\bootstrap4\Tabs::widget(
            [
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => Yii::t('backend', 'Organization'),
                        'content' => $this->blocks['main'],
                        'active' => true,
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

