<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserDormitory $model
*/

$this->title = Yii::t('backend', 'User Dormitory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Dormitory'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->user_dormitory_id, 'url' => ['view', 'user_dormitory_id' => $model->user_dormitory_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud user-dormitory-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'user_dormitory_id' => $model->user_dormitory_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
