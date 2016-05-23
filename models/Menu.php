<?php
//namespace cornernote\menu\models;

namespace dyar74\admin\models;
use cornernote\menu\models\Menu as MainMenu;
use Yii;
use lajax\translatemanager\helpers\Language;
use slatiusa\nestable\NestableBehavior;

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
 * @property string $name_t
 * 
 * @mixin NestedSetsBehavior
 */
class Menu extends MainMenu
{
    
    public $name_t;
    
    public function behaviors()
    {
        return [
            [
                'class' => \lajax\translatemanager\behaviors\TranslateBehavior::className(),
                'translateAttributes' => ['name'],
             //   'category' => static::tableName(),
            ],
            'tree' => [
                'class' => NestableBehavior::className(),
                'treeAttribute' => 'tree',
            ],
        ];
    }

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
    

    public function afterFind()
    {
         $this->name_t = Language::d($this->name);
      //  $this->name_t = Language::t(static::tableName(), $this->name);

        // or If the category is the database table name.
        // $this->name_t = Language::t(static::tableName(), $this->name);
        // $this->description_t = Language::t(static::tableName(), $this->descrioption);
        parent::afterFind();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
             Language::saveMessage($this->name);
            // or If the category is the database table name.
       //     Language::saveMessage($this->name, static::tableName());
            // Language::saveMessage($this->description, static::tableName());
            return true;
        }

        return false;
    }

    public static function toItems($menu)
    {
        $menus = self::findOne(['name' => $menu]);
        $items = [];
        if (empty($menus)) {
            return false;
        } else {
            $items = self::getMenuItems($menus);

            return $items;
        }
    }

    protected static function getMenuItems($child)
    {
        $childrens = $child->children(1)->all();

        foreach ($childrens as $childs) {

            $subchilds = $childs->children(1)->all();

            if (!empty($subchilds)) {

                $items[] = ['label' =>  $childs->name, 'url' => ['#'],
                    'options' => ['class' => 'dropdown'],
                    'items' => self::getMenuItems($childs),
                ];
            } else {
                $items[] = ['label' =>  $childs->name, 'url' => [$childs->url]];
            }
        }
        return $items;
    }
}
