<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\CnTown $model
*/

$this->title = Yii::t('backend', 'Cn Town');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cn Town'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->town_id, 'url' => ['view', 'town_id' => $model->town_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud cn-town-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'town_id' => $model->town_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
