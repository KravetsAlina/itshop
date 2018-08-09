<?php
namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Product;
use app\models\CommentForm;

class ProductController extends MainController {

    public function actionView($id)
    {

        $product = Product::findOne($id);
        // $comments = $product->getProductComments();;
        // $commentForm = new CommentForm();

        if(empty($product))
             throw new \yii\web\HttpException(404, 'Выбранного товара не существует');

        //Вариант для жадной загрузки
        //$product = Product::find()->with('category')->where(['id' => $id])->limit('1')->one();
        $hots = Product::find()->where(['hot' => '1'])->limit(4)->all();

        $this->setMeta('Apple. | ' . $product->name, $product->keywords, $product->description);

        return $this->render('view', compact('product', 'hots'));
    }

    public function actionComment($id)
    {
            $model = new CommentForm();

            if(Yii::$app->request->isPost)
            {
                $model->load(Yii::$app->request->post());
                if($model->saveComment($id))
                {
                    Yii::$app->getSession()->setFlash('comment', 'Your comment will be added soon!');
                    return $this->redirect(['site/view','id'=>$id]);
                }
            }
    }

}
