<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\Organization $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="organization-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'org_id') ?>

		<?= $form->field($model, 'org_parent_id') ?>

		<?= $form->field($model, 'title') ?>

		<?= $form->field($model, 'home_site') ?>

		<?= $form->field($model, 'school_logo_src') ?>

		<?php // echo $form->field($model, 'country') ?>

		<?php // echo $form->field($model, 'address') ?>

		<?php // echo $form->field($model, 'inland_phone') ?>

		<?php // echo $form->field($model, 'foreign_phone') ?>

		<?php // echo $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'created_id') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'sort') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'created_by') ?>

		<?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
