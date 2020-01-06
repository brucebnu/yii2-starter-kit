<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
//use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\PurchaseInfo $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('backend', 'Purchase Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Purchase Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->purchase_invoice_id, 'url' => ['view', 'purchase_invoice_id' => $model->purchase_invoice_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'View');
?>
<div class="giiant-crud purchase-info-view">
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
            [ 'update', 'purchase_invoice_id' => $model->purchase_invoice_id],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<i class="fa fa-copy"></i> ' . Yii::t('backend', 'Copy'),
            ['create', 'purchase_invoice_id' => $model->purchase_invoice_id, 'PurchaseInfo'=>$copyParams],
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

    <?php $this->beginBlock('\backend\modules\org\models\PurchaseInfo'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'pubchase_invoice_price',
        'org_id',
        'pubchase_tag',
        'pubchase_invoice_src',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<i class="fa fa-trash"></i> ' . Yii::t('backend', 'Delete'), ['delete', 'purchase_invoice_id' => $model->purchase_invoice_id],
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
            ['organization/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' Org',
            ['organization/create', 'Organization' => ['org_id' => $model->purchase_invoice_id]],
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
        $params[0] = 'organization' . '/' . $action;
        $params['Organization'] = ['org_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'organization'
],
        'org_parent_id',
        'title',
        'home_site',
        'country',
        'address',
        'inland_phone',
        'foreign_phone',
        'email:email',
        'created_id',
        'status',
        'school_logo_src',
        'sort',
        'created_at',
        'updated_at',
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
    'label'   => '<b class=""># '.Html::encode($model->purchase_invoice_id).'</b>',
    'content' => $this->blocks['\backend\modules\org\models\PurchaseInfo'],
    'active'  => true,
],
[
    'content' => $this->blocks['Org'],
    'label'   => '<small>Org <span class="badge badge-default">'. $model->getOrg()->count() . '</span></small>',
    'active'  => false,
],
 ]
         ]
    );
    ?></div>
