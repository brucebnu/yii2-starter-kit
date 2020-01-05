<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserOrg $model
*/

$this->title = Yii::t('backend', 'User Org');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Org'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->user_id, 'url' => ['view', 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud user-org-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'user_id' => $model->user_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
