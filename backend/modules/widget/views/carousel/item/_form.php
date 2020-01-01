<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\WidgetCarouselItem
 * @var $form  yii\bootstrap\ActiveForm
 */

?>

<?php $form = ActiveForm::begin() ?>

<?php echo $form->errorSummary($model) ?>

<?php
/*
echo $form->field($model, 'image')->widget(
    \trntv\filekit\widget\Upload::class,
    [
        'url' => ['/file/storage/upload'],
    ]
)*/
//dd($model->image['base_url']);
echo $model->image['base_url'].$model->image['path'];
//echo $form->field($model, 'image')->textarea();
?>

<?php echo $form->field($model, 'order')->textInput() ?>

<?php echo $form->field($model, 'url')->textInput(['maxlength' => 1024]) ?>

<?php
/*
echo $form->field($model, 'caption')->widget(
    \yii\imperavi\Widget::class,
    [
        'plugins' => ['fullscreen', 'fontcolor', 'video'],
        'options' => [
            'minHeight' => 400,
            'maxHeight' => 400,
            'buttonSource' => true,
            'convertDivs' => false,
            'removeEmptyTags' => true,
        ],
    ]
);
*/
echo $form->field($model, 'caption')->widget(\vova07\imperavi\Widget::class, [
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

<?php echo $form->field($model, 'status')->checkbox() ?>

<div class="form-group">
    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>
