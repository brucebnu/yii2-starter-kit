<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
//use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\Organization $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('backend', 'Organization');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Organizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'org_id' => $model->org_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'View');
?>
<div class="giiant-crud organization-view">
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
            [ 'update', 'org_id' => $model->org_id],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<i class="fa fa-copy"></i> ' . Yii::t('backend', 'Copy'),
            ['create', 'org_id' => $model->org_id, 'Organization'=>$copyParams],
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

    <?php $this->beginBlock('\backend\modules\org\models\Organization'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'org_parent_id',
        'created_id',
        'sort',
        'country',
            [
                'attribute'=>'status',
                'value'=>\backend\modules\org\models\Organization::getStatusValueLabel($model->status),
            ],
        'title',
        'address',
        'inland_phone',
        'foreign_phone',
        'email:email',
        'home_site',
        'school_logo_src',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<i class="fa fa-trash"></i> ' . Yii::t('backend', 'Delete'), ['delete', 'org_id' => $model->org_id],
    [
        'class' => 'btn btn-danger',
        'data-confirm' => '' . Yii::t('backend', 'Are you sure to delete this item?') . '',
        'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Courses'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' Courses',
            ['course/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' Course',
            ['course/create', 'Course' => ['org_id' => $model->org_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-Courses', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Courses ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getCourses(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-courses',
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
        $params[0] = 'course' . '/' . $action;
        $params['Course'] = ['org_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'course'
],
        'course_id',
        'regulation',
        'title',
        'descript',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('Dormitories'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' Dormitories',
            ['dormitory/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' Dormitory',
            ['dormitory/create', 'Dormitory' => ['org_id' => $model->org_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-Dormitories', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Dormitories ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getDormitories(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-dormitories',
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
        $params[0] = 'dormitory' . '/' . $action;
        $params['Dormitory'] = ['org_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'dormitory'
],
        'dormitory_id',
        'dormitory_type',
        'period_week',
        'started_at',
        'ended_at',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('Orders'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' Orders',
            ['order/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' Order',
            ['order/create', 'Order' => ['org_id' => $model->org_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-Orders', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-Orders ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getOrders(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-orders',
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
        $params['Order'] = ['org_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'order'
],
        'order_id',
        'user_id',
        'created_by',
        'updated_at',
        'created_at',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('UserCourses'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' User Courses',
            ['user-course/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' User Course',
            ['user-course/create', 'UserCourse' => ['user_id' => $model->org_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-UserCourses', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-UserCourses ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getUserCourses(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-usercourses',
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
        $params[0] = 'user-course' . '/' . $action;
        $params['UserCourse'] = ['user_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-course'
],
        'org_user_course_id',
        'org_id',
        'course_id',
        'period_week',
        'started_at',
        'ended_at',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('UserDormitories'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' User Dormitories',
            ['user-dormitory/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' User Dormitory',
            ['user-dormitory/create', 'UserDormitory' => ['org_id' => $model->org_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-UserDormitories', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-UserDormitories ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getUserDormitories(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-userdormitories',
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
        $params[0] = 'user-dormitory' . '/' . $action;
        $params['UserDormitory'] = ['org_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-dormitory'
],
        'user_dormitory_id',
        'user_id',
        'dormitory_id',
        'period_week',
        'started_at',
        'ended_at',
        'created_at',
        'updated_at',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('UserFlights'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' User Flights',
            ['user-flight/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' User Flight',
            ['user-flight/create', 'UserFlight' => ['org_id' => $model->org_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-UserFlights', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-UserFlights ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getUserFlights(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-userflights',
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
        $params[0] = 'user-flight' . '/' . $action;
        $params['UserFlight'] = ['org_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-flight'
],
        'org_user_flight_id',
        'user_id',
        'arrival_flight',
        'arrival_datetime',
        'departure_flight',
        'departure_datetime',
        'pickup_special_request:ntext',
        'visa_expiry_date',
        'travel_insurance',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('UserToOrgs'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' User To Orgs',
            ['user-to-org/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' User To Org',
            ['user-to-org/create', 'UserToOrg' => ['org_id' => $model->org_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-UserToOrgs', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-UserToOrgs ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getUserToOrgs(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-usertoorgs',
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
        $params[0] = 'user-to-org' . '/' . $action;
        $params['UserToOrg'] = ['org_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-to-org'
],
        'user_to_ort_id',
        'user_id',
        'org_title',
        'role_name',
			[
                'attribute'=>'status',
                'value' => function ($model) {
                    return \backend\modules\org\models\Organization::getStatusValueLabel($model->status);
                }    
            ]        ,
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
    'label'   => '<b class=""># '.Html::encode($model->org_id).'</b>',
    'content' => $this->blocks['\backend\modules\org\models\Organization'],
    'active'  => true,
],
[
    'content' => $this->blocks['Courses'],
    'label'   => '<small>Courses <span class="badge badge-default">'. $model->getCourses()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['Dormitories'],
    'label'   => '<small>Dormitories <span class="badge badge-default">'. $model->getDormitories()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['Orders'],
    'label'   => '<small>Orders <span class="badge badge-default">'. $model->getOrders()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['UserCourses'],
    'label'   => '<small>User Courses <span class="badge badge-default">'. $model->getUserCourses()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['UserDormitories'],
    'label'   => '<small>User Dormitories <span class="badge badge-default">'. $model->getUserDormitories()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['UserFlights'],
    'label'   => '<small>User Flights <span class="badge badge-default">'. $model->getUserFlights()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['UserToOrgs'],
    'label'   => '<small>User To Orgs <span class="badge badge-default">'. $model->getUserToOrgs()->count() . '</span></small>',
    'active'  => false,
],
 ]
         ]
    );
    ?></div>
