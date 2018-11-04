<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

    <div class="contact">
  		<div class="container">
  			<div class="row">

  				<!-- Get in touch -->
  				<div class="col-lg-8 contact_col">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2541.220740592166!2d30.529867559775877!3d50.43698890866765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1suk!2sua!4v1535810959366" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  				</div>

  				<!-- Contact Info -->
  				<div class="col-lg-3 offset-xl-1 contact_col">
  					<div class="contact_info">
  						<div class="contact_info_section">
  							<div class="contact_info_title">Marketing</div>
  							<ul>
  								<li>Phone: <span>+53 345 7953 3245</span></li>
  								<li>Email: <span>yourmail@gmail.com</span></li>
  							</ul>
  						</div><hr>
  						<div class="contact_info_section">
  							<div class="contact_info_title">Shippiing & Returns</div>
  							<ul>
  								<li>Phone: <span>+53 345 7953 3245</span></li>
  								<li>Email: <span>yourmail@gmail.com</span></li>
  							</ul>
  						</div><hr>
  						<div class="contact_info_section">
  							<div class="contact_info_title">Information</div>
  							<ul>
  								<li>Phone: <span>+53 345 7953 3245</span></li>
  								<li>Email: <span>yourmail@gmail.com</span></li>
  							</ul>
  						</div><hr>
              <div class="contact_info_section">
  							<div class="contact_info_title">Contact center</div>
  							<ul>
  								<li>Phone: <span>+53 345 7953 3245</span></li>
  								<li>Email: <span>yourmail@gmail.com</span></li>
  							</ul>
  						</div>
  					</div>
  				</div>
  			</div>
  			<div class="row map_row">
  				<div class="col">

  					<!-- Google Map -->
  					<div class="map">
  						<div id="google_map" class="google_map">
  							<div class="map_container">
  								<div id="map"></div>
  							</div>
  						</div>
  					</div>

  				</div>
  			</div>
  		</div>
  	</div>
</div>
