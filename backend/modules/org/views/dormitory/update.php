<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\Dormitory $model
*/

$this->title = Yii::t('backend', 'Dormitory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Dormitory'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->dormitory_id, 'url' => ['view', 'dormitory_id' => $model->dormitory_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud dormitory-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'dormitory_id' => $model->dormitory_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
