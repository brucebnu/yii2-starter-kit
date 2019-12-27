<?php
/**
 * /Users/brucebnu/Programming/backend/github/yii2-starter-kit/console/runtime/giiant/fcd70a9bfdf8de75128d795dfc948a74
 *
 * @package default
 */


use yii\helpers\Html;

/**
 *
 * @var yii\web\View $this
 * @var backend\modules\crud\models\UserProfile $model
 */
$this->title = Yii::t('models', 'User Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'User Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->user_id, 'url' => ['view', 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>
<div class="giiant-crud user-profile-update">

    <h1>
        <?php echo Yii::t('models', 'User Profile') ?>
        <small>
                        <?php echo Html::encode($model->user_id) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?php echo Html::a('<span class="glyphicon glyphicon-file"></span> ' . Yii::t('cruds', 'View'), ['view', 'user_id' => $model->user_id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
