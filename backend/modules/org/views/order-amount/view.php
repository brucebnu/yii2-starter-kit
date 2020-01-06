<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
//use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\OrderAmount $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('backend', 'Order Amount');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Order Amounts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->amount_id, 'url' => ['view', 'amount_id' => $model->amount_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'View');
?>
<div class="giiant-crud order-amount-view">
    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>
    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='float-left'>
            <?= Html::a(
            '<i class="fa fa-list"></i> ' . Yii::t('backend', 'Edit'),
            [ 'update', 'amount_id' => $model->amount_id],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<i class="fa fa-copy"></i> ' . Yii::t('backend', 'Copy'),
            ['create', 'amount_id' => $model->amount_id, 'OrderAmount'=>$copyParams],
            ['class' => 'btn btn-success']) ?>

            <?= Html::a(
            '<i class="fa fa-plus"></i> ' . Yii::t('backend', 'New'),
            ['create'],
            ['class' => 'btn btn-success']) ?>
        </div>

        <div class="float-right">
            <?= Html::a('<i class="fa fa-list"></i> '
            . Yii::t('backend', 'Full list'), ['index'], ['class'=>'btn btn-default']) ?>
        </div>

    </div>

    <hr/>

    <?php $this->beginBlock('\backend\modules\org\models\OrderAmount'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'order_id',
        'update_at',
        'update_by',
        'transaction_price',
            [
                'attribute'=>'payment_type',
                'value'=>\backend\modules\org\models\OrderAmount::getPaymentTypeValueLabel($model->payment_type),
            ],
        'pay_order_src',
            [
                'attribute'=>'currency_type',
                'value'=>\backend\modules\org\models\OrderAmount::getCurrencyTypeValueLabel($model->currency_type),
            ],
            [
                'attribute'=>'amount_type',
                'value'=>\backend\modules\org\models\OrderAmount::getAmountTypeValueLabel($model->amount_type),
            ],
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<i class="fa fa-trash"></i> ' . Yii::t('backend', 'Delete'), ['delete', 'amount_id' => $model->amount_id],
    [
        'class' => 'btn btn-danger',
        'data-confirm' => '' . Yii::t('backend', 'Are you sure to delete this item?') . '',
        'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Order'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' Order',
            ['order/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' Order',
            ['order/create', 'Order' => ['order_id' => $model->amount_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-Order', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Order ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getOrder(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-order',
        ]
    ]),
    'pager'        => [
        'class'          => yii\widgets\LinkPager::className(),
        'firstPageLabel' => Yii::t('backend', 'First'),
        'lastPageLabel'  => Yii::t('backend', 'Last')
    ],
    'columns' => [
 [
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function ($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'order' . '/' . $action;
        $params['Order'] = ['order_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'order'
],
        'org_id',
        'user_id',
        'total_price',
        'updated_at',
        'created_at',
        'created_by',
        'updated_by',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>

    <?= yii\bootstrap4\Tabs::widget(
         [
             'id' => 'relation-tabs',
             'encodeLabels' => false,
             'items' => [
 [
    'label'   => '<b class=""># '.Html::encode($model->amount_id).'</b>',
    'content' => $this->blocks['\backend\modules\org\models\OrderAmount'],
    'active'  => true,
],
[
    'content' => $this->blocks['Order'],
    'label'   => '<small>Order <span class="badge badge-default">'. $model->getOrder()->count() . '</span></small>',
    'active'  => false,
],
 ]
         ]
    );
    ?></div>
