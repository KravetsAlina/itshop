<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Cart;

//title for pages
class MainController extends Controller
{
  protected function setMeta($title = null, $keywords = null, $description = null)
  {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
  }
}
