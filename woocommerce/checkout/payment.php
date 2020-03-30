
	<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}
?>
<div id="payment" class="woocommerce-checkout-payment delivery-data__block">
	<div id="next_bl" class="delivery-data__block">
		<p class="delivery-data__docket bold"><?php lang('Адрес доставки', 'Адреса доставки') ?></p>
		<hr class="delivery-data__line">
		<?php do_action( 'woocommerce_checkout_billing' ); ?>
	</div>
	<p class="delivery-data__docket bold"><?php lang('Способ оплаты', 'Спосіб оплати') ?></p>
	<hr class="delivery-data__line">
	<?php if ( WC()->cart->needs_payment() ) : ?>
	<div class="radio-group">
		<ul class="wc_payment_methods payment_methods methods">
			<?php
			if ( ! empty( $available_gateways ) ) {
				foreach ( $available_gateways as $gateway ) {
					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
				}
			} else {
				echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
			}
			?>
		</ul>
	</div>
	<?php endif; ?>
	<div class="form-row place-order">
		<noscript>
			<?php esc_html_e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?>
			<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
		</noscript>

		<?php wc_get_template( 'checkout/terms.php' ); ?>
		
		<div class="delivery-data__block">
			<p class="delivery-data__docket margin bold"><?php lang('Комментарий к заказу', 'Комментар до замовлення') ?></p>
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
		</div>

		<?php do_action( 'woocommerce_review_order_before_submit' ); 
		$url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	if (strpos($url, 'kelt.com.ua/uk/') !== false) {
		$text20 = 'Оформити';
	} else {
		$text20 = 'Оформить';
	}
		?>

		<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button section-cart__submit alt" name="woocommerce_checkout_place_order" id="place_order"><span>' . $text20 . '</span></button>' ); // @codingStandardsIgnoreLine ?>
		<a class="button button_green section-cart__resume" href="<?php echo get_home_url(); ?>"><span><?php lang('Продолжить покупки ', 'Пролдовжити покупки') ?></span></a>

		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

		<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
	</div>
</div>
<script type="text/javascript">

jQuery(document).ready(function() {
   if(jQuery('#shipping_method_0_free_shipping1').is(':checked')) { 
	   jQuery("#next_bl #billing_address_1_field").css("display", "none");
   }
});
	
jQuery(document).ready(function() {
   if(jQuery('#shipping_method_0_free_shipping2').is(':checked')) { 
	   jQuery("#next_bl #billing_city_field").css("display", "none");
	   jQuery("#next_bl #billing_postcode_field").css("display", "none");
   }
});

jQuery(document).ready(function() {
   if(jQuery('#shipping_method_0_free_shipping3').is(':checked')) { 
	   jQuery("#next_bl #billing_city_field").css("display", "none");
	   jQuery("#next_bl #billing_postcode_field").css("display", "none");
   }
});
</script>
<?php
if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}
