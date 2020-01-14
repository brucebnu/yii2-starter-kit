<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserCourse $model
* @var yii\widgets\ActiveForm $form
*/

?>
<div class="card card-primary card-outline user-course-form">
    <?php $form = ActiveForm::begin([
        'id' => 'UserCourse',
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
			<?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'user_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(backend\modules\org\models\Organization::find()->all(), 'org_id', 'title'),
    [
        'prompt' => Yii::t('backend', 'Select'),
        'disabled' => (isset($relAttributes) && isset($relAttributes['user_id'])),
    ]
); ?>

<!-- attribute course_id -->
			<?= $form->field($model, 'course_id')->textInput() ?>

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
    'label'   => Yii::t('backend', 'UserCourse'),
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
