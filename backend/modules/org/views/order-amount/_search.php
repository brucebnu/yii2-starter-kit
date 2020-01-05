<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\OrderAmount $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="order-amount-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'amount_id') ?>

		<?= $form->field($model, 'order_id') ?>

		<?= $form->field($model, 'currency_type') ?>

		<?= $form->field($model, 'transaction_price') ?>

		<?= $form->field($model, 'payment_type') ?>

		<?php // echo $form->field($model, 'pay_order_src') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'update_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
