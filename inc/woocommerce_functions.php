<?php


function woocommerce_template_loop_product_title() {
    echo '<a class="product__name" href="'.get_the_permalink(get_the_ID()).'">' . get_the_title() . '</a>';
}


/**
 * Insert the opening anchor tag for products in the loop.
 */
function woocommerce_template_loop_product_link_open() {
    global $product;

    $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

    echo '<a href="' . esc_url( $link ) . '" class="product__image-box">';
}