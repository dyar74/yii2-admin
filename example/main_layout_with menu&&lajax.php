<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use lajax\translatemanager\helpers\Language as Lx;
use dyar74\admin\models\Menu;
use cornernote\menu\models\MenuSearch;
use slatiusa\nestable\Nestable;
use cornernote\returnurl\ReturnUrl;


AppAsset::register($this);
\lajax\translatemanager\helpers\Language::registerAssets();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="<?= Yii::$app->language ?>">
    <!--<![endif]-->
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!--[if lt IE 9]>
             <script src="js/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">


            <div class="navbar-text pull-right">
                <?=
                \lajax\languagepicker\widgets\LanguagePicker::widget([
                    'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_DROPDOWN,
                    'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_LARGE
                ]);

                ?>
            </div>

            <?php
            $navItems = [];
            $navItems = Menu::toItems('main');
            
            NavBar::begin([
                'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            if (Yii::$app->user->isGuest) {
                array_push($navItems, ['label' => 'Sign In', 'url' => ['/user/login']]);
            } else {
                array_push($navItems, ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/user/logout'],
                    'linkOptions' => ['data-method' => 'post']]
                );
            }
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $navItems,
            ]);
            echo \lajax\translatemanager\widgets\ToggleTranslate::widget([
                'position' => \lajax\translatemanager\widgets\ToggleTranslate::POSITION_TOP_RIGHT,
                'template' => '<a href="javascript:void(0);" id="toggle-translate" class="{position}" data-language="{language}"><i></i> {text}</a><div id="translate-manager-div"></div>',
                'frontendTranslationAsset' => 'lajax\translatemanager\bundles\FrontendTranslationAsset',
                'frontendTranslationPluginAsset' => 'lajax\translatemanager\bundles\FrontendTranslationPluginAsset',
            ]);

            NavBar::end();

            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])

                ?>
<?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
