<?php

use common\grid\EnumColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var $this                  yii\web\View
 * @var $model                 common\models\WidgetCarousel
 * @var $carouselItemsProvider yii\data\ArrayDataProvider
 */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
        'modelClass' => 'Widget Carousel',
    ]) . ' ' . $model->key;

$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Widget Carousels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');

?>

<div class="panel panel-default">
    <div class="panel-body">
        <?php echo $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>

<p>
    <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
        'modelClass' => 'Widget Carousel Item',
    ]), ['carousel-item/create', 'carousel_id' => $model->id], ['class' => 'btn btn-success']) ?>
</p>

<?php echo GridView::widget([
    'dataProvider' => $carouselItemsProvider,
    'options' => [
        'class' => 'grid-view table-responsive',
    ],
    'columns' => [
        [
            'attribute' => 'order',
            'options' => ['style' => 'width: 5%'],
        ],
        'path',
        'url:url',
        [
            'attribute' => 'caption',
            'options' => ['style' => 'width: 20%'],
            'format' => 'html',
        ],
        [
            'class' => EnumColumn::class,
            'attribute' => 'status',
            'options' => ['style' => 'width: 10%'],
            'enum' => [
                Yii::t('backend', 'Disabled'),
                Yii::t('backend', 'Enabled'),
            ],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'options' => ['style' => 'width: 5%'],
            'controller' => '/widget/carousel-item',
            'template' => '{update} {delete}',
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
