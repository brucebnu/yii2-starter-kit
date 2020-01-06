<?php

use backend\modules\system\models\SystemLog;
use bnu\widgets\adminlte3\Menu;
use common\models\TimelineEvent;
use yii\helpers\Url;

$avatar = Yii::$app->params['AdminlteWebUrl'] . '/img/user2-160x160.jpg';
if(!Yii::$app->user->isGuest){
    $avatar =  Yii::$app->user->identity->userProfile->getAvatar(Yii::$app->params['AdminlteWebUrl'] . '/img/user2-160x160.jpg');
}

// dd( Yii::$app->controller->module->id, Yii::$app->controller->action->id, Yii::$app->controller->id );

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo Yii::$app->urlManagerFrontend->createAbsoluteUrl('/') ?>" class="brand-link">
        <img src="<?= Yii::$app->params['AdminlteWebUrl'] ?>/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8"/>
        <span class="brand-text font-weight-light"><?php echo Yii::$app->name ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $avatar; ?>"
                     class="img-circle elevation-2" alt="User Image"/>

            </div>
            <div class="info">
                <a href="<?php echo Url::to(['/sign-in/profile']) ?>"
                   class="d-block"><?php echo Yii::t('backend', 'Hello, {username}', ['username' => Yii::$app->user->identity->getPublicIdentity() ]) ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php
            echo Menu::widget([
                'encodeLabels' => true,
                'items' => [
                    # Main
//                    [
//                        'label'  => Yii::t('backend', 'Main'),
//                        //'icon' => 'nav-icon fa fa-address-book-o',
//                        'options' => ['class' => 'nav-header'],
//                        'url'    => '#Main'
//                    ],
                    [
                        'label' => Yii::t('backend', 'Timeline'),
                        'url' => ['/timeline-event/index'],
                        'icon' => 'nav-icon far fa-calendar-alt',
                        'badge' => TimelineEvent::find()->today()->count(),
                        'badgeBgClass' => 'badge badge-warning navbar-badge',
                    ],
                    [
                        'label' => Yii::t('backend', 'Users'),
                        'icon' => 'nav-icon fa fa-user-plus',
                        'url' => ['/user/index'],
                        'active' => Yii::$app->controller->id === 'user',
                        'visible' => Yii::$app->user->can('administrator'),
                    ],

                    # 机构
                    [
                        'label'  => Yii::t('backend', 'Organization'),
                        //'icon' => 'nav-icon fa fa-address-book-o',
                        'options' => ['class' => 'nav-header'],
                        'url'    => '#Organization'
                    ],
                    [
                        'label' => Yii::t('backend', '机构'),
                        'icon' => 'nav-icon far fa-calendar-alt',
                        'url' => ['/org/organization/index'],
                        'badge' => TimelineEvent::find()->today()->count(),
                        'badgeBgClass' => 'badge badge-danger navbar-badge',
                    ],
                    [
                        'label' => Yii::t('backend', '人员管理'),
                        'icon' => 'nav-icon far fa-circle nav-icon',
                        'url' => ['/org/user-org/index'],
                        'active' => Yii::$app->controller->id === 'user-org',
                        'visible' => Yii::$app->user->can('administrator'),
                    ],
                    [
                        'label' => Yii::t('backend', '人员排期'),
                        'icon' => 'nav-icon far fa-circle nav-icon',
                        'url' => ['/org/user-org/scheduler'],
                        'active' => Yii::$app->controller->id === 'user-org' && Yii::$app->controller->action->id === 'scheduler',
                        'visible' => Yii::$app->user->can('administrator'),
                    ],
                    [
                        'label' => Yii::t('backend', '公寓宿舍管理'),
                        'icon' => 'nav-icon far fa-circle nav-icon',
                        'url' => ['/org/dormitory/index'],
                        'active' => Yii::$app->controller->id === 'dormitory' && Yii::$app->controller->action->id === 'index',
                        'visible' => Yii::$app->user->can('administrator'),
                    ],
                    [
                        'label' => Yii::t('backend', '公寓排期'),
                        'icon' => 'nav-icon far fa-circle nav-icon',
                        'url' => ['/org/dormitory/scheduler'],
                        'active' => Yii::$app->controller->id === 'dormitory' && Yii::$app->controller->action->id === 'scheduler',
                        'visible' => Yii::$app->user->can('administrator'),
                    ],

                    # 财务管理
                    [
                        'label'  => Yii::t('backend', 'Financial Management'),
                        //'icon' => 'nav-icon fa fa-address-book-o',
                        'options' => ['class' => 'nav-header'],
                        'url'    => '#Financial Management'
                    ],
                    [
                        'label' => Yii::t('backend', '订单'),
                        'icon' => 'nav-icon far fa-circle nav-icon',
                        'url' => ['/org/order/index'],
                        'active' => Yii::$app->controller->id === 'order',
                        'visible' => Yii::$app->user->can('administrator'),
                    ],
                    [
                        'label' => Yii::t('backend', '采购'),
                        'icon' => 'nav-icon far fa-circle nav-icon',
                        'url' => ['/org/purchase-info/index'],
                        'active' => Yii::$app->controller->id === 'purchase-info' && Yii::$app->controller->action->id === 'index',
                        'visible' => Yii::$app->user->can('administrator'),
                    ],

                    # Content
                    [
                        'label' => Yii::t('backend', 'Content'),
                        'options' => ['class' => 'nav-header'],
                        'url' => '#Content'
                    ],
                    [
                        'label' => Yii::t('backend', 'Static pages'),
                        'url' => ['/content/page/index'],
                        'icon' => 'nav-icon fa fa-edit',
                        'active' => Yii::$app->controller->id === 'page',
                    ],
                    [
                        'label' => Yii::t('backend', 'Articles'),
                        'url' => '#',
                        'icon' => 'nav-icon fa fa-edit',
                        'active' => 'content' === Yii::$app->controller->module->id &&
                            ('article' === Yii::$app->controller->id || 'category' === Yii::$app->controller->id),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Articles'),
                                'url' => ['/content/article/index'],
                                'icon' => 'nav-icon fa fa-file',
                                'active' => Yii::$app->controller->id === 'article',
                            ],
                            [
                                'label' => Yii::t('backend', 'Categories'),
                                'url' => ['/content/category/index'],
                                'icon' => 'nav-icon fa fa-globe',
                                'active' => Yii::$app->controller->id === 'category',
                            ],
                        ],
                    ],

                    [
                        'label' => Yii::t('backend', 'Translation'),
                        'url' => '#',
                        'icon' => 'nav-icon fa fa-language',
                        'active' => Yii::$app->controller->module->id === 'translation',
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Translation'),
                                'url' => ['/translation/default/index'],
                                'icon' => 'nav-icon fa fa-language',
                                'active' => Yii::$app->controller->id === 'index',
                            ]
                        ],
                    ],

                    [
                        'label' => Yii::t('backend', 'Widgets'),
                        'url' => '#',
                        'icon' => 'nav-icon fa fa-code',
                        'active' => Yii::$app->controller->module->id === 'widget',
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Text Blocks'),
                                'url' => ['/widget/text/index'],
                                'icon' => 'nav-icon fa fa-globe',
                                'active' => Yii::$app->controller->id === 'text',
                            ],
                            [
                                'label' => Yii::t('backend', 'Menu'),
                                'url' => ['/widget/menu/index'],
                                'icon' => 'nav-icon fa fa-globe',
                                'active' => Yii::$app->controller->id === 'menu',
                            ],
                            [
                                'label' => Yii::t('backend', 'Carousel'),
                                'url' => ['/widget/carousel/index'],
                                'icon' => 'nav-icon fa fa-globe',
                                'active' => in_array(Yii::$app->controller->id, ['carousel', 'carousel-item']),
                            ],
                        ],
                    ],


                    [
                        'label' => Yii::t('backend', 'Translation'),
                        'options' => ['class' => 'header'],
                        'visible' => Yii::$app->components["i18n"]["translations"]['*']['class'] === \yii\i18n\DbMessageSource::class,
                    ],
                    [
                        'label' => Yii::t('backend', 'Translation'),
                        'url'   => ['/translation/default/index'],
                        'icon'  => 'nav-icon fa fa-language',
                        'active' => (Yii::$app->controller->module->id == 'translation'),
                        'visible' => Yii::$app->components["i18n"]["translations"]['*']['class'] === \yii\i18n\DbMessageSource::class,
                    ],
                    [
                        'label'   => Yii::t('backend', 'System'),
                        'options' => ['class' => 'nav-header'],
                        'url'     => '#',
                    ],
                    [
                        'label' => Yii::t('backend', 'RBAC Rules'),
                        'url' => '#',
                        'icon' => 'nav-icon fa fa-flag',
                        'active' => in_array(Yii::$app->controller->id, ['rbac-auth-assignment', 'rbac-auth-item', 'rbac-auth-item-child', 'rbac-auth-rule']),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Auth Assignment'),
                                'url' => ['/rbac/rbac-auth-assignment/index'],
                                'icon' => 'nav-icon fa fa-globe',
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Items'),
                                'url' => ['/rbac/rbac-auth-item/index'],
                                'icon' => 'nav-icon fa fa-globe',
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Item Child'),
                                'url' => ['/rbac/rbac-auth-item-child/index'],
                                'icon' => 'nav-icon fa fa-globe',
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Rules'),
                                'url' => ['/rbac/rbac-auth-rule/index'],
                                'icon' => 'nav-icon fa fa-globe',
                            ],
                        ],
                    ],
                    [
                        'label' => Yii::t('backend', 'Files'),
                        'url' => '#',
                        'icon' => 'nav-icon fa fa-th-large',
                        'active' => (Yii::$app->controller->module->id == 'file'),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'Storage'),
                                'url' => ['/file/storage/index'],
                                'icon' => 'nav-icon fa fa-database',
                                'active' => (Yii::$app->controller->id == 'storage'),
                            ],
                            [
                                'label' => Yii::t('backend', 'Manager'),
                                'url' => ['/file/manager/index'],
                                'icon' => 'nav-icon fa fa-globe',
                                'active' => (Yii::$app->controller->id == 'manager'),
                            ],
                        ],
                    ],
                    [
                        'label' => Yii::t('backend', 'Key-Value Storage'),
                        'url' => ['/system/key-storage/index'],
                        'icon' => 'nav-icon fa fa-globe',
                        'active' => (Yii::$app->controller->id == 'key-storage'),
                    ],
                    [
                        'label' => Yii::t('backend', 'Cache'),
                        'url' => ['/system/cache/index'],
                        'icon' => 'far fa-circle nav-icon',
                    ],
                    [
                        'label' => Yii::t('backend', 'System Information'),
                        'url' => ['/system/information/index'],
                        'icon' => 'far fa-circle nav-icon',
                    ],
                    [
                        'label' => Yii::t('backend', 'Logs'),
                        'url' => ['/system/log/index'],
                        'icon' => 'far fa-circle nav-icon',
                        'badge' => SystemLog::find()->count(),
                        'badgeBgClass' => 'badge badge-danger navbar-badge',
                    ],
                    /*
                    [
                        'label' => 'User',
                        'icon' => 'nav-icon fa fa-users',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'List',
                                'icon' => 'fa fa-users',
                                'url' => ['/user/admin']
                            ],
                            [
                                'label' => 'Add',
                                'icon' => 'nav-icon fa fa-user-plus',
                                'url' => ['/user/admin/create']
                            ],
                        ],
                    ],
                    */
                ],
            ])
            ?>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>