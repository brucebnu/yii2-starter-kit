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
 * @var backend\modules\crud\models\UserProfile $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin([
		'id' => 'UserProfile',
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


<!-- attribute locale -->
			<?php echo $form->field($model, 'locale')->textInput(['maxlength' => true]) ?>

<!-- attribute gender -->
			<?php echo $form->field($model, 'gender')->textInput() ?>

<!-- attribute firstname -->
			<?php echo $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

<!-- attribute middlename -->
			<?php echo $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>

<!-- attribute lastname -->
			<?php echo $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

<!-- attribute avatar_path -->
			<?php echo $form->field($model, 'avatar_path')->textInput(['maxlength' => true]) ?>

<!-- attribute avatar_base_url -->
			<?php echo $form->field($model, 'avatar_base_url')->textInput(['maxlength' => true]) ?>

<!-- attribute user_id -->
			<?php echo // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
$form->field($model, 'user_id')->dropDownList(
	\yii\helpers\ArrayHelper::map(backend\modules\crud\models\User::find()->all(), 'id', 'id'),
	[
		'prompt' => Yii::t('cruds', 'Select'),
		'disabled' => (isset($relAttributes) && isset($relAttributes['user_id'])),
	]
); ?>
        </p>
        <?php $this->endBlock(); ?>

        <?php echo
Tabs::widget(
	[
		'encodeLabels' => false,
		'items' => [
			[
				'label'   => Yii::t('models', 'UserProfile'),
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
