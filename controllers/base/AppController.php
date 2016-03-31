<?php
namespace dyar74\admin\controllers\base;

use lajax\translatemanager\helpers\Language;

// IMPORTANT: all Controllers must originate from this Controller!
class AppController extends \yii\web\Controller {

    public function init() {
        Language::registerAssets();
        parent::init();
    }
}