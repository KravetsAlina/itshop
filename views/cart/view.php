<?php
use  yii\helpers\Html;
use  yii\helpers\Url;
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

<!-- Cart Info -->
<?php if(!empty($session['cart'])): ?>
<div class="cart_info">
  <div class="container">
    <div class="row">
      <div class="col">

        <!-- Column Titles -->
        <div class="cart_info_columns clearfix">
          <div class="cart_info_col cart_info_col_product">Наименование</div>
          <div class="cart_info_col cart_info_col_price">Цена</div>
          <div class="cart_info_col cart_info_col_quantity">Кол-во</div>
          <div class="cart_info_col cart_info_col_total">Сумма</div>
          <div class="cart_info_col cart_info_col_del">Удалить</div>
        </div>
      </div>
    </div>
    <div class="row cart_items_row">
      <div class="col">

        <!-- Cart Item -->
<?php foreach($session['cart'] as $id => $item ): ?>
        <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

          <!-- Name -->
          <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
            <div class="cart_item_image">
              <div><img src="../images/cart_1.jpg" alt="" style="height: 100px; width: 100px;"></div>
            </div>
            <div class="cart_item_name_container">
              <div class="cart_item_name"><a href="<?= Url::to([''])?>"><?= $item['name']?></a></div>
            </div>
          </div>
          <!-- Price -->
          <div class="cart_item_price">$ <?= $item['price']?></div>
          <!-- Quantity -->
          <div class="cart_item_quantity">
            <div class="product_quantity_container">
              <div class="product_quantity clearfix">
                <span>Кол-во </span>
                <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                <!-- <div class="quantity_buttons">
                  <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                  <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                </div> -->
              </div>
            </div>
          </div>
          <!-- Total -->
          <div class="cart_item_total">$ <?= $item['price'] * $item['qty']; ?></div>
          <!-- Delete -->
          <div class="cart_item_delete"><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></div>

        </div>
  <?php endforeach; ?>

      </div>
    </div>
    <div class="row row_cart_buttons">
      <div class="col">
        <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
          <div class="button continue_shopping_button"><a href="<?= Url::to(['category/index'])?>">Продолжить покупки</a></div>
          <div class="cart_buttons_right ml-lg-auto">
            <div class="button clear_cart_button"><a href="#">Очистить корзину</a></div>
            <!-- <div class="button update_cart_button"><a href="#">Редактировать корзину</a></div> -->
          </div>
        </div>
      </div>
    </div>


    <div class="row row_extra">
      <!-- <div class="col-lg-4"> -->
      <!-- Billing Info -->
      <div class="col-lg-12">
        <div class="billing checkout_section">
          <div class="section_title">Billing Address</div>
          <div class="section_subtitle">Enter your address info</div>
          <div class="checkout_form_container">
            <form action="#" id="checkout_form" class="checkout_form">
              <div class="row">
                <div class="col-xl-6">
                  <!-- Name -->
                  <label for="checkout_name">First Name*</label>
                  <input type="text" id="checkout_name" class="checkout_input" required="required">
                </div>
                <div class="col-xl-6 last_name_col">
                  <!-- Last Name -->
                  <label for="checkout_last_name">Last Name*</label>
                  <input type="text" id="checkout_last_name" class="checkout_input" required="required">
                </div>
              </div>
              <!-- <div> -->
                <!-- Company -->
                <!-- <label for="checkout_company">Company</label>
                <input type="text" id="checkout_company" class="checkout_input">
              </div> -->
              <div>
                <!-- Country -->
                <label for="checkout_country">Country*</label>
                <input type="text" id="checkout_country" class="checkout_input">
                <!-- <select name="checkout_country" id="checkout_country" class="dropdown_item_select checkout_input" require="required">
                  <option></option>
                  <option>Lithuania</option>
                  <option>Sweden</option>
                  <option>UK</option>
                  <option>Italy</option>
                </select> -->
              </div>
              <div>
                <!-- Address -->
                <label for="checkout_address">Address*</label>
                <input type="text" id="checkout_address" class="checkout_input" required="required">
                <!-- <input type="text" id="checkout_address_2" class="checkout_input checkout_address_2" required="required"> -->
              </div>
              <!-- <div> -->
                <!-- Zipcode -->
                <!-- <label for="checkout_zipcode">Zipcode*</label>
                <input type="text" id="checkout_zipcode" class="checkout_input" required="required">
              </div> -->
              <div>
                <!-- City / Town -->
                <label for="checkout_city">City/Town*</label>
                <input type="text" id="checkout_city" class="checkout_input" required="required">
              </div>
              <div>
                <!-- Province -->
                <!-- <label for="checkout_province">Province*</label>
                <select name="checkout_province" id="checkout_province" class="dropdown_item_select checkout_input" require="required">
                  <option></option>
                  <option>Province</option>
                  <option>Province</option>
                  <option>Province</option>
                  <option>Province</option>
                </select>
              </div>
              <div> -->
                <!-- Phone no -->
                <label for="checkout_phone">Phone no*</label>
                <input type="phone" id="checkout_phone" class="checkout_input" required="required">
              </div>
              <div>
                <!-- Email -->
                <label for="checkout_email">Email Address*</label>
                <input type="phone" id="checkout_email" class="checkout_input" required="required">
              </div>
              <!-- <div class="checkout_extra">
                <div>
                  <input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
                  <label for="checkbox_terms"><img src="images/check.png" alt=""></label>
                  <span class="checkbox_title">Terms and conditions</span>
                </div>
                <div>
                  <input type="checkbox" id="checkbox_account" name="regular_checkbox" class="regular_checkbox">
                  <label for="checkbox_account"><img src="images/check.png" alt=""></label>
                  <span class="checkbox_title">Create an account</span>
                </div>
                <div>
                  <input type="checkbox" id="checkbox_newsletter" name="regular_checkbox" class="regular_checkbox">
                  <label for="checkbox_newsletter"><img src="images/check.png" alt=""></label>
                  <span class="checkbox_title">Subscribe to our newsletter</span>
                </div>
              </div> -->
            </form>
          </div>
        </div>
      </div>
  </div>
        <!-- Delivery -->
        <!-- <div class="delivery">
          <div class="section_title">Shipping method</div>
          <div class="section_subtitle">Select the one you want</div>
          <div class="delivery_options">
            <label class="delivery_option clearfix">Next day delivery
              <input type="radio" name="radio">
              <span class="checkmark"></span>
              <span class="delivery_price">$4.99</span>
            </label>
            <label class="delivery_option clearfix">Standard delivery
              <input type="radio" name="radio">
              <span class="checkmark"></span>
              <span class="delivery_price">$1.99</span>
            </label>
            <label class="delivery_option clearfix">Personal pickup
              <input type="radio" checked="checked" name="radio">
              <span class="checkmark"></span>
              <span class="delivery_price">Free</span>
            </label>
          </div>
        </div> -->

        <!-- Coupon Code -->
        <!-- <div class="coupon">
          <div class="section_title">Coupon code</div>
          <div class="section_subtitle">Enter your coupon code</div>
          <div class="coupon_form_container">
            <form action="#" id="coupon_form" class="coupon_form">
              <input type="text" class="coupon_input" required="required">
              <button class="button coupon_button"><span>Apply</span></button>
            </form>
          </div>
        </div>
      </div> -->

      <div class="col-lg-6 offset-lg-2">
        <div class="cart_total">
          <div class="section_title">Итого: </div>
          <!-- <div class="section_subtitle">Final info</div> -->
          <div class="cart_total_container">
            <ul>
              <li class="d-flex flex-row align-items-center justify-content-start">
                <div class="cart_total_title">Всего товаров</div>
                <div class="cart_total_value ml-auto"><?= $session['cart.qty']; ?></div>
              </li>
              <!-- <li class="d-flex flex-row align-items-center justify-content-start">
                <div class="cart_total_title">Shipping</div>
                <div class="cart_total_value ml-auto">Free</div>
              </li> -->
              <li class="d-flex flex-row align-items-center justify-content-start">
                <div class="cart_total_title">На сумму</div>
                <div class="cart_total_value ml-auto">$<?= $session['cart.sum']; ?></div>
              </li>
            </ul>
          </div>
          <div class="button checkout_button"><a href="#">Отправить</a></div>
        </div>
      </div>
    </div>

  </div>
</div>

<?php else: ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h2>В корзине пусто</h2>
      </div>
    </div>
  </div>
<?php endif; ?>
