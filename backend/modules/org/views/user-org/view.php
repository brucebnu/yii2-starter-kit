<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
//use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var backend\modules\org\models\UserOrg $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('backend', 'User Org');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User Orgs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->user_id, 'url' => ['view', 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'View');
?>
<div class="giiant-crud user-org-view">
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
            [ 'update', 'user_id' => $model->user_id],
            ['class' => 'btn btn-info']) ?>

            <?= Html::a(
            '<i class="fa fa-copy"></i> ' . Yii::t('backend', 'Copy'),
            ['create', 'user_id' => $model->user_id, 'UserOrg'=>$copyParams],
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

    <?php $this->beginBlock('\backend\modules\org\models\UserOrg'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'user_id',
        'phone',
        'phone_native',
            [
                'attribute'=>'gender',
                'value'=>\backend\modules\org\models\UserOrg::getGenderValueLabel($model->gender),
            ],
            [
                'attribute'=>'linked_training',
                'value'=>\backend\modules\org\models\UserOrg::getLinkedTrainingValueLabel($model->linked_training),
            ],
            [
                'attribute'=>'company_type',
                'value'=>\backend\modules\org\models\UserOrg::getCompanyTypeValueLabel($model->company_type),
            ],
        'passport_info:ntext',
        'birthday',
        'passport_no',
        'full_name',
        'nick_name',
        'emergency_contact',
        'company_title',
        'nationality',
        'passport_full_Name',
        'phone_calling_code',
        'phone_native_calling_code',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<i class="fa fa-trash"></i> ' . Yii::t('backend', 'Delete'), ['delete', 'user_id' => $model->user_id],
    [
        'class' => 'btn btn-danger',
        'data-confirm' => '' . Yii::t('backend', 'Are you sure to delete this item?') . '',
        'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('UserAddresses'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' User Addresses',
            ['user-address/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' User Address',
            ['user-address/create', 'UserAddress' => ['user_id' => $model->user_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-UserAddresses', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-UserAddresses ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getUserAddresses(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-useraddresses',
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
        $params['UserAddress'] = ['user_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-address'
],
        'user_address_id',
        'country',
        'province',
        'city',
        'region',
        'town',
        'sort',
        'detailed',
        'consignee',
			[
                'attribute'=>'gender',
                'value' => function ($model) {
                    return \backend\modules\org\models\UserOrg::getGenderValueLabel($model->gender);
                }    
            ]        ,
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
            ['user-course/create', 'UserCourse' => ['user_id' => $model->user_id]],
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
            ['user-dormitory/create', 'UserDormitory' => ['user_id' => $model->user_id]],
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
        $params['UserDormitory'] = ['user_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-dormitory'
],
        'user_dormitory_id',
        'org_id',
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
            ['user-express/create', 'UserExpress' => ['user_id' => $model->user_id]],
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
        $params['UserExpress'] = ['user_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-express'
],
        'express_id',
        'user_address_id',
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


<?php $this->beginBlock('UserFileStorages'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' User File Storages',
            ['user-file-storage/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' User File Storage',
            ['user-file-storage/create', 'UserFileStorage' => ['user_id' => $model->user_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-UserFileStorages', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-UserFileStorages ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getUserFileStorages(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-userfilestorages',
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
        $params[0] = 'user-file-storage' . '/' . $action;
        $params['UserFileStorage'] = ['user_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-file-storage'
],
        'user_file_storage_id',
        'component',
        'base_url:url',
        'path',
        'type',
        'size',
        'name',
        'upload_ip',
        'hash',
        'status',
        'longitude',
        'latitude',
        'area',
        'bucket',
        'created_at',
        'created_by',
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
            ['user-flight/create', 'UserFlight' => ['user_id' => $model->user_id]],
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
        $params['UserFlight'] = ['user_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-flight'
],
        'user_org_flight_id',
        'org_id',
        'arrival_flight',
        'arrival_datetime',
        'departure_flight',
        'departure_datetime',
        'pickup_special_request:ntext',
        'visa_expiry_date',
        'travel_insurance',
        'address',
]
])
 . '</div>' 
?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


<?php $this->beginBlock('UserToAgencies'); ?>
<div style='position: relative'>
<div style='position:absolute; right: 0px; top: -25px;'>
  <?= Html::a(
            '<span class="fa fa-list-ul"></span> ' . Yii::t('backend', 'List All') . ' User To Agencies',
            ['user-to-agency/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New') . ' User To Agency',
            ['user-to-agency/create', 'UserToAgency' => ['user_id' => $model->user_id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div>
</div>
<?php Pjax::begin(['id'=>'pjax-UserToAgencies', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-UserToAgencies ul.pagination a, th a']) ?>
<?=
 '<div class="table-responsive">'
 . \yii\grid\GridView::widget([
    'layout' => '{summary}<div class="text-center">{pager}</div>{items}<div class="text-center">{pager}</div>',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getUserToAgencies(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam'=>'page-usertoagencies',
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
        $params[0] = 'user-to-agency' . '/' . $action;
        $params['UserToAgency'] = ['user_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-to-agency'
],
        'user_to_agency',
        'agency_name',
        'agency_contact',
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
            ['user-to-org/create', 'UserToOrg' => ['user_id' => $model->user_id]],
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
        $params['UserToOrg'] = ['user_id' => $model->primaryKey()[0]];
        return $params;
    },
    'buttons'    => [
        
    ],
    'controller' => 'user-to-org'
],
        'user_to_ort_id',
        'org_id',
        'org_title',
        'role_name',
        'status',
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
    'label'   => '<b class=""># '.Html::encode($model->user_id).'</b>',
    'content' => $this->blocks['\backend\modules\org\models\UserOrg'],
    'active'  => true,
],
[
    'content' => $this->blocks['UserAddresses'],
    'label'   => '<small>User Addresses <span class="badge badge-default">'. $model->getUserAddresses()->count() . '</span></small>',
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
    'content' => $this->blocks['UserExpresses'],
    'label'   => '<small>User Expresses <span class="badge badge-default">'. $model->getUserExpresses()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['UserFileStorages'],
    'label'   => '<small>User File Storages <span class="badge badge-default">'. $model->getUserFileStorages()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['UserFlights'],
    'label'   => '<small>User Flights <span class="badge badge-default">'. $model->getUserFlights()->count() . '</span></small>',
    'active'  => false,
],
[
    'content' => $this->blocks['UserToAgencies'],
    'label'   => '<small>User To Agencies <span class="badge badge-default">'. $model->getUserToAgencies()->count() . '</span></small>',
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
