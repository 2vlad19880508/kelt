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

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

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
                                            printf('<a href="%s" style="max-height:100px;">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
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

								<div class="product-position__size cart__size">
									<span><?php
									$str = $_product->get_name();
									$str2 = explode("-", $str);
									$use_this = $str2[1];
									echo $use_this;
									?></span>
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

                    <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                    <?php do_action( 'woocommerce_cart_actions' ); ?>

                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>


                </div>
            </div>
            <div class="cart__total-full">
                <span class="cart__total-full-label"><?php lang('Итого: ', 'Усього: ') ?></span>
                <span class="cart__total-full-sum"><?= $totalSum ?></span><span>грн.</span>
            </div>

            <?php do_action( 'woocommerce_after_cart_contents' ); ?>

        </div>
        <?php do_action( 'woocommerce_after_cart_table' ); ?>
    </form>
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
