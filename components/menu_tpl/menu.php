<!-- оформляем список категорий -->
<!-- category list view -->
<li class = "panel-title">
    <a href="<?= \yii\helpers\Url::to(['category/view', 'id'=>$category['id']])?>">
        <?= $category['name'] ?>
    </a>
</li>
