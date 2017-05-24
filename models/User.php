<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace dyar74\admin\models;

use dektrium\user\models\User as BaseUser;
use developeruz\db_rbac\interfaces\UserRbacInterface;

class User extends BaseUser implements  UserRbacInterface
{
    public function register()
    {
    //    return $this->username;// do your magic
    }
    public function getUserName()
    {
       return $this->username;
    }
 /*   public function getId() {
        return $this->id;
    }*/
  /*  public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }*/
}