<?php
use  yii\helpers\Html;
use  yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\CartAsset;
use app\assets\AppAsset;

CartAsset::register($this);
AppAsset::register($this);
?>

<!-- block -->

<div class="block">
  <div class="block_container">
    <div class="block_background" style="background-image:url(../images/cart.jpg)"></div>
    <div class="block_content_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="block_content">
              <h3>Apple.</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php if(!empty($session['favorite'])): ?>
<div id="favoriteView">
  <div class="cart_info">
    <div class="container">
      <div class="row">
        <div class="col">

              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th>Фото</th>
                      <th>Наименование</th>
                      <th>Цена</th>
                      <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($session['favorite'] as $id => $item): ?>
                      <tr>
                        <td>
                          <a href="<?= Url::to(['product/view', 'id'=>$id])?>">
                            <?= '<img src="/upload/'. $item['image'] .'" style="height: 50px; width: 50px;">' ?>
                          </a>
                        </td>
                        <td><a href="<?= Url::to(['product/view', 'id'=>$id])?>"><?= $item['name']?></a></td>
                        <td><?= $item['price']?></td>
                        <td><a href="<?= Url::to(['favorite/delete', 'id'=> $id]) ?>"><span class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></a></td>
                      </tr>
                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php else: ?>
<div class="container">
<div class="row">
  <div class="col">
    <h2>В категории пусто</h2>
  </div>
</div>
</div>
<?php endif; ?>
