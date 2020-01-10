<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\UserFileStorageSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="user-file-storage-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'user_file_storage_id') ?>

		<?= $form->field($model, 'user_id') ?>

		<?= $form->field($model, 'component') ?>

		<?= $form->field($model, 'base_url') ?>

		<?= $form->field($model, 'path') ?>

		<?php // echo $form->field($model, 'type') ?>

		<?php // echo $form->field($model, 'size') ?>

		<?php // echo $form->field($model, 'name') ?>

		<?php // echo $form->field($model, 'upload_ip') ?>

		<?php // echo $form->field($model, 'hash') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'longitude') ?>

		<?php // echo $form->field($model, 'latitude') ?>

		<?php // echo $form->field($model, 'area') ?>

		<?php // echo $form->field($model, 'bucket') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
