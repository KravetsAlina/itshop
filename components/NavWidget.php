<?php
//меню категории
namespace app\components;

use yii\base\Widget;
use app\models\Category;
use Yii;

class NavWidget extends Widget
{
  public $tpl;
  public $data;
  public $tree;
  public $menuHtml;
  //переменная из category _form.php MenuWidget
  public $model;
  public function init()
  {
    parent::init();
    if($this->tpl == null)
    {
      $this->tpl = 'Menu';
    }
    $this->tpl.= '.php';
  }
  public function run()
  {
    //cache  runtime->cache
    if($this->tpl == 'menu.php')
    {
      $menu = Yii::$app->cache->get('menu');
      if($menu) return $menu;
    }
    //вернет масив
    //indexBy указ какую колонку использ для индексиров массива
    $this->data = Category::find()->indexBy('id')->asArray()->all();
    $this->tree = $this->getTree();
    $this->menuHtml = $this->getMenuHtml($this->tree);
    if($this->tpl == 'menu.php')
    {
      Yii::$app->cache->set('menu', $this->menuHtml, 60);
    }
    // debug($this->tree);
    return $this->menuHtml;
  }
  //получаем дерево
  protected function getTree()
  {
    $tree = [];
    foreach($this->data as $id=>&$node){
        if(!$node['parent_id'])
            $tree[$id] = &$node;
        else
            $this->data[$node['parent_id']][$node['id']] = &$node;
    }
    return $tree;
  }
  //add to html
  protected function getMenuHtml($tree, $tab = '')
  {
    $str = '';
    foreach ($tree as $category)
    {
      $str .= $this->catToTemplate($category, $tab);
    }
    return $str;
  }
  //collection
  protected function catToTemplate($category, $tab)
  {
    //буфер вывода
    ob_start();
    include __DIR__ . '/menu_tpl/' . $this->tpl;
    return ob_get_clean();
  }
}
