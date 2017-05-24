<?php
/**
 * @file    blank.php.
 * @author  Agiel K. Saputra
 * @date    5/8/2015
 * @time    3:13 PM
 * @var $this    \yii\web\View
 * @var $content string
 */

use yii\bootstrap\NavBar;
use yii\helpers\Html;
use cebe\gravatar\Gravatar;

?>
<header class="main-header">
    <?php
    // Render logo
    echo Html::a(
        // mini logo for sidebar mini 50x50 pixels
        Html::tag('span', '<b>A</b>LT', ['class' => 'logo-mini']) .
        // logo for regular state and mobile devices
        Html::tag('span', Yii::t('app', 'Go to site'), ['class' => 'logo-lg']), Yii::$app->homeUrl,
        [
            'class' => 'logo'
        ]);
    ?>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <?php if (!Yii::$app->user->isGuest) { ?>
                
                    <li class="dropdown user user-menu">
                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?= Gravatar::widget([
                                'email'   => Yii::$app->user->identity->email,
                                'options' => [
                                    'alt'   => Yii::$app->user->identity->username,
                                    'class' => 'user-image'
                                ],
                                'size'    => 25
                            ]); ?>
                            
                            <span class="hidden-xs"><?= Yii::$app->user->identity->username; ?></span>
                        </a>
                      
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <?= Gravatar::widget([
                                    'email'   => Yii::$app->user->identity->email,
                                    'options' => [
                                        'alt'   => Yii::$app->user->identity->username,
                                        'class' => 'img-circle'
                                    ],
                                    'size'    => 84
                                ]); ?>
                                <p>
                                    <?= Yii::$app->user->identity->username; ?>
                                    <small><?= Yii::t('app', 'Member since {date}', ['date' => Yii::$app->formatter->asDate(Yii::$app->user->identity->created_at, 'php:F d, Y')]); ?></small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <?= Html::a(Yii::t('app', 'Profile'), '#', ['class' => 'btn btn-default btn-flat']); ?>
                                </div>
                                <div class="pull-right">
                                    <?= Html::a(Yii::t('app', 'Sign Out'), ['/user/logout'], ['class' => 'btn btn-default btn-flat', 'data-method' => 'post']); ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

            </ul>
        </div>
        <div class="navbar-text pull-right">
<?=
\lajax\languagepicker\widgets\LanguagePicker::widget([
       'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_DROPDOWN,
       'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_LARGE
  ]);
?>
        </div>
    </nav>
</header>