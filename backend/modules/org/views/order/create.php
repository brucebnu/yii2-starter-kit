<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\Order $model
*/

$this->title = Yii::t('backend', 'Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud order-create">

    <h1>
        <?= Yii::t('backend', 'Order') ?>
        <small>
                        <?= Html::encode($model->order_id) ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="float-left">
            <?=             Html::a(
            Yii::t('backend', 'Cancel'),
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
