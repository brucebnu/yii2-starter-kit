<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\UserExpressSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="user-express-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'express_id') ?>

		<?= $form->field($model, 'user_id') ?>

		<?= $form->field($model, 'user_address_id') ?>

		<?= $form->field($model, 'express_title') ?>

		<?= $form->field($model, 'express_no') ?>

		<?php // echo $form->field($model, 'express_info_url') ?>

		<?php // echo $form->field($model, 'express_type') ?>

		<?php // echo $form->field($model, 'completion_time') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
