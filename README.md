Admin Extension
===============
Admin / basic template
based on: 
dektrium\yii2-user
developeruz\yii2-db-rbac
lajax\yii2-translate-manager
lajax\yii2-language-picker
codezeen\yii2-adminlte

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dyar74/yii2-admin "*"
```

or add

```
to the require section of your `composer.json` file.


"dyar74/yii2-admin": "*"
```


add  migrations for extensions:
dektrium\yii2-user
developeruz\yii2-db-rbac
lajax\yii2-translate-manager




Usage
-----
add to config web.php: 
$basePath = dirname(__DIR__);
$webroot = dirname($basePath);
'bootstrap' => ['admin'],

'modules' => [
        'admin' => [
            'class' => 'dyar74\admin\AdminModule',
        ],..
]
Change return to(see you path to vendor):
return array_merge_recursive($config, require($webroot . '/vendor/dyar74/yii2-admin/config/admin.php'));
