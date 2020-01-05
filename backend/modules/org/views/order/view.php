<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
//use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\Order $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('backend', 'Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->order_id, 'url' => ['view', 'order_id' => $model->order_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'View');
?>
<div class="giiant-crud order-view">
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
            [ 'update', 'order_id' => $model->order_id],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<i class="fa fa-copy"></i> ' . Yii::t('backend', 'Copy'),
            ['create', 'order_id' => $model->order_id, 'Order'=>$copyParams],
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

    <?php $this->beginBlock('\backend\modules\org\models\Order'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'org_id',
        'user_id',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<i class="fa fa-trash"></i> ' . Yii::t('backend', 'Delete'), ['delete', 'order_id' => $model->order_id],
    [
        'class' => 'btn btn-danger',
        'data-confirm' => '' . Yii::t('backend', 'Are you sure to delete this item?') . '',
        'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Org'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' Org',
            ['/crud/organization/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' Org',
            ['/crud/organization/create', 'Organization' => ['org_id' => $model->order_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-Org', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Org ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getOrg(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-org',
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
        $params[0] = '/crud/organization' . '/' . $action;
        $params['Organization'] = ['org_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => '/crud/organization'
],
        'org_parent_id',
        'title',
        'home_site',
        'school_logo_src',
        'country',
        'address',
        'inland_phone',
        'foreign_phone',
        'email:email',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('OrderAmounts'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' Order Amounts',
            ['/crud/order-amount/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' Order Amount',
            ['/crud/order-amount/create', 'OrderAmount' => ['order_id' => $model->order_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-OrderAmounts', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-OrderAmounts ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getOrderAmounts(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-orderamounts',
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
        $params[0] = '/crud/order-amount' . '/' . $action;
        $params['OrderAmount'] = ['order_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => '/crud/order-amount'
],
        'amount_id',
        'currency_type',
        'transaction_price',
        'payment_type',
        'pay_order_src',
        'created_at',
        'update_at',
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
    'label'   => '<b class=""># '.Html::encode($model->order_id).'</b>',
    'content' => $this->blocks['\backend\modules\org\models\Order'],
    'active'  => true,
],
[
    'content' => $this->blocks['Org'],
    'label'   => '<small>Org <span class="badge badge-default">'. $model->getOrg()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['OrderAmounts'],
    'label'   => '<small>Order Amounts <span class="badge badge-default">'. $model->getOrderAmounts()->count() . '</span></small>',
    'active'  => false,
],
 ]
         ]
    );
    ?></div>
