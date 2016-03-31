<?php

/**
 * @file    main-sidebar.php.
 * @author  Agiel K. Saputra
 * @date    5/8/2015
 * @time    3:13 PM
 */
use yii\helpers\Html;
use cebe\gravatar\Gravatar;
//use codezeen\yii2\adminlte\widgets\MainSidebar;
use codezeen\yii2\adminlte\widgets\Menu;
?>
<aside class="main-sidebar">
    <section class="sidebar">

        <?php if (!Yii::$app->user->isGuest) { ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <?php
                    echo Gravatar::widget([
                        'email' => Yii::$app->user->identity->email,
                        'options' => [
                            'alt' => Yii::$app->user->identity->username,
                            'class' => 'img-circle'
                        ],
                        'size' => 45
                    ]);
                    ?>
                </div>
                <div class="pull-left info">
                    <p><?= Yii::$app->user->identity->username; ?></p>
    <?= Html::a('<i class="fa fa-circle text-success"></i>' . Yii::t('app', 'Online'), ['/user/profile']); ?>
                </div>
            </div>
        <?php } ?>

        <?php
        $admin_site_menu[0] = ['label' => Yii::t('app', 'MAIN NAVIGATION'), 'options' => ['class' => 'header'], 'template' => '{label}'];
        $admin_site_menu[1] = ['label' => Yii::t('app', 'Users'), 'url' => ['/rbac']];
      //  $admin_site_menu[2] = ['label' => Yii::t('app', 'File manager'),  'url' => ['/filemanager']];
     //   $admin_site_menu[3] = ['label' => Yii::t('app', 'Models'),  'url' => ['/glider']];
       // $admin_site_menu[4] = ['label' => Yii::t('app', 'Slider'),  'url' => ['/slider']];
      //  $admin_site_menu[5] = ['label' => Yii::t('app', 'Work Type'),  'url' => ['/work-type']];
        $admin_site_menu[6] = 
            ['label' => Yii::t('language', 'Language'),  'options' => ['class' => 'treeview'], 'items' => [
                    [ 'label' => Yii::t('language', 'List of languages'), 'url' => ['/translatemanager/language/list']],
                    [ 'label' => Yii::t('language', 'Create'), 'url' => ['/translatemanager/language/create']],
                    [ 'label' => Yii::t('language', 'Scan'), 'url' => ['/translatemanager/language/scan']],
                    [ 'label' => Yii::t('language', 'Optimize'), 'url' => ['/translatemanager/language/optimizer']],
            //        [ 'label' => Yii::t('app', 'Source Message'), 'url' => ['/source-message/index']],
            //        [ 'label' => Yii::t('app', 'Translation'), 'url' => ['/message/index']],
            //         [ 'label' => Yii::t('app', 'Translation Orig'), 'url' => ['/translatemanager/language/translate', 'language_id'=> isset(Yii::$app->language) ? Yii::$app->language : 'ru-RU' ]],
                ]
       ];
     //   $admin_site_menu[7] = ['label' => Yii::t('app', 'Content'),  'url' => ['/content']];
     //   $admin_site_menu[8] = ['label' => Yii::t('app', 'Content Lang'),  'url' => ['/content-lang']];

       /*     $admin_site_menu[5] = ['label' => Yii::t('app', 'Multilevel'), 'icon' => '<i class="fa fa-share"></i>', 'options' => ['class' => 'treeview'], 'items' => [
          ['icon' => '<i class="fa fa-circle-o"></i>', 'label' => Yii::t('app', 'Level One'), 'url' => '#'],
          ['icon' => '<i class="fa fa-circle-o"></i>', 'label' => Yii::t('app', 'Level One'), 'url' => '#', 'items' => [
          ['icon' => '<i class="fa fa-circle-o"></i>', 'label' => Yii::t('app', 'Level Two'), 'url' => '#'],
          ['icon' => '<i class="fa fa-circle-o"></i>', 'label' => Yii::t('app', 'Level Two'), 'url' => '#'],
          ['icon' => '<i class="fa fa-circle-o"></i>', 'label' => Yii::t('app', 'Level Two'), 'url' => '#'],
          ]],
          ['icon' => '<i class="fa fa-circle-o"></i>', 'label' => Yii::t('app', 'Level One'), 'url' => '#'],
          ]];
          $admin_site_menu[3] = ['label' => Yii::t('app', 'Post'), 'icon' => '<i class="fa fa-thumb-tack"></i>', 'options' => ['class' => 'treeview'], 'items' => [
          ['icon' => '<i class="fa fa-circle-o"></i>', 'label' => Yii::t('app', 'All Post'), 'url' => '#', 'badge' => '13'],
          ['icon' => '<i class="fa fa-circle-o"></i>', 'label' => Yii::t('app', 'Add New Post'), 'url' => '#'],
          ['icon' => '<i class="fa fa-circle-o"></i>', 'label' => Yii::t('app', 'Categories'), 'url' => '#'],
          ['icon' => '<i class="fa fa-circle-o"></i>', 'label' => Yii::t('app', 'Tags'), 'url' => '#'],
          ]];*/
        $admin_site_menu[20] = ['label' => Yii::t('app', 'User'),  'options' => ['class' => 'treeview'], 'items' => [
                [ 'label' => Yii::t('app', 'Login'), 'url' => ['/user/login'], 'visible' => Yii::$app->user->isGuest],
                [ 'label' => Yii::t('app', 'Logout'), 'url' => ['/user/logout'], 'linkOptions' => ['data-method' => 'post'], 'visible' => !Yii::$app->user->isGuest],
        ]];

        // Short the menu
        ksort($admin_site_menu);

        echo Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'labelTemplate' => '<a href="#">{icon}<span>{label}</span>{right-icon}{badge}</a>',
            'linkTemplate' => '<a href="{url}" {linkOptions}>{icon}<span>{label}</span>{right-icon}{badge}</a>',
            'submenuTemplate' => "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
            'activateParents' => true,
            'items' => $admin_site_menu,
        ]);
        ?>
    </section>
</aside>
