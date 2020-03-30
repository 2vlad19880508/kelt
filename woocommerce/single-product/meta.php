<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
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
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<div class="product_meta">

	

</div>
<script type='application/ld+json'> 
{
  "@context": "http://www.schema.org",
  "@type": "product",
  "MPN": "12345"
  "brand": "KOLORIT", // Название бренда
  "name": "<?php the_title(); ?>", // Название товара
  "color": "white", // Цвет товара, если есть
  "image": "https://kolorit.ua/wp-content/uploads/2018/07/standart-a-1.png", // Изображение товара
  "description": "<?php echo $wpseo_replace_vars; ?>", // Краткое описание товара
}
 </script>
