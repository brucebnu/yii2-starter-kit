<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\UserFlight $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="user-flight-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'org_user_flight_id') ?>

		<?= $form->field($model, 'user_id') ?>

		<?= $form->field($model, 'org_id') ?>

		<?= $form->field($model, 'arrival_flight') ?>

		<?= $form->field($model, 'arrival_datetime') ?>

		<?php // echo $form->field($model, 'departure_flight') ?>

		<?php // echo $form->field($model, 'departure_datetime') ?>

		<?php // echo $form->field($model, 'pickup_special_request') ?>

		<?php // echo $form->field($model, 'visa_expiry_date') ?>

		<?php // echo $form->field($model, 'travel_insurance') ?>

		<?php // echo $form->field($model, 'address') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
