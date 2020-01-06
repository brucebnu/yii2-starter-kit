<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\PurchaseInfo $model
*/

$this->title = Yii::t('backend', 'Purchase Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Purchase Info'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->purchase_invoice_id, 'url' => ['view', 'purchase_invoice_id' => $model->purchase_invoice_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Edit');
?>
<div class="giiant-crud purchase-info-update">
    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?= Html::a('<span class="fa fa-eye"></span> ' . Yii::t('backend', 'View'), ['view', 'purchase_invoice_id' => $model->purchase_invoice_id], ['class' => 'btn btn-block btn-outline-success btn-sm']) ?>
        </div>
    </div>
    <hr />
    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>
</div>
