<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\OrderAmount $model
*/

$this->title = Yii::t('backend', 'Order Amount');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Order Amounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud order-amount-create">

    <h1>
        <?= Yii::t('backend', 'Order Amount') ?>
        <small>
                        <?= Html::encode($model->amount_id) ?>
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
