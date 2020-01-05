<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\Order $model
*/

$this->title = Yii::t('backend', 'Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Order'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->order_id, 'url' => ['view', 'order_id' => $model->order_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud order-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'order_id' => $model->order_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
