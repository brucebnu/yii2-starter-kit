<?php

use common\grid\EnumColumn;
use common\models\User;
use trntv\yii\datetime\DateTimeWidget;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <p>
            <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
                'modelClass' => 'User',
            ]), ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => [
                'class' => 'grid-view table-responsive table table-striped table-bordered table-hover'
            ],
            'columns' => [
                [
                    'attribute' => 'id',
                    'options' => ['width' => '5%'],
                    'value' => function($model){
                        return $model->id;
                    }
                ],
                [
                    'attribute' => 'username',
                    'options' => ['width' => '5%'],
                    'value' => function($model){
                        return $model->username;
                    }
                ],
                'email:email',
                [
                    'attribute' => 'calling_code',
                    'options' => ['width' => '5%'],
                    'value' => function($model){
                        return $model->calling_code;
                    }
                ],
                [
                    'attribute' => 'phone_number',
                    'options' => ['width' => '8%'],
                    'value' => function($model){
                        return $model->phone_number;
                    }
                ],
                [
                    'class' => EnumColumn::class,
                    'attribute' => 'status',
                    'options' => ['width' => '5%'],
                    'enum' => User::statuses(),
                    'filter' => User::statuses()
                ],
                /*
                [
                    'attribute' => 'created_at',
                    'format' => 'datetime',
                    'filter' => DateTimeWidget::widget([
                        'model' => $searchModel,
                        'attribute' => 'created_at',
                        'phpDatetimeFormat' => 'dd.MM.yyyy',
                        'momentDatetimeFormat' => 'DD.MM.YYYY',
                        'clientEvents' => [
                            'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")')
                        ],
                    ])
                ],
                [
                    'attribute' => 'logged_at',
                    'format' => 'datetime',
                    'filter' => DateTimeWidget::widget([
                        'model' => $searchModel,
                        'attribute' => 'logged_at',
                        'phpDatetimeFormat' => 'dd.MM.yyyy',
                        'momentDatetimeFormat' => 'DD.MM.YYYY',
                        'clientEvents' => [
                            'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")')
                        ],
                    ])
                ],
                */
                'logged_at:datetime',
                'created_at:datetime',
                'updated_at:datetime',
                [
                    'class'     => yii\grid\ActionColumn::class,
                    'template'  => '{register} {view} {update}',
                    'options'   => ['width' => '15%'],
                    'buttons'   => [
                        'register' => function ($url, $model, $key) {
                            // dd($url, $model, $key);
                            $options = [
                                'title' => Yii::t('backend', 'Register'),
                                'aria-label' => Yii::t('backend', 'Register'),
                                'data-pjax' => '0',
                            ];
                            return Html::a( '<i class="fa fa-sign-in" aria-hidden="true"></i> Register', $url, $options);
                        },
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
                    'urlCreator' => function ($action, $model, $key, $index) {
                        // using the column name as key, not mapping to 'id' like the standard generator
                        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                        $params['user_id'] = $model->id;
                        $params['org_id'] = '1';

                        if ($action === 'register') {
                            $params[0] = 'org/user-org' . '/' . $action;
                            //dd($params);
                            return Url::toRoute($params);
                        }else{
                            $params[0] = 'user' . '/' . $action;
                            return Url::toRoute($params);
                        }

                    },
                    'contentOptions' => ['nowrap' => 'nowrap'],
                    'visibleButtons' => [
                        'login' => Yii::$app->user->can('administrator')
                    ]

                ],
            ],
        ]);
        ?>
    </div>
</div>
