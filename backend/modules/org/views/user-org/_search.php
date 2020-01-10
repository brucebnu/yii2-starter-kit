<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\UserOrgSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="user-org-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'user_id') ?>

		<?= $form->field($model, 'passport_no') ?>

		<?= $form->field($model, 'nationality') ?>

		<?= $form->field($model, 'passport_full_Name') ?>

		<?= $form->field($model, 'full_name') ?>

		<?php // echo $form->field($model, 'nick_name') ?>

		<?php // echo $form->field($model, 'gender') ?>

		<?php // echo $form->field($model, 'birthday') ?>

		<?php // echo $form->field($model, 'emergency_contact') ?>

		<?php // echo $form->field($model, 'phone_calling_code') ?>

		<?php // echo $form->field($model, 'phone') ?>

		<?php // echo $form->field($model, 'phone_native_calling_code') ?>

		<?php // echo $form->field($model, 'phone_native') ?>

		<?php // echo $form->field($model, 'linked_training') ?>

		<?php // echo $form->field($model, 'company_type') ?>

		<?php // echo $form->field($model, 'company_title') ?>

		<?php // echo $form->field($model, 'passport_info') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
