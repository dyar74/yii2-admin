<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dyar74\admin;

use Yii;
use yii\base\Module as BaseAdminModule;
//use asdfstudio\admin\Module as BaseAdminModule;
//use app\modules\admin\entities\UserEntity;
//use app\modules\admin\entities\RbacEntity;
/**
 * Description of AdminModule
 *
 * @author Yar
 */
class AdminModule extends BaseAdminModule 
{
    public $controllerNamespace = 'dyar74\admin\controllers';
    public $userItems = [];
    
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/dyar74/*'] = [
            'class' => 'yii\i18n\DbMessageSource',
                    'db' => 'db',
                    'sourceLanguage' => 'en-US', // Developer language
                    'sourceMessageTable' => 'language_source',
                    'messageTable' => 'language_translate',
                //           'cachingDuration' => 86400,
                //           'enableCaching' => true,
            
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('modules/dyar74/' . $category, $message, $params, $language);
    }
}
