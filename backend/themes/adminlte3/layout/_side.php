<?php

use backend\modules\system\models\SystemLog;
use backend\widgets\adminlte3\Menu;
use common\models\TimelineEvent;
use yii\helpers\Url;

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
                <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar(Yii::$app->params['AdminlteWebUrl'] . '/img/user2-160x160.jpg'); ?>"
                     class="img-circle elevation-2" alt="User Image"/>

            </div>
            <div class="info">
                <a href="<?php echo Url::to(['/sign-in/profile']) ?>"
                   class="d-block"><?php echo Yii::t('backend', 'Hello, {username}', ['username' => Yii::$app->user->identity->getPublicIdentity()]) ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?=
            Menu::widget([
                'encodeLabels' => true,
                'items' => [
                    # Main
                    [
                        'label'  => Yii::t('backend', 'Main'),
                        //'icon' => 'nav-icon fa fa-address-book-o',
                        'options' => ['class' => 'header'],
                        'url'    => '#Main'
                    ],
                    [
                        'label' => Yii::t('backend', 'Timeline'),
                        'icon' => 'nav-icon far fa-calendar-alt',
                        'url' => ['/timeline-event/index'],
                        'badge' => TimelineEvent::find()->today()->count(),
                        'badgeBgClass' => 'label-success',
                    ],
                    [
                        'label' => Yii::t('backend', 'Users'),
                        'icon' => 'nav-icon fa fa-user-plus',
                        'url' => ['/user/index'],
                        'active' => Yii::$app->controller->id === 'user',
                        'visible' => Yii::$app->user->can('administrator'),
                    ],

                    # Content
                    [
                        'label' => Yii::t('backend', 'Content'),
                        'options' => ['class' => 'header'],
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
                                'icon' => 'nav-icon fa fa-folder-open-o',
                                'active' => Yii::$app->controller->id === 'category',
                            ],
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
                                'icon' => 'nav-icon fa fa-circle-o',
                                'active' => Yii::$app->controller->id === 'text',
                            ],
                            [
                                'label' => Yii::t('backend', 'Menu'),
                                'url' => ['/widget/menu/index'],
                                'icon' => 'nav-icon fa fa-circle-o',
                                'active' => Yii::$app->controller->id === 'menu',
                            ],
                            [
                                'label' => Yii::t('backend', 'Carousel'),
                                'url' => ['/widget/carousel/index'],
                                'icon' => 'nav-icon fa fa-circle-o',
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
                        'options' => ['class' => 'header'],
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
                                'icon' => 'nav-icon fa fa-circle-o',
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Items'),
                                'url' => ['/rbac/rbac-auth-item/index'],
                                'icon' => 'nav-icon fa fa-circle-o',
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Item Child'),
                                'url' => ['/rbac/rbac-auth-item-child/index'],
                                'icon' => 'nav-icon fa fa-circle-o',
                            ],
                            [
                                'label' => Yii::t('backend', 'Auth Rules'),
                                'url' => ['/rbac/rbac-auth-rule/index'],
                                'icon' => 'nav-icon fa fa-circle-o',
                            ],
                        ],
                    ],
                    [
                        'label' => Yii::t('backend', 'Files'),
                        'url' => '#',
                        'icon' => 'nav-icon fa fa-th-large',
                        'options' => ['class' => 'treeview'],
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
                                'icon' => 'nav-icon fa fa-arrows-h',
                                'active' => (Yii::$app->controller->id == 'manager'),
                            ],
                        ],
                    ],
                    [
                        'label' => Yii::t('backend', 'Key-Value Storage'),
                        'url' => ['/system/key-storage/index'],
                        'icon' => 'nav-icon',
                        'active' => (Yii::$app->controller->id == 'key-storage'),
                    ],
                    [
                        'label' => Yii::t('backend', 'Cache'),
                        'url' => ['/system/cache/index'],
                        'icon' => 'nav-icon fa fa-refresh',
                    ],
                    [
                        'label' => Yii::t('backend', 'System Information'),
                        'url' => ['/system/information/index'],
                        'icon' => 'nav-icon fa fa-dashboard',
                    ],
                    [
                        'label' => Yii::t('backend', 'Logs'),
                        'url' => ['/system/log/index'],
                        'icon' => 'nav-icon fa fa-warning',
                        'badge' => SystemLog::find()->count(),
                        'badgeBgClass' => 'label-danger',
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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-pie-chart"></i>
                        <p>
                            Charts
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/inline.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tree"></i>
                        <p>
                            UI Elements
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/UI/general.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/icons.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/buttons.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Buttons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/sliders.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-edit"></i>
                        <p>
                            Forms
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/forms/general.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Advanced Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/editors.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Editors</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Tables
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/tables/simple.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/data.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Data Tables</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fa fa-calendar"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-envelope-o"></i>
                        <p>
                            Mailbox
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/mailbox/mailbox.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Inbox</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Compose</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/read-mail.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Read</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                            Pages
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/invoice.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Invoice</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/profile.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/login.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/register.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/lockscreen.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-plus-square-o"></i>
                        <p>
                            Extras
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/404.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/500.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/blank.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="starter.html" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs" class="nav-link">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Documentation</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-circle-o text-danger"></i>
                        <p class="text">Important</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-circle-o text-warning"></i>
                        <p>Warning</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-circle-o text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>