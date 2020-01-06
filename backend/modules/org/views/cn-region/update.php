<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\CnRegion $model
*/

$this->title = Yii::t('backend', 'Cn Region');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cn Region'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->region_id, 'url' => ['view', 'region_id' => $model->region_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud cn-region-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'region_id' => $model->region_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
