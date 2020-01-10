<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\UserToAgencySearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="user-to-agency-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'user_to_agency') ?>

		<?= $form->field($model, 'user_id') ?>

		<?= $form->field($model, 'agency_name') ?>

		<?= $form->field($model, 'agency_contact') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
