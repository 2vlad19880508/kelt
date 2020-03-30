<?php
/**
 * Customer on-hold order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-on-hold-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer first name */ ?>
<p>Здравствуйте <?php printf( __( '%s!', 'woocommerce' ), $order->get_billing_first_name() ); ?><br>Благодарим за интерес к товарам нашего интернет-магазина Kelt Active. Ваш заказ получен и поступил в обработку. Наш менеджер свяжется с вами для уточнения деталей доставки и оплаты в ближайшее время.</p><?php // phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped ?>

<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

?>
 <div class="socials section-contacts__socials">
                <center><br>
                     <a class="socials__item socials__item_fb" href="https://www.facebook.com/Keltshop/"><img src="https://kelt.com.ua//wp-content/themes/storefront/images/icons/fb2.png" width="42px"></a>
            
					<a class="socials__item socials__item_tw" href="https://twitter.com/keltactive"><img src="https://kelt.com.ua//wp-content/themes/storefront/images/icons/twitter.png" width="40px"></a>
            
					<a class="socials__item socials__item_insta" href="https://www.instagram.com/keltactive/"><img src="https://kelt.com.ua//wp-content/themes/storefront/images/icons/insta.png" width="40px"></a>
				</center>

      
</div>	<br>  
<center>	
<center><span style="font-size:20px;">МЫ СТАРАЕМСЯ ДЛЯ ВАС</span></center><br>
Авторское право &copy; 2019	<br>
Все права защищены	  
<p>
Наши контакты: <a class="contact-box__link link bold" href="tel:+38 099 462 44 71">+38 099 462 44 71</a>&nbsp;&nbsp;&nbsp;<a class="contact-box__link link bold" href="tel:+38 068 427 98 08">+38 068 427 98 08</a>  <br>   
<a class="contact-box__link link bold" href="mailto:info.keltshop@gmail.com">info.keltshop@gmail.com</a> <br>
<a href="https://kelt.com.ua/">kelt.com.ua</a><br>
 </p>
<p class="contact-box__item">График работы: Пн - Сб:  с 10:00 до 18:00</p>
</center>
<?php

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
