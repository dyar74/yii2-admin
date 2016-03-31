<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\admin;
use asdfstudio\admin\Module as BaseAdminModule;
use app\modules\admin\entities\UserEntity;
use app\modules\admin\entities\RbacEntity;
/**
 * Description of AdminModule
 *
 * @author Yar
 */
class AdminModule extends BaseAdminModule 
{
    public function init() {
        parent::init();

        $this->registerEntity(UserEntity::className()); // этот метод регистрирует сущность в админке

        $this->sidebar->addItem(UserEntity::className()); // а этот добавляет ссылку в сайдбар
        $this->registerEntity(RbacEntity::className());
        $this->sidebar->addItem(RbacEntity::className());
    }
}
