<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\search\CnCitySearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="cn-city-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'city_id') ?>

		<?= $form->field($model, 'city_name') ?>

		<?= $form->field($model, 'province_id') ?>

		<?= $form->field($model, 'first_letter') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
