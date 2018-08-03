<!-- оформляем список категорий -->
<li class = "panel-title">
    <a href="<?= \yii\helpers\Url::to(['category/view', 'id'=>$category['id']])?>">
        <?= $category['name'] ?>               
    </a>
</li>
