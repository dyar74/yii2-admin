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
        $admin_site_menu[10] = ['label' => Yii::t('app', 'Users'), 'url' => ['/user/admin']];
        $admin_site_menu[20] = ['label' => Yii::t('app', 'Roles'), 'url' => ['/permit/access/role']];
        $admin_site_menu[30] = ['label' => Yii::t('app', 'Permissions'), 'url' => ['/permit/access/permission']];
      //  $admin_site_menu[40] = ['label' => Yii::t('app', 'Gallery'), 'url' => ['/gallery/gallery/index']];
       // $admin_site_menu[50] = ['label' => Yii::t('app', 'Page'), 'url' => ['/page']];
        $admin_site_menu[50] = ['label' => Yii::t('app', 'Menu'), 'url' => ['/menu']];
        $admin_site_menu[60] = 
            ['label' => Yii::t('language', 'Language'),  'options' => ['class' => 'treeview'], 'items' => [
                    [ 'label' => Yii::t('language', 'List of languages'), 'url' => ['/admin/translatemanager/language/list']],
                    [ 'label' => Yii::t('language', 'Create'), 'url' => ['/admin/translatemanager/language/create']],
                    [ 'label' => Yii::t('language', 'Scan'), 'url' => ['/admin/translatemanager/language/scan']],
                    [ 'label' => Yii::t('language', 'Optimize'), 'url' => ['/admin/translatemanager/language/optimizer']],
                ]
       ];
        $admin_site_menu[70] = ['label' => Yii::t('app', 'Utilities'), 'url' => ['/utility']];
        $admin_site_menu[200] = ['label' => Yii::t('app', 'User'),  'options' => ['class' => 'treeview'], 'items' => [
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
