<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\OrderAmount $model
*/

$this->title = Yii::t('backend', 'Order Amount');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Order Amount'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->amount_id, 'url' => ['view', 'amount_id' => $model->amount_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud order-amount-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'amount_id' => $model->amount_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
