<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
//use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserAddress $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('backend', 'User Address');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Addresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->user_address_id, 'url' => ['view', 'user_address_id' => $model->user_address_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'View');
?>
<div class="giiant-crud user-address-view">
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
            [ 'update', 'user_address_id' => $model->user_address_id],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<i class="fa fa-copy"></i> ' . Yii::t('backend', 'Copy'),
            ['create', 'user_address_id' => $model->user_address_id, 'UserAddress'=>$copyParams],
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

    <?php $this->beginBlock('\backend\modules\org\models\UserAddress'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'user_id',
        'detailed',
        'consignee',
            [
                'attribute'=>'gender',
                'value'=>\backend\modules\org\models\UserAddress::getGenderValueLabel($model->gender),
            ],
        'country',
        'province',
        'city',
        'region',
        'town',
        'sort',
            [
                'attribute'=>'status',
                'value'=>\backend\modules\org\models\UserAddress::getStatusValueLabel($model->status),
            ],
        'longitude',
        'latitude',
        'email:email',
        'alias',
        'phone_number',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<i class="fa fa-trash"></i> ' . Yii::t('backend', 'Delete'), ['delete', 'user_address_id' => $model->user_address_id],
    [
        'class' => 'btn btn-danger',
        'data-confirm' => '' . Yii::t('backend', 'Are you sure to delete this item?') . '',
        'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('UserExpresses'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' User Expresses',
            ['user-express/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' User Express',
            ['user-express/create', 'UserExpress' => ['user_address_id' => $model->user_address_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-UserExpresses', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-UserExpresses ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getUserExpresses(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-userexpresses',
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
        $params[0] = 'user-express' . '/' . $action;
        $params['UserExpress'] = ['user_address_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-express'
],
        'express_id',
        'user_id',
        'express_title',
        'express_no',
        'express_info_url:url',
        'express_type',
        'completion_time:datetime',
        'updated_at',
        'created_at',
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
    'label'   => '<b class=""># '.Html::encode($model->user_address_id).'</b>',
    'content' => $this->blocks['\backend\modules\org\models\UserAddress'],
    'active'  => true,
],
[
    'content' => $this->blocks['UserExpresses'],
    'label'   => '<small>User Expresses <span class="badge badge-default">'. $model->getUserExpresses()->count() . '</span></small>',
    'active'  => false,
],
 ]
         ]
    );
    ?></div>
