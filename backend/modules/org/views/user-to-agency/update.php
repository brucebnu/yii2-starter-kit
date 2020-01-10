<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserToAgency $model
*/

$this->title = Yii::t('backend', 'User To Agency');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User To Agency'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->user_to_agency, 'url' => ['view', 'user_to_agency' => $model->user_to_agency]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud user-to-agency-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'user_to_agency' => $model->user_to_agency], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
