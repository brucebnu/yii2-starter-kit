<?php

use common\grid\EnumColumn;
use common\models\Article;
use common\models\ArticleCategory;
use trntv\yii\datetime\DateTimeWidget;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;

/**
 * @var $this         yii\web\View
 * @var $searchModel  backend\modules\content\models\search\ArticleSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

$this->title = Yii::t('backend', 'Articles');

$this->params['breadcrumbs'][] = $this->title;

?>

<p>
    <?php echo Html::a(
        Yii::t('backend', 'Create {modelClass}', ['modelClass' => 'Article']),
        ['create'],
        ['class' => 'btn btn-success']) ?>
</p>

<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'options' => [
        'class' => 'grid-view table-responsive',
    ],
    'columns' => [
        [
            'attribute' => 'id',
            'options' => ['style' => 'width: 5%'],
        ],
        [
            'attribute' => 'slug',
            'options' => ['style' => 'width: 15%'],
        ],
        [
            'attribute' => 'title',
            'value' => function ($model) {
                return Html::a($model->title, ['update', 'id' => $model->id]);
            },
            'format' => 'raw',
        ],
        [
            'attribute' => 'category_id',
            'options' => ['style' => 'width: 10%'],
            'value' => function ($model) {
                return $model->category ? $model->category->title : null;
            },
            'filter' => ArrayHelper::map(ArticleCategory::find()->all(), 'id', 'title'),
        ],
        [
            'attribute' => 'created_by',
            'options' => ['style' => 'width: 10%'],
            'value' => function ($model) {
                return $model->author->username;
            },
        ],
        [
            'class' => EnumColumn::class,
            'attribute' => 'status',
            'options' => ['style' => 'width: 10%'],
            'enum' => Article::statuses(),
            'filter' => Article::statuses(),
        ],
        'published_at:datetime',
        'created_at:datetime',
        /*
        [
            'attribute' => 'published_at',
            'options' => ['style' => 'width: 10%'],
            'format' => 'datetime',
            'filter' => DateTimeWidget::widget([
                'model' => $searchModel,
                'attribute' => 'published_at',
                'phpDatetimeFormat' => 'dd.MM.yyyy',
                'momentDatetimeFormat' => 'DD.MM.YYYY',
                'clientEvents' => [
                    'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")'),
                ],
            ]),
        ],
        [
            'attribute' => 'created_at',
            'options' => ['style' => 'width: 10%'],
            'format' => 'datetime',
            'filter' => DateTimeWidget::widget([
                'model' => $searchModel,
                'attribute' => 'created_at',
                'phpDatetimeFormat' => 'dd.MM.yyyy',
                'momentDatetimeFormat' => 'DD.MM.YYYY',
                'clientEvents' => [
                    'dp.change' => new JsExpression('(e) => $(e.target).find("input").trigger("change.yiiGridView")'),
                ],
            ]),
        ],
        */
        [
            'class' => yii\grid\ActionColumn::class,
            'options' => ['style' => 'width: 8%'],
            'template' => '{view} {update} {delete}',
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
        ],
    ],
]); ?>
