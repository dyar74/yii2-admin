<?php

namespace dyar74\admin\controllers;

use dyar74\admin\models\Menu;

use cornernote\menu\models\MenuSearch;
use cornernote\menu\controllers\MenuController as MainController;
use yii\web\Controller;
use Yii;
use yii\web\HttpException;
use yii\filters\AccessControl;
use cornernote\returnurl\ReturnUrl;

/**
 * MenuController implements the actions for Menu model.
 */
class MenuController extends MainController
{

  public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', compact('model'));
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param int $top_id
     * @return mixed
     */
    public function actionCreate($top_id = 0)
    {
        $model = new Menu;

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if ($top_id) {
                $saved = $model->prependTo(Menu::findOne($top_id));
            } else {
                $saved = $model->makeRoot();
            }
            if ($saved) {
                Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Menu has been created.'));
                return $this->redirect(ReturnUrl::getUrl());
            }
        } else {
            $model->load(Yii::$app->request->get());
        }

        return $this->render('create', compact('model'));
    }

    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        }
        throw new HttpException(404, 'The requested page does not exist.');
    }

}
