<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserToOrg $model
*/

$this->title = Yii::t('backend', 'User To Org');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User To Org'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->user_to_ort_id, 'url' => ['view', 'user_to_ort_id' => $model->user_to_ort_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud user-to-org-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'user_to_ort_id' => $model->user_to_ort_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
