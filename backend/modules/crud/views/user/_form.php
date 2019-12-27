<?php
/**
 * /Users/brucebnu/Programming/backend/github/yii2-starter-kit/console/runtime/giiant/4b7e79a8340461fe629a6ac612644d03
 *
 * @package default
 */


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
 *
 * @var yii\web\View $this
 * @var backend\modules\crud\models\User $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
		'id' => 'User',
		'layout' => 'horizontal',
		'enableClientValidation' => true,
		'errorSummaryCssClass' => 'error-summary alert alert-danger',
		'fieldConfig' => [
			'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
			'horizontalCssClasses' => [
				'label' => 'col-sm-2',
				//'offset' => 'col-sm-offset-4',
				'wrapper' => 'col-sm-8',
				'error' => '',
				'hint' => '',
			],
		],
	]
);
?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>


<!-- attribute auth_key -->
			<?php echo $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

<!-- attribute access_token -->
			<?php echo $form->field($model, 'access_token')->textInput(['maxlength' => true]) ?>

<!-- attribute password_hash -->
			<?php echo $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

<!-- attribute email -->
			<?php echo $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!-- attribute status -->
			<?php echo $form->field($model, 'status')->textInput() ?>

<!-- attribute logged_at -->
			<?php echo $form->field($model, 'logged_at')->textInput() ?>

<!-- attribute username -->
			<?php echo $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

<!-- attribute oauth_client -->
			<?php echo $form->field($model, 'oauth_client')->textInput(['maxlength' => true]) ?>

<!-- attribute oauth_client_user_id -->
			<?php echo $form->field($model, 'oauth_client_user_id')->textInput(['maxlength' => true]) ?>
        </p>
        <?php $this->endBlock(); ?>

        <?php echo
Tabs::widget(
	[
		'encodeLabels' => false,
		'items' => [
			[
				'label'   => Yii::t('models', 'User'),
				'content' => $this->blocks['main'],
				'active'  => true,
			],
		]
	]
);
?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?php echo Html::submitButton(
	'<span class="glyphicon glyphicon-check"></span> ' .
	($model->isNewRecord ? Yii::t('cruds', 'Create') : Yii::t('cruds', 'Save')),
	[
		'id' => 'save-' . $model->formName(),
		'class' => 'btn btn-success'
	]
);
?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
