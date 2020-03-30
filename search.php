<?php
/**
 * The template for displaying search results pages.
 *
 * @package storefront
 */

get_header(); ?>
<style>
@media screen and (max-width: 480px) {

.select {
	max-width: 300px;
    position: absolute;
    margin: 50px -270px;	
	}
.heightmob {
	min-height:220px;
}
.block20 {
	margin:100px 0px 20px 0px!important;
}
}


.searchmob {
	display:none;
}

@media screen and (max-width: 1024px) {
.searchpc {
	display:none;
}
}
@media screen and (max-width: 1200px) {
.searchmob {
	display:block;
}
}
@media screen and (max-width: 1900px) {
.block20 {
margin:20px 0px 20px 0px;
}
}
</style>

    <main class="main" id="main">
        <section class="section-meta">
            <div class="container section-meta__container">
			
                <?php if (have_posts()) : ?>

                    <h1 class="section-meta__title caption"><?php printf(esc_attr__('Search Results for: %s', 'storefront'), '<span>' . get_search_query() . '</span>'); ?></h1>
                <br/>

				<form method="get" action="<?php bloginfo('url'); ?>">
				<div style="background-color: transparent; border-radius: 15px; border: 1px solid #aaa; padding: 20px; margin: 10px 0 20px 0;">


				<div class="amounter section-category__amounter">
                <p class="amounter__label"><strong><?php lang('Уточнить критерии поиска', 'Уточнити критерії пошуку') ?></strong></p>
				
				<div class="searchpc">
				<input type="text" name="s" value="<?php the_search_query(); ?>" required="required"  style="margin-right: 20px; padding-left: 20px; padding-right: 20px; border-radius: 15px; background-color: transparent; border: 1px solid #aaa; -webkit-transition: .3s; -o-transition: .3s; transition: .3s; border-color: #d7d7d7; width: 90%; height: 40px;" placeholder=""  value=""  />
                </div>
				<div class="select-wrapper">
				<?php if (class_exists('WooCommerce')) : ?>
				<?php
					if(isset($_REQUEST['product_cat']) && !empty($_REQUEST['product_cat']))
					{
					$optsetlect=$_REQUEST['product_cat'];
					}
					else{
					$optsetlect=0;
					}
					$args = array(
					'show_option_all' => esc_html__( 'Все категории', 'woocommerce' ),
					'hierarchical' => 1,
					'depth' => 2,
					'class' => 'cat',
					'echo' => 1,
					'value_field' => 'slug',
					'selected' => $optsetlect
					);
					$args['taxonomy'] = 'product_cat';
					$args['name'] = 'product_cat';
					$args['class'] = 'select';
					wp_dropdown_categories($args);

					?>

					<input type="hidden" value="product" name="post_type">
				<?php endif; ?>
				</div>
				</div>
				<div style="margin:20px 0px 20px 0px;">			

				<div class="searchmob">
<!--				<input type="text" name="s" value="--><?php //the_search_query(); ?><!--" required="required"  style="margin: 0 20px 20px 0; padding-left: 20px; padding-right: 20px; border-radius: 15px; background-color: transparent; border: 1px solid #aaa; -webkit-transition: .3s; -o-transition: .3s; transition: .3s; border-color: #d7d7d7; width: 100%; height: 40px;" placeholder=""  value=""  />-->
                </div>
				<div class="searchpc">
				<button class="card__buy-now button" type="submit" style="margin-left:35%; position:absolute; width:170px;"><span><?php lang('ПОИСК', 'ПОШУК') ?></span></button>
				</div>
				<div class="searchmob">
				<button class="card__buy-now button" type="submit" style="margin-left:45%; position:absolute; width:110px;"><span><?php lang('ПОИСК', 'ПОШУК') ?></span></button>
				</div>
				<div style="max-width:50%;">
				<input type="checkbox" style="width: 15px; height: 15px;" name="search_desc"  <?=($_GET['search_desc']?'checked':'')?>>
					<?php lang('Искать только в описании товара', 'Шукати тільки в опису товару') ?>
				</div>
                </div>
			  
				</div>
				</form>
			
				
				
				
			
                    <!-- .page-header -->

                <div class="section-category__products">
                    <?php
                    while ( have_posts() ) {
                        the_post();
                        do_action('woocommerce_shop_loop');
                        wc_get_template_part('content', 'productshop');
                    }
                    ?>
                </div>

                <div class="section-category__pager">
                    <style>
                        h2.screen-reader-text{
                            display: none;
                        }
                    </style>
                    <?php
                    global $wp_query;

                    $args = array(
                        'type' 	    => 'list',
                        'next_text' => '→',
                        'prev_text' => '←',
                        'end_size' => 4,
                        'mid_size' => 0
                    );

                    the_posts_pagination( $args );

                    ?>
                </div>


                    <?php
                else : ?>
				<p class="amounter__label"><strong><?php lang('По запросу ничего не найдено. Попробуйте уточнить критерии поиска', 'По запиту нічого не знайдено. Спробуйте уточнити критерії пошуку') ?></strong></p>
                    				<form method="get" action="<?php bloginfo('url'); ?>">
				<div style="background-color: transparent; border-radius: 15px; border: 1px solid #aaa; padding: 20px; margin: 10px 0 20px 0;" class="heightmob">
				


				<div class="amounter section-category__amounter">
                <p class="amounter__label"><strong><?php lang('Уточнить критерии поиска', 'Уточнити критерії пошуку') ?></strong></p>
				
				<input type="text" name="s" value="<?php the_search_query(); ?>" required="required"  style="margin-right: 20px; padding-left: 20px; padding-right: 20px; border-radius: 15px; background-color: transparent; border: 1px solid #aaa; -webkit-transition: .3s; -o-transition: .3s; transition: .3s; border-color: #d7d7d7; width: 40%; height: 40px;" placeholder=""  value=""  />
                <div class="select-wrapper">
				<?php if (class_exists('WooCommerce')) : ?>
				<?php
					if(isset($_REQUEST['product_cat']) && !empty($_REQUEST['product_cat']))
					{
					$optsetlect=$_REQUEST['product_cat'];
					}
					else{
					$optsetlect=0;
					}
					$args = array(
					'show_option_all' => esc_html__( 'Все категории', 'woocommerce' ),
					'hierarchical' => 1,
					'depth' => 2,
					'class' => 'cat',
					'echo' => 1,
					'value_field' => 'slug',
					'selected' => $optsetlect
					);
					$args['taxonomy'] = 'product_cat';
					$args['name'] = 'product_cat';
					$args['class'] = 'select';
					wp_dropdown_categories($args);

					?>

					<input type="hidden" value="product" name="post_type">
				<?php endif; ?>
				</div>
				</div>
				<div class="block20">			

				
				<div class="searchpc">
				<button class="card__buy-now button" type="submit" style="margin-left:25%; position:absolute; width:170px;"><span><?php lang('ПОИСК', 'ПОШУК') ?></span></button>
				</div>
				<div class="searchmob">
				<button class="card__buy-now button" type="submit" style="margin-left:45%; position:absolute; width:110px;"><span><?php lang('ПОИСК', 'ПОШУК') ?></span></button>
				</div>
				<div style="max-width:50%;">
				<input type="checkbox" style="width: 15px; height: 15px;"  name="search_desc"  <?=($_GET['search_desc']?'checked':'')?>>
				<?php lang('Искать только в описании товара', 'Шукати тільки в опису товару') ?>
				</div>
                </div>
			  
				</div>
				</form>

                 <?php endif; ?>
            </div>
        </section>


    </main><!-- #main -->

<?php
do_action('storefront_sidebar');
get_footer();
