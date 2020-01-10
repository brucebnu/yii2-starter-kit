<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\CnCity $model
*/

$this->title = Yii::t('backend', 'Cn City');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cn City'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->city_id, 'url' => ['view', 'city_id' => $model->city_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud cn-city-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'city_id' => $model->city_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
