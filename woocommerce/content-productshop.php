
<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}

if ('name_list_2' == $orderby_value_z) {
    $args['orderby'] = 'name';
    $args['order'] = 'DESC';
    $args['meta_key'] = '';
}

$args['order'] = 'asc';
$args['orderby'] = 'meta_value_num';
$args['meta_key'] = '_price';

$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>

<?php if ($product->is_in_stock()) { ?>
<div <?php wc_product_class('product section-category__product product_view_tile '); ?>>
    <?php } else { ?>
    <div class="product product_not-available section-category__product product_view_tile">
        <?php } ?>





                <?php
                $price = get_post_meta( get_the_ID(), '_regular_price', true );
                $sale = get_post_meta( get_the_ID(), '_price', true );
                $cust_price = $product->get_display_price();
                if($product->get_type() == "variable"){
                    ?>

                    <div class="price mini-card__price">
							<span class="price__digits">
								<?php lang('Цена: ', 'Ціна: ') ?> <?php echo $cust_price; ?>
							</span>
                        <span class="price__unit">грн</span>
                    </div>
                    <?php
                } else {
                    ?>
                    <?php if ($sale !== $price) { ?>
                        <div class="price price_old mini-card__price">
							<span class="price__digits">
								<?php lang('Цена: ', 'Ціна: ') ?> <?php echo $price; ?>
							</span><span class="price__unit">грн</span>
                        </div>
                        <div class="price price_new mini-card__price">
							<span class="price__digits">
								<?php lang('Цена: ', 'Ціна: ') ?> <?php echo $sale; ?>
							</span><span class="price__unit">грн</span>
                        </div>
                    <?php } else { ?>


                 <?php if ($product->is_in_stock()) { ?>
                        <div class="price mini-card__price">
							<span class="price__digits">
								<?php lang('Цена: ', 'Ціна: ') ?> <?php echo $cust_price; ?>
							</span>
                            <span class="price__unit">грн</span>
                        </div>
                <?php } else { ?>
                            <div class="price mini-card__price" style="background: #d7d7d7;">
							<span class="price__digits">
								<?php lang('Цена: ', 'Ціна: ') ?> <?php echo $cust_price; ?>
							</span>
                        <span class="price__unit">грн</span>
                    </div>

                <?php } ?>
                    <?php } ?>
                    <?php
                }
                ?>

            <div class="product__body">
                <!--product_in_listingEX-->

                <?php if ($product->is_in_stock()) { ?>
                <div class="first_bl">
                    <?php } else { ?>
                    <div class="first_bl b2">
                        <?php } ?>
                        <?php $post_id = get_the_ID();
                        $value = get_post_meta($post_id, 'акция', true);
                        if ($sale !== $price) { ?>
                            <img src="<?php bloginfo('template_directory') ?>/images/sale.png"
                                 style="position:absolute; width:40%; margin-top: -60px; margin-left: -30px;">
                        <?php } ?>
                        <a href="<?php the_permalink(); ?>"
                           class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="Фото <?php the_title(); ?>"
                                 title="Фотография <?php the_title(); ?>">
                             </a>
                    </div>
                    <div class="product__info-box">
                        <?php if ($product->is_in_stock()) { ?>
                            <h2 class="woocommerce-loop-product__title"><?php trim_title_chars(50, '...'); ?></h2>
                            <?php

                            /** do_action( 'woocommerce_shop_loop_item_title' );
                             * Hook: woocommerce_after_shop_loop_item_title.
                             *
                             * @hooked woocommerce_template_loop_rating - 5
                             * @hooked woocommerce_template_loop_price - 10
                             */
                            //do_action( 'woocommerce_after_shop_loop_item_title' );
                            ?>
                        <?php } else { ?>
                            <div style="color:#d7d7d7;">
                                <h2 class="woocommerce-loop-product__title"><?php trim_title_chars(50, '...'); ?></h2>
                            </div>
                        <?php } ?>

                        <p class="product__traits"></p>
                        <p class="product__description">
                            Код
                            товара: <?php echo ($sku = $product->get_sku()) ? $sku : esc_html__('N/A', 'woocommerce'); ?>

                            <?php $impbr = get_field('import_brand');
                            if (empty($impbr)) {
                                ?>
                                <?php
                                $post_object = get_field('brand');
                                if ($post_object):
                                    $post = $post_object;
                                    setup_postdata($post);
                                    ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php the_post_thumbnail_url(); ?>" style="padding-top:10px;"
                                             alt="brand"/>
                                    </a>

                                    <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                                <!---->
                                <?php
                            } else {
                                ?>
                                <!---->
                                <?php
                                $args = array(
                                    'post_type' => 'brendy',
                                    //'posts_per_page' => -1,
                                    'title'     => $impbr,
                                );
                                $loop = new WP_Query($args);
                                while ($loop->have_posts()): $loop->the_post();
                                    ?>
                                    <a class="brand section-brands__brand" href="<?php the_permalink(); ?>"
                                       style="margin-top:30px; border:0;">

                                        <img src="<?php the_post_thumbnail_url(); ?>"
                                             style="max-height:70px; max-width:70px;" alt="brand"/></a>
                                <?php endwhile;
                                wp_reset_query(); ?>
                                <!---->
                                <?php
                            }
                            ?>


                        </p>
                        <?php
                        /**
                         * Hook: woocommerce_after_shop_loop_item.
                         *
                         * @hooked woocommerce_template_loop_product_link_close - 5
                         * @hooked woocommerce_template_loop_add_to_cart - 10
                         */
                        if ($product->is_in_stock()) {
                            do_action('woocommerce_after_shop_loop_item');
                        } else {
                            echo '<div class="product__not-available" >Нет в наличии</div>';
                        }

                        ?>
                    </div>
                </div>
            </div>
