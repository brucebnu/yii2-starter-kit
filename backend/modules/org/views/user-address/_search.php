<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\UserAddress $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="user-address-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'user_address_id') ?>

		<?= $form->field($model, 'user_id') ?>

		<?= $form->field($model, 'country') ?>

		<?= $form->field($model, 'province') ?>

		<?= $form->field($model, 'city') ?>

		<?php // echo $form->field($model, 'region') ?>

		<?php // echo $form->field($model, 'town') ?>

		<?php // echo $form->field($model, 'sort') ?>

		<?php // echo $form->field($model, 'detailed') ?>

		<?php // echo $form->field($model, 'consignee') ?>

		<?php // echo $form->field($model, 'gender') ?>

		<?php // echo $form->field($model, 'phone_number') ?>

		<?php // echo $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'longitude') ?>

		<?php // echo $form->field($model, 'latitude') ?>

		<?php // echo $form->field($model, 'alias') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
