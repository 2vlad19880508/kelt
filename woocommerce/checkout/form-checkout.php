<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */
if (WC()->cart->is_empty()) {
    // если корзина пустая рендерим друой шаблон
    return require_once __DIR__ . '/form-checkout-empty.php';
}
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>
<section class="section-meta">
        <div class="container section-meta__container">
          <!-- breadcrumbs start-->
          <ul class="breadcrumbs section-meta__breadcrumbs" id="breadcrumbs">
            <li class="breadcrumbs__item">

              <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Главная', 'Головна') ?></a>
            </li>
            <li class="breadcrumbs__item breadcrumbs__item_last"><?php lang('Ваш заказ', 'Ваше замовлення') ?></li>
          </ul>
          <!-- breadcrumbs end-->

          <h1 class="section-meta__title caption"><?php lang('Ваш заказ', 'Ваше замовлення') ?></h1>
        </div>
      </section>

<section class="section-cart">
<div class="container section-cart__container">
    <form class="section-cart__form woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

        <?php do_action( 'woocommerce_before_cart_table' ); ?>

        <div class="cart section-cart__cart">
            <div class="cart__wrapper">
                <div class="cart__headers">
				     <div class="cart__info"><span><?php lang('информация о товаре', 'інформація про товар') ?></span></div>
                    <div class="cart__id"><span><?php lang('Код товара', 'Код товару') ?></span></div>
                    <div class="cart__size"><span><?php lang('Размер', 'Розмір') ?></span></div>
                    <div class="cart__amount"><span><?php lang('Количество', 'Кількість') ?></span></div>
                    <div class="cart__total"><span><?php lang('цена', 'ціна') ?></span></div>
                    <div class="cart__delete"></div>
                   
                </div>
                <div class="cart__wares">

                    <?php
                    $totalSum = 0;
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                            ?>
                            <div class="product-position cart__product-position woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                                <div class="product-position__info cart__info">
                                    <div class="product-position__image-box">
                                        <?php
                                        $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                        if (!$product_permalink) {
                                            echo $thumbnail; // PHPCS: XSS ok.
                                        } else {
                                            printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                                        }
                                        ?>
                                    </div>
                                    <a class="product-position__description" href="<?= $product_permalink ?>">
                                        <p><?= $_product->get_name() ?></p>
                                    </a>
                                </div>

                                <div class="product-position__id cart__id">
                                    <span><?= ( $sku = $_product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span>
                                </div>



                                <div class="product-position__amount cart__amount">
                                    <?php
                                    if ( $_product->is_sold_individually() ) {
                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                    } else {
                                        $product_quantity = woocommerce_quantity_input( array(
                                            'input_name'   => "cart[{$cart_item_key}][qty]",
                                            'input_value'  => $cart_item['quantity'],
                                            'max_value'    => $_product->get_max_purchase_quantity(),
                                            'min_value'    => '0',
                                            'product_name' => $_product->get_name(),
                                        ), $_product, false );
                                    }

                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                    ?>
                                </div>

                                <div class="product-position__total cart__total">
                                    <span class="product-position__sum">
                                        <?= ($_product->price * $cart_item['quantity']); ?>
                                        <?php $totalSum =  ($_product->price * $cart_item['quantity']); ?>
                                    </span>
                                    <span>грн.</span>
                                </div>

                                <div class="product-position__delete cart__delete">
                                    <?php
                                    // @codingStandardsIgnoreLine
                                    echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                        '<a href="%s" class="product-position__delete-link remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                        'X',
                                        esc_attr( $product_id ),
                                        esc_attr( $_product->get_sku() )
                                    ), $cart_item_key );
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                    <?php do_action( 'woocommerce_cart_contents' ); ?>


                    <?php do_action( 'woocommerce_cart_actions' ); ?>

                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>


                </div>
            </div>
            <div class="cart__total-full">
                <span class="cart__total-full-label"><?php lang('Итого: ', 'Усього: ') ?> </span>
                <span class="cart__total-full-sum"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
            </div>

            <?php do_action( 'woocommerce_after_cart_contents' ); ?>

        </div>
        <?php do_action( 'woocommerce_after_cart_table' ); ?>

        <button style="float: right;display: none" type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

    </form>

    <script type="text/javascript">
        jQuery('.quantity input').change(function(){
            console.log('asdsad');
            $('.section-cart__form.woocommerce-cart-form button[type="submit"]').show();
        })
    </script>

  </div>
</section>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
<!--END CART-->
<section class="section-cart">
	<div class="container section-cart__container">
		<div class="delivery-data section-cart__delivery-data">
		<h3 class="caption delivery-data__caption caption_mobile"><?php lang('заполните ваши данные ', 'заповніть ваші данні ') ?></h3>
<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
<div class="delivery-data__info">
		<div id="first_bl" class="delivery-data__block">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
		</div>
		<div class="delivery-data__block">
			<p class="delivery-data__docket bold"><?php lang('Способ доставки ', 'Спосіб доставки ') ?></p>
			<hr class="delivery-data__line">

			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
<div id="remove_bl">
			<div class="radio-group">

				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>
			</div>
		</div>

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	</div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
			</div>
	</div>
</section>
