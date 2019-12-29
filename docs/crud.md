# 基本脚手架工具

## 脚手架
- 脚手架生成模板定制，schmunk42/yii2-giiant
- 脚手架模板与RBAC配套

## 脚手架使用笔记
- 脚手架生成CRUD

## Bootstrap4 AdminLTE3 Yii3
https://github.com/ColorlibHQ/AdminLTE

```
composer require "almasaeed2010/adminlte=~3.0"

```

## 升级AdminLTE3问题
- 文件404
frontend/web/assets/3b1c4115/style.css net::ERR_ABORTED 404 (Not Found)
frontend/web/assets/3b1c4115/app.js net::ERR_ABORTED 404 (Not Found)


## 模块
- 控制器、模型、视图都在同一个目录下

## 参考
[yii2-adminlte3 menu](https://github.com/kmergen/yii2-adminlte3/blob/master/examples/themes/adminlte/views/layouts/main.php)
[Yii2 adminlte3 layout examples](https://github.com/Insolita/yii2-adminlte3-asset/tree/master/src/layout_examples)

[Yii2 guide](https://www.yiiframework.com/doc/guide/2.0/zh-cn/structure-assets)

[schmunk42/yii2-giiant 脚手架](https://github.com/schmunk42/yii2-giiant)

[Yii2-starter-kit 问题备忘](https://github.com/calefy/bsk/wiki)


## 备忘
- 因为许多Yii2小部件在2.0.x版本中都与Bootstrap 3绑定在一起，解决[#615](https://github.com/yii2-starter-kit/yii2-starter-kit/issues/651)
- 无论如何，我同意不需要将NPM / Yarn内置到生产环境中（至少不是强制性的）。只需在开发过程中将生成的文件包含到bundle文件夹中即可解决此问题。现在，我们应该作为yii2-starter-pack项目强制采用这种方法，还是让每个开发人员选择要做什么？也许只是一个小的文档就足够了。
- Docs about Yii3 status and future roadmap for Yii: https://github.com/yiisoft/yii-core/blob/master/ROADMAP.md