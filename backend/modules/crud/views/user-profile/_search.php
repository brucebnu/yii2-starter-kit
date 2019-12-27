<?php
/**
 * /Users/brucebnu/Programming/backend/github/yii2-starter-kit/console/runtime/giiant/eeda5c365686c9888dbc13dbc58f89a1
 *
 * @package default
 */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 *
 * @var yii\web\View $this
 * @var backend\modules\crud\models\search\UserProfile $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-profile-search">

    <?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

    		<?php echo $form->field($model, 'user_id') ?>

		<?php echo $form->field($model, 'firstname') ?>

		<?php echo $form->field($model, 'middlename') ?>

		<?php echo $form->field($model, 'lastname') ?>

		<?php echo $form->field($model, 'avatar_path') ?>

		<?php // echo $form->field($model, 'avatar_base_url') ?>

		<?php // echo $form->field($model, 'locale') ?>

		<?php // echo $form->field($model, 'gender') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('cruds', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('cruds', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
