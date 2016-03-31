<?php
/**
 * @file    main.php.
 * @author  Agiel K. Saputra
 * @date    5/8/2015
 * @time    3:33 PM
 * @var $this \yii\web\View
 * @var $content string
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use codezeen\yii2\adminlte\widgets\Alert;
use lajax\translatemanager\bundles\TranslateManagerAsset;
TranslateManagerAsset::register($this);
$this->beginContent('@vendors/dyar74/admin/views/layouts/blank.php');
//\lajax\translatemanager\helpers\Language::registerAssets();
?>
    <div class="wrapper">
        <?= $this->render('@vendors/dyar74/admin/views/layouts/main-header'); ?>
        <?= $this->render('@vendors/dyar74/admin/layouts/main-sidebar'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <?= $this->title; ?>
                </h1>
                <?= Breadcrumbs::widget([
                    'homeLink'     => [
                        'label' => Html::a( '<i class="fa fa-dashboard"></i> ' . Yii::t('app', 'Admin Zone'), Url::to('/admin') ),
                    ],
                    'encodeLabels' => false,
                    'links'        => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
            </section>
            <section class="content clearfix">
                <?= Alert::widget() ?>
                <?= $content; ?>
            </section>
        </div>
        <?= $this->render('@vendors/dyar74/admin/views/layouts/main-footer'); ?>
    </div>
<?php
$this->endContent();
