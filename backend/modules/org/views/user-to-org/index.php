<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var backend\modules\org\models\search\UserToOrgSearch $searchModel
*/

$this->title = Yii::t('backend', 'User To Orgs');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
$actionColumnTemplateString = $actionColumnTemplate;
} else {
Yii::$app->view->params['pageButtons'] = Html::a('<span
        class="glyphicon glyphicon-plus"></span> ' . Yii::t('backend', 'New'), ['create'], ['class' => 'btn btn-success']);
$actionColumnTemplateString = "{view} {update} {delete}";
}
$actionColumnTemplateString = '
<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud user-to-org-index">

    <?php
//             echo $this->render('_search', ['model' =>$searchModel]);
        ?>

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <div class="clearfix crud-navigation">
                    <div class="float-left">
                <?= Html::a('<span class="fa fa-plus"></span> ' . Yii::t('backend', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
            </div>
                    <div class="float-right">
                                                                <?= 
            \yii\bootstrap4\ButtonDropdown::widget([
                'id' => 'giiant-relations',
                'encodeLabel' => false,
                'label' => '<span class="fa fa-paperclip"></span> ' . Yii::t('backend', 'Relations'),
                'dropdown' => [
                'options' => [
                'class' => 'dropdown-menu-right'
                ],
                'encodeLabels' => false,
                'items' => [
            [
                'url' => ['organization/index'],
                'label' => '<i class="fa fa-arrow-left"></i> ' . Yii::t('backend', 'Organization'),
            ],
                    
]
                ],
                'options' => [
                'class' => 'btn-default'
                ]
            ]);
            ?>
        </div>
    </div>

    <hr/>

    <div class="table-responsive">
        <?php
		echo GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
        'class' => yii\widgets\LinkPager::class,
        'firstPageLabel' => Yii::t('backend', 'First'),
        'lastPageLabel' => Yii::t('backend', 'Last'),
        ],
                    'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'headerRowOptions' => ['class'=>'x'],
        'columns' => [
                [
            'class' => yii\grid\ActionColumn::class,
            'template' => $actionColumnTemplateString,
            'buttons' => [
                'view' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('backend', 'View'),
                        'aria-label' => Yii::t('backend', 'View'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<i class="fa fa-eye"></i>', $url, $options);
                },
                'update' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('backend', 'Update'),
                        'aria-label' => Yii::t('backend', 'Update'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<i class="fa fa-edit"></i>', $url, $options);
                },
                'delete' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('backend', 'Delete'),
                        'aria-label' => Yii::t('backend', 'Delete'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<i class="fa fa-trash"></i>', $url, $options);
                }
            ],
            
            'urlCreator' => function($action, $model, $key, $index) {
                // using the column name as key, not mapping to 'id' like the standard generator
                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                return Url::toRoute($params);
            },
            'contentOptions' => ['nowrap'=>'nowrap']
        ],
			'org_id',
			'user_id',
			[
			                'attribute'=>'role_name',
			                'value' => function ($model) {
			                    return \backend\modules\org\models\UserToOrg::getRoleNameValueLabel($model->role_name);
			                }    
			            ],
			[
			                'attribute'=>'status',
			                'value' => function ($model) {
			                    return \backend\modules\org\models\UserToOrg::getStatusValueLabel($model->status);
			                }    
			            ],
			'org_title',
                ]
        ]); ?>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>


