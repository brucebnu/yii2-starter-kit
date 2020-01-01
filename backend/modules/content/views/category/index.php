<?php

use common\grid\EnumColumn;
use common\models\ArticleCategory;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this         yii\web\View
 * @var $searchModel  backend\modules\content\models\search\ArticleCategorySearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        ArticleCategory
 * @var $categories   common\models\ArticleCategory[]
 */

$this->title = Yii::t('backend', 'Article Categories');

$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card collapsed-card">
    <div class="card-header bg-success">
        <h3 class="card-title"><i class="fas fa-edit"></i> <?php echo Yii::t('backend', 'Create {modelClass}', ['modelClass' => 'Article Category']) ?>
            <small class="text-white m-md-1">请按要求填写空格</small>
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                    title="Collapse"><i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove"><i
                        class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <?php echo $this->render('_form', [
            'model' => $model,
            'categories' => $categories,
        ]) ?>
    </div>
    <div class="card-footer">
        Footer
    </div>
</div>

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
            'class' => EnumColumn::class,
            'attribute' => 'status',
            'options' => ['style' => 'width: 10%'],
            'enum' => ArticleCategory::statuses(),
            'filter' => ArticleCategory::statuses(),
        ],
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
