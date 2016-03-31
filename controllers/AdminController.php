<?php

namespace dyar74\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use dyar74\admin\controllers\base\AppController;

class AdminController extends AppController
{   
    public $layout = "admin";
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
            //    'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'upload'],
                        'allow' => true,
                        'roles' => ['admin', 'editor'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            
        ];
    }

    public function actionIndex()
    {   
       //$this->layout = "adm";
        return $this->render('index');
    }
    
 /*   public function actionUpload () {
        //$this->layout = "adm";
        
        
        return $this->render('upload');
    }*/
}
