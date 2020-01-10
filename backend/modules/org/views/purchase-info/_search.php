<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\PurchaseInfoSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="purchase-info-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'purchase_invoice_id') ?>

		<?= $form->field($model, 'pubchase_tag') ?>

		<?= $form->field($model, 'pubchase_invoice_price') ?>

		<?= $form->field($model, 'pubchase_invoice_src') ?>

		<?= $form->field($model, 'org_id') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_by') ?>

		<?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
