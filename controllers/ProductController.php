<?php
namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Product;
use app\models\Comment;
use app\models\CommentForm;
use yii\data\Pagination;


class ProductController extends MainController {

    public function actionView($id)
    {

        $product = Product::findOne($id);
        //comment on page
        $comments = $product->getProductComments();
        $commentForm = new CommentForm();

        if(empty($product))
             throw new \yii\web\HttpException(404, 'Выбранного товара не существует');

        //Вариант для жадной загрузки
        //$product = Product::find()->with('category')->where(['id' => $id])->limit('1')->one();
        $hots = Product::find()->where(['hot' => '1'])->limit(8)->all();

        $this->setMeta('Apple. | ' . $product->name, $product->keywords, $product->description);

        //count all comments. Integer
              $count = Comment::find($id)
                  ->where(['product_id'=>$id, 'status'=>1])
                  ->count();

        return $this->render('view', compact('product', 'hots', 'comments', 'commentForm', 'count'));
    }

    //comments
    public function actionComment($id)
    {
        $model = new CommentForm();
        if(Yii::$app->request->isPost)
        {
          $model->load(Yii::$app->request->post());
          if($model->saveComment($id))
          {
            Yii::$app->getSession()->setFlash('comment', 'Ваш комментарий будет добавлен после проверки!');
            return $this->redirect(['product/view', 'id'=>$id]);
          }
        }
    }


}
