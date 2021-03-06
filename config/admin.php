<?php
return [
    'bootstrap' => ['translatemanager', 'languagepicker'],
    'modules' => [
        'gallery' => [
            'class' => 'wolfguard\gallery\Module',
            'layout' => '@vendor/dyar74/yii2-admin/views/layouts/admin.php',
            'as access' => [ // if you need to set access
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ]
            ],
        ],
        'pages' => [
            'class' => 'bupy7\pages\Module',
            'layout' => '@vendor/dyar74/yii2-admin/views/layouts/admin.php',
            'pathToImages' => '@webroot/uploads/images',
            'urlToImages' => '/uploads/images',
            'pathToFiles' => '@webroot/uploads/files',
            'urlToFiles' => '/uploads/files',
            'uploadImage' => true,
            'uploadFile' => true,
            'addImage' => true,
            'addFile' => true,
            'as access' => [ // if you need to set access
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ]
            ],
        ],
        'menu' => [
            'class' => 'cornernote\menu\Module',
            'controllerMap' => [
                'menu' => 'dyar74\admin\controllers\MenuController',
            ],
            'layout' => '@vendor/dyar74/yii2-admin/views/layouts/admin.php',
            'as access' => [ // if you need to set access
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ]
            ],
            
        ],
        'setting' => [
            'class' => 'funson86\setting\Module',
            'layout' => '@vendor/dyar74/yii2-admin/views/layouts/admin.php',
            'controllerNamespace' => 'funson86\setting\controllers',
            'as access' => [ // if you need to set access
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ]
            ],
        ],
        'video_gallery' => [
            'class' => 'wolfguard\video_gallery\Module',
            'layout' => '@vendor/dyar74/yii2-admin/views/layouts/admin.php',
            'as access' => [ // if you need to set access
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ]
            ],
        ],
        'block' => [
            'class' => 'wolfguard\block\Module',
            'layout' => '@vendor/dyar74/yii2-admin/views/layouts/admin.php',
            'as access' => [ // if you need to set access
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ]
            ],
        ],
        
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
            'layout' => '@vendor/dyar74/yii2-admin/views/layouts/admin.php',
            'modelMap' => [
                'User' => 'dyar74\admin\models\User',
            ],
        ],
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Module',
            // 'layout' => '@app/views/layouts/adm',
            'root' => '@app', // The root directory of the project scan.
            'layout' => '@vendor/dyar74/yii2-admin/views/layouts/admin.php', // Name of the used layout. If using own layout use 'null'.
            'allowedIPs' => ['127.0.0.1', '10.21.146.*', '213.111.122.199'], // IP addresses from which the translation interface is accessible.
            'roles' => ['admin', 'editor'], // For setting access levels to the translating interface.
            'tmpDir' => '@runtime', // Writable directory for the client-side temporary language files. 
            // IMPORTANT: must be identical for all applications (the AssetsManager serves the JavaScript files containing language elements from this directory).
            'phpTranslators' => ['::t'], // list of the php function for translating messages.
            'jsTranslators' => ['lajax.t'], // list of the js function for translating messages.
            'patterns' => ['*.js', '*.php'], // list of file extensions that contain language elements.
            'ignoredCategories' => ['yii'], // these categories won’t be included in the language database.
            'ignoredItems' => ['config'], // these files will not be processed.
            'scanTimeLimit' => null, // increase to prevent "Maximum execution time" errors, if null the default max_execution_time will be used
        /*    'tables' => [                   // Properties of individual tables
          [
          'connection' => 'db', // connection identifier
          'table' => 'language', // table name
          'columns' => ['name', 'name_ascii']  //names of multilingual fields
          ]
          ] */
        ],
        'permit' => [
            'class' => 'developeruz\db_rbac\Yii2DbRbac',
            'layout' => '@vendor/dyar74/yii2-admin/views/layouts/admin.php',
            'as access' => [ // if you need to set access
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin']
                    ],
                ]
            ],
            'params' => [
                'userClass' => 'dyar74\admin\models\User',
            ]
        ],
    ],
    'components' => [
        'setting' => [
            'class' => 'funson86\setting\Setting',
        ],
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Component',
        ],
        'languagepicker' => [
            'class' => 'lajax\languagepicker\Component',
            'languages' => function () {                        // List of available languages (icons only)
                return array_keys(\lajax\translatemanager\models\Language::getLanguageNames(true));
            },
            'cookieName' => 'language', // Name of the cookie.
            'expireDays' => 64,
        /*    'callback' => function() {
          if (!\Yii::$app->user->isGuest) {
          $user = \Yii::$app->user->identity;
          $user->language = \Yii::$app->language;
          $user->save();
          }
          } */
        ],
        'urlManager' => [
            //   'enablePrettyUrl' => true,
            //  'showScriptName' => false,
            'rules' => [
                '<module:\w+>/<controller:\w+>/<action:(\w|-)+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:(\w|-)+>/<id:\d+>' => '<module>/<controller>/<action>',
                'admin' => 'admin/admin',
                'admin/<controller:\w+>/<action:[\w-]+>/<id:\d+>' => 'admin/<controller>/<action>',
                'admin/<module:\w+>/<controller:\w+>/<action:[\w-]+>/<id:\d+>' => 'admin/<module>/<controller>/<action>',
                '/admin/translatemanager/language/create' => '/translatemanager/language/create',
                '/admin/translatemanager/language/list' => '/translatemanager/language/list',
                '/admin/translatemanager/language/scan' => '/translatemanager/language/scan',
                '/admin/translatemanager/language/optimizer' => '/translatemanager/language/optimizer',
                '/admin/menu' => '/menu/menu',
                '/admin/utility' => '/utility',
                '/admin/setting' => '/setting',
                '/admin/gallery' => '/gallery/admin',
                '/admin/video-gallery' => '/video_gallery/admin',
                '/admin/block' => '/block/admin',
                '/admin/gallery/<action:[\w-]+>/<id:\d+>' => '/gallery/admin/<action:[\w-]+>/<id:\d+>',
                '/admin/pages/manager/<action:[\w-]+>/<id:\d+>' => '/pages/manager/<action:[\w-]+>/<id:\d+>',
            //  'pages/<page:[\w-]+>' => 'pages/default/index',
            //   '/admin/user/admin/create' => '/user/admin/create',
            //   '/admin/user/admin' => '/user/admin',
            //   '/admin/permit/user/view:[\w-]+>/<id:\d+>' => 'permit/user/view:[\w-]+>/<id:\d+>'
            ],
        ],
        'user' => [
            'identityClass' => 'dyar74\admin\models\User',
            'loginUrl' => [
                '/user/login',
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views/admin' => '@dyar74/admin/views/user',
                    '@bupy7/pages/views/manager' => '@dyar74/admin/views/manager',
                    '@cornernote/menu/views/menu' => '@dyar74/admin/views/menu'
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                           'cachingDuration' => 86400,
                           'enableCaching' => true,
                ],
                'app*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
                'bupy7/pages/core' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
                'funson86/setting' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
                'block' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
                'video_gallery' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
                'gallery' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
               
                'menu'  => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
                'user'  => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
                'db_rbac' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
                'rbac' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
                'database' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'forceTranslation' => true,
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                         'cachingDuration' => 86400,
                         'enableCaching' => true,
                ],
            ],
        ],
    ],
];

