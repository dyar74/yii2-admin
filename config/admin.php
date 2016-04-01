<?php
$admin_layout = '@vendor/dyar74/yii2-admin/views/layouts/admin.php';
return [

    'modules' => [
        'admin' => [
            'class' => 'dyar74\admin\AdminModule',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'],
            'layout' => $admin_layout,
            'modelMap' => [
                'User' => 'dyar74\admin\models\User',
            ],
        ],
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Module',
            // 'layout' => '@app/views/layouts/adm',
            'root' => '@app', // The root directory of the project scan.
            'layout' => $admin_layout, // Name of the used layout. If using own layout use 'null'.
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
            'layout' => $admin_layout,
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
                'userClass' => 'adyar74\admin\models\User',
            ]
         ],
    ],
    'components' => [
        
        'translatemanager' => [
            'class' => 'lajax\translatemanager\Component',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
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
                'admin/user/admin/create' => '/user/admin/create',
                'admin/user/admin' => '/user/admin',
                'admin/permit/user/view:[\w-]+>/<id:\d+>' => 'permit/user/view'
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
                    '@dektrium/user/views/admin' => '@dyar74/admin/views/user'
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                //           'cachingDuration' => 86400,
                //           'enableCaching' => true,
                ],
                'app*' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                //         'cachingDuration' => 86400,
                //         'enableCaching' => true,
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
];

