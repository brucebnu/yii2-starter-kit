<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */

?>

<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]) ?>

<?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?php echo $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

<?php
//
//echo $form->field($model, 'body')->widget(
//    \yii\imperavi\Widget::class,
//    [
//        'plugins' => ['fullscreen', 'fontcolor', 'video'],
//        'options' => [
//            'minHeight' => 400,
//            'maxHeight' => 400,
//            'buttonSource' => true,
//            'imageUpload' => Yii::$app->urlManager->createUrl(['/file/storage/upload-imperavi']),
//        ],
//    ]
//);
echo $form->field($model, 'body')->widget(\vova07\imperavi\Widget::class, [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen',
        ],
        'clips' => [
            ['Lorem ipsum...', 'Lorem...'],
            ['red', '<span class="label-red">red</span>'],
            ['green', '<span class="label-green">green</span>'],
            ['blue', '<span class="label-blue">blue</span>'],
        ],
    ],
])->label(Yii::t('backend','内容'));
?>

<?php echo $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

<?php echo $form->field($model, 'status')->checkbox() ?>

<div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>
