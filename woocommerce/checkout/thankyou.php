<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style>
.page {
min-height: 60vh;
}
@media screen and (max-width: 420px) {
	card__buy-now button {
	width:75%;
	}
}
card__buy-now button {
width:25%;
}
}
</style>
<section class="section-meta">
        <div class="container section-meta__container">
          <!-- breadcrumbs start-->
          <ul class="breadcrumbs section-meta__breadcrumbs" id="breadcrumbs">
            <li class="breadcrumbs__item">

              <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Главная', 'Головна'); ?></a>
            </li>
            <li class="breadcrumbs__item breadcrumbs__item_last"><?php lang('Корзина', 'Кошик'); ?></li>
          </ul>
          <!-- breadcrumbs end-->

         
        </div>
      </section>

<section class="section-cart">
<div class="container section-cart__container">
  <center>
	<h1 style="font-size:46px; color:#d50637;"><?php lang('Спасибо за заказ!', 'Дякуємо за замовлення'); ?></h1>

				

				<div class="page-content">	
		<p><?php lang('В ближайшее время наш менеджер свяжется с Вами для подтверждения заказа', 'Найближчим часом наш менеджер з Вами зв\'яжиться'); ?></p>
		<p><br></p>
					<p><a href="<?php echo get_home_url(); ?>" style="text-decoration:none;"><button class="card__buy-now button" style="margin-left:50px; text-decoration:none;"><span>Продолжить покупки</span></button>		</a> </p>
					
			</div>
		</center>
  </div>
</section>