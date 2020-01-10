<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\UserDormitorySearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="user-dormitory-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'user_dormitory_id') ?>

		<?= $form->field($model, 'org_id') ?>

		<?= $form->field($model, 'user_id') ?>

		<?= $form->field($model, 'dormitory_id') ?>

		<?= $form->field($model, 'period_week') ?>

		<?php // echo $form->field($model, 'started_at') ?>

		<?php // echo $form->field($model, 'ended_at') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
