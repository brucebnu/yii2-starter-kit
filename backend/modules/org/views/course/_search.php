<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\CourseSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'course_id') ?>

		<?= $form->field($model, 'org_id') ?>

		<?= $form->field($model, 'regulation') ?>

		<?= $form->field($model, 'title') ?>

		<?= $form->field($model, 'descript') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
