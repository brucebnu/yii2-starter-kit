<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
//use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserExpress $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('backend', 'User Express');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Expresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->express_id, 'url' => ['view', 'express_id' => $model->express_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'View');
?>
<div class="giiant-crud user-express-view">
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
            [ 'update', 'express_id' => $model->express_id],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<i class="fa fa-copy"></i> ' . Yii::t('backend', 'Copy'),
            ['create', 'express_id' => $model->express_id, 'UserExpress'=>$copyParams],
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

    <?php $this->beginBlock('\backend\modules\org\models\UserExpress'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'user_id',
        'user_address_id',
        'completion_time:datetime',
            [
                'attribute'=>'express_type',
                'value'=>\backend\modules\org\models\UserExpress::getExpressTypeValueLabel($model->express_type),
            ],
        'express_title',
        'express_no',
        'express_info_url:url',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<i class="fa fa-trash"></i> ' . Yii::t('backend', 'Delete'), ['delete', 'express_id' => $model->express_id],
    [
        'class' => 'btn btn-danger',
        'data-confirm' => '' . Yii::t('backend', 'Are you sure to delete this item?') . '',
        'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('UserAddress'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' User Address',
            ['user-address/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' User Address',
            ['user-address/create', 'UserAddress' => ['user_address_id' => $model->express_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-UserAddress', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-UserAddress ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getUserAddress(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-useraddress',
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
        $params[0] = 'user-address' . '/' . $action;
        $params['UserAddress'] = ['user_address_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-address'
],
        'user_id',
        'country',
        'province',
        'city',
        'region',
        'town',
        'sort',
        'detailed',
        'consignee',
        'gender',
        'phone_number',
        'email:email',
        'longitude',
        'latitude',
        'alias',
        'status',
        'created_at',
        'updated_at',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('User'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' User',
            ['user-org/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' User',
            ['user-org/create', 'UserOrg' => ['user_id' => $model->express_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-User', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-User ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getUser(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-user',
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
        $params[0] = 'user-org' . '/' . $action;
        $params['UserOrg'] = ['user_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-org'
],
        'passport_no',
        'nationality',
        'passport_full_Name',
        'full_name',
        'nick_name',
        'gender',
        'birthday',
        'emergency_contact',
        'phone_calling_code',
        'phone',
        'phone_native_calling_code',
        'phone_native',
        'linked_training',
        'company_type',
        'company_title',
        'passport_info:ntext',
        'created_at',
        'updated_at',
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
    'label'   => '<b class=""># '.Html::encode($model->express_id).'</b>',
    'content' => $this->blocks['\backend\modules\org\models\UserExpress'],
    'active'  => true,
],
[
    'content' => $this->blocks['UserAddress'],
    'label'   => '<small>User Address <span class="badge badge-default">'. $model->getUserAddress()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['User'],
    'label'   => '<small>User <span class="badge badge-default">'. $model->getUser()->count() . '</span></small>',
    'active'  => false,
],
 ]
         ]
    );
    ?></div>
