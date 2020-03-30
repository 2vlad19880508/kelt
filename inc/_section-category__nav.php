<?php
$currentCategory = get_queried_object();
$children=get_categories(
    array(
        'taxonomy' => 'product_cat',
        'parent' => $currentCategory->term_id
    )
);
?>
<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if (strpos($url , '/shop/') !== false) { ;?>


		<?php } else { ?>


<div class="section-category__nav">
    <div class="section-category__menu">
        <span class="section-category__header" ><?php lang('категории', 'категорії') ?></span>
        <ul class="aside-menu aside-menu_decorated section-category__aside-menu" style="margin-top:30px;">
            <?php

            $categories = get_categories(
                [
                    'taxonomy' => 'product_cat',
                    'parent' => $currentCategory->parent
                ]
            );

            $sameLevelCats = array_map(function ($cat) {
                return $cat->term_id;
            }, $categories);

            if (($key = array_search($currentCategory->term_id, $sameLevelCats)) !== false) {
                unset($sameLevelCats[$key]);
            }
            
            $args = array(
                'show_option_all'    => '',
                'show_option_none'   => __('No categories'),
                //'orderby'            => 'term_group',
				'order'              => 'ASC',
                'show_last_update'   => 0,
                'style'              => 'list',
                'show_count'         => 0,
                'hide_empty'         => 1,
                'child_of'           => $currentCategory->parent,
//                'child_of'           => $currentCategory->parent ? $currentCategory->parent : $currentCategory->term_id,
                'feed'               => '',
                'feed_type'          => '',
                'feed_image'         => '',
                'exclude'            => implode(', ', $sameLevelCats),
//                'exclude_tree'       => implode(',', $sameLevelCats),
                'include'            => '',
                'hierarchical'       => true,
                'title_li'           => '',
                'use_desc_for_title' => false,
                'number'             => NULL,
                'echo'               => 1,
//                'depth'              => 2,
                'current_category'   => $currentCategory->term_id,
                'pad_counts'         => 0,
                'taxonomy'           => 'product_cat',
                'walker'             => 'Walker_Category',
                'hide_title_if_empty' => true,
                'separator'          => '<br />',
            );
            wp_list_categories($args);

            ?>
        </ul>
    </div>
    <div class="section-category__filters">
	
	
        <?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if ($url == 'https://kelt.com.ua/product-category/turisticheskoe-snaryazhenie/') {
            echo "";
        } elseif (strpos($url, '/turisticheskoe-snaryazhenie/page/') !== false) {
            echo "";
        } elseif ($url == 'https://kelt.com.ua/product-category/kemping/') {
            echo "";
        } elseif (strpos($url, '/product-category/kemping/page/') !== false) {
            echo "";
        } elseif ($url == 'https://kelt.com.ua/product-category/bagazh/') {
            echo "";
        } elseif (strpos($url, '/product-category/bagazh/page/') !== false) {
            echo "";
        } elseif ($url == 'https://kelt.com.ua/product-category/sport/') {
            echo "";
        } elseif (strpos($url, '/product-category/sport/page/') !== false) {
            echo "";
        } elseif ($url == 'https://kelt.com.ua/product-category/detyam/') {
            echo "";
        } elseif (strpos($url, '/product-category/detyam/page/') !== false) {
            echo "";
        } elseif ($url == 'https://kelt.com.ua/product-category/odezhda/') {
            echo "";
        } elseif (strpos($url, '/product-category/odezhda/page/') !== false) {
            echo "";
        } elseif ($url == 'https://kelt.com.ua/product-category/obuv/') {
            echo "";
        } elseif (strpos($url, '/product-category/obuv/page/') !== false) {
            echo "";
        } elseif ($url == 'https://kelt.com.ua/product-category/optika/') {
            echo "";
        } elseif (strpos($url, '/product-category/optika/page/') !== false) {
            echo "";
        } elseif (count($children) == 0) { ?>
            <span class="section-category__header"><?php lang('Фильтр', 'Фільтр') ?></span>
<p></p>
            <?php dynamic_sidebar( 'sidebar_filter' ); }?>
			
			<br>
			<?php if (strpos($url, '/?filter') !== false) {
				$visibles = 'block';
			} else {
				$visibles = 'none';
			} ?>
			<div style="display:<?php echo $visibles; ?>;">
				<center><a href="<?php urls(); ?>" class="card__buy-now button" style="font-size:14px; max-width:180px;"><?php lang('Сбросить фильтр', 'Сбросити фільтр') ?></a></center>
			</div>

    </div>
</div>

		<?php } ?>