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
'language' => 'uk-UA', // you default language
'modules' => [
        'admin' => [
            'class' => 'dyar74\admin\AdminModule',
             'userItems' => ['label' => Yii::t('admin', 'User Block Extensions'), 'options' => ['class' => 'treeview'], 'items' => [
                    [ 'label' => Yii::t('admin', 'Ext1'), 'url' => ['#']],
                    [ 'label' => Yii::t('admin', 'Ext2'), 'url' => ['#']],
                    [ 'label' => Yii::t('admin', 'Ext3'), 'url' => ['#']],
                ]
            ], //if you have add items to admin menu
        ],..
]
Change return to(see you path to vendor):
return array_merge_recursive($config, require($webroot . '/vendor/dyar74/yii2-admin/config/admin.php'));
