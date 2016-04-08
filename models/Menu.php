<?php
//namespace cornernote\menu\models;

namespace dyar74\admin\models;


use cornernote\menu\models\Menu as MainMenu;

use Yii;


/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property integer $tree
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $name
 * @property string $code
 * @property string $url
 *
 * @mixin NestedSetsBehavior
 */
class Menu extends MainMenu
{
    

    /**
     * @inheritdoc
     */
   
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name', 'url'], 'string', 'max' => 255],
            [['code'],
                'match', 'not' => true, 'pattern' => '/[^a-zA-Z_-][^0-9]/',
                'message' => Yii::t('app', 'Invalid characters in code.'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
   
    public static function toItems($menu)
    {
        $menus = Menu::findOne(['name' => $menu]);
        $items = [];
        if (empty($menus)) {
            return false;
        } else {
            $items = Menu::getMenuItems($menus);
            
            return $items;
        }
    }

    protected static function getMenuItems($child)
    {
        $childrens = $child->children(1)->all();
   
        foreach ($childrens as $childs) {

            $subchilds = $childs->children(1)->all();
      
            if (!empty($subchilds)) {
                
              $items[] =   ['label' => Yii::t('app', $childs->name), 'url' => ['#'],
                        'options'=>['class'=>'dropdown'],
                        'items' => Menu::getMenuItems($childs),  
                    ];
            
            } else {
                $items[] =  ['label' => Yii::t('app', $childs->name), 'url' => [$childs->url]];
            }

        }
        return $items;
    }

}