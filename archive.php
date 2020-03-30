<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */
if (isNewsListPage()):
    require_once __DIR__ . '/inc/news/list.php';
else:
    get_header(); ?>
<main class="main" id="main">
<?php
$str = $_SERVER['QUERY_STRING'];
$cat_slug = stristr($str, '+', true);
$cat_id = substr(strrchr($str, "+"), 1);


					$idObj = get_category_by_slug($cat_slug);
					$id = $idObj->cat_ID;
					$postid = get_post($id);
					$title = $postid->post_title;
					$content = $postid->post_content;
?>
<section class="section-meta">
		<div class="container section-meta__container">
			<!-- breadcrumbs start-->
			<ul class="breadcrumbs section-meta__breadcrumbs" id="breadcrumbs">
				<li class="breadcrumbs__item">

					<a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения Kelt Active', 'Інтернет магазин туристичного спорядження Kelt Active') ?></a>
				</li>
				<li class="breadcrumbs__item">
					<a class="breadcrumbs__link" href="/brands/"><?php lang('Бренды', 'Бренди') ?></li></a>
				</li>
				<li class="breadcrumbs__item breadcrumbs__item_last">
					<?php echo get_queried_object()->name;?>
				</li>
			</ul>
			<!-- breadcrumbs end-->

			<h1 class="section-meta__title caption">
				<?php echo $cat_id; ?>
			</h1>
		</div>
	</section>
<section class="section-brand-card">
		<div class="container section-brand-card__container">
			<div class="section-brand-card__left">
				<h2 class="section-brand-card__header"><?php lang('категории бренда', 'категорії бренду') ?> <?php the_title() ?></h2>
				<ul class="aside-menu aside-menu_decorated section-brand-card__aside-menu">
					<?php
					$idbr = $cat_id;
					$loop = new WP_Query( array(
						'post_type' => 'product',
						'posts_per_page' => -1,
						'meta_key' => 'import_brand',
						'meta_value' => $idbr,
						'orderby' => 'menu_order',
						'order' => 'ASC',
					) );

					while ( $loop->have_posts() ): $loop->the_post();
					?>
					<?php
					$post_id = get_the_ID();
					$cur_terms = get_the_terms($post_id, 'product_cat' );
					foreach( $cur_terms as $cur_term ){
					$cat_slug = $cur_term->slug; ?>
					<li id="<?php echo $cat_slug; ?>" class="aside-menu__item">
						<a href="/cat_brendy/<?php echo $cat_name = $cur_term->slug; ?>/?<?php echo $cat_name = $cur_term->slug; ?>+<?php echo $idbr;?>">
							<?php echo $cat_name = $cur_term->name; ?>
						</a>
					</li>
					<?php } ?>
					<?php endwhile; wp_reset_postdata(); ?>

					<!--OR SELECT BRAND-->
					<?php
					$idbr = get_the_ID();
					$loop = new WP_Query( array(
						'post_type' => 'product',
						//'posts_per_page' => '4',
						'meta_key' => 'brand',
						'meta_value' => $idbr,
						'orderby' => 'menu_order',
						'order' => 'ASC',
					) );

					while ( $loop->have_posts() ): $loop->the_post();
					?>
					<?php
					$post_id = get_the_ID();
					$cur_terms = get_the_terms($post_id, 'product_cat' );
					foreach( $cur_terms as $cur_term ){
					$cat_slug = $cur_term->slug; ?>
					<li id="<?php echo $cat_slug; ?>" class="aside-menu__item">
						<a href="/cat_brendy/<?php echo $cat_name = $cur_term->slug; ?>/?<?php echo $cat_name = $cur_term->slug; ?>+<?php
							$post_object = get_field( 'brand' );
							if ( $post_object ):
								$post = $post_object;
							setup_postdata( $post );
							?><?php the_ID(); ?><?php wp_reset_postdata(); ?>
							<?php endif; ?>">
							<?php echo $cat_name = $cur_term->name; ?>
						</a>
					</li>
					<?php } ?>
					<?php endwhile; wp_reset_postdata(); ?>
					<!---->
				</ul>

			</div>
			<div class="section-brand-card__right">
				<article class="article text text_light section-brand-card__article clearfix">
					<h2 class="hidden">
						<?php echo $cat_id; ?>
					</h2>
					<?php
					$brps = $cat_id;
					$args = array(
						'post_type' => 'brendy',
						//'posts_per_page' => -1,
						'title' => $brps,
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ): $loop->the_post();
					?>
					<img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="logo"/>
					<?php the_content(); ?>
					<?php endwhile; wp_reset_query(); ?>
				</article>
			</div>
		</div>
	</section>
<section class="section-recent margin-bottom-60">
		<div class="container section-recent__container">
			<h2 class="caption caption_black caption_margin caption_center caption_mobile"><?php lang('Товары бренда', 'Товари бренду') ?> </h2>
			<div class="section-recent__slider-wrapper">
				<div class="slider slider_recent section-recent__slider owl-carousel owl-carousel_recent owl-theme">
					<?php
					global $product;
					$idbr = $cat_id;
					$cat_slug = stristr($str, '+', true);
					$loop = new WP_Query( array(
					  'product_cat' => $cat_slug,
					  'post_type' => 'product',
						'meta_key' => 'import_brand',
						'meta_value' => $idbr,
					  'posts_per_page' => 40,
					  'orderby' => 'menu_order',
					  'order' => 'ASC',
					  ));

					while ( $loop->have_posts() ): $loop->the_post();
					global $product;
					/** @var WC_Product_Simple $product */

					$price = get_post_meta( get_the_ID(), '_regular_price', true );
					$sale = get_post_meta( get_the_ID(), '_price', true );
					$cust_price = $product->get_display_price();
					?>
					<a class="mini-card section-recent__mini-card" href="<?php the_permalink(); ?>">

						<?php
						if($product->get_type() == "variable"){
						?>
						<div class="price mini-card__price">
							<span class="price__digits">
								<?php echo $sale; ?>
							</span>
							<span class="price__unit">грн.</span>
						</div>
						<?php
						} else {
							?>
						<?php if ($sale !== $price) { ?>
						<div class="price price_old mini-card__price">
							<span class="price__digits">
								<?php echo $sale; ?>
							</span><span class="price__unit">грн.</span>
						</div>
						<div class="price price_new mini-card__price">
							<span class="price__digits">
								<?php echo $cust_price; ?>
							</span><span class="price__unit">грн.</span>
						</div>
						<?php } else { ?>
						<div class="price mini-card__price">
							<span class="price__digits">
								<?php echo $cust_price; ?>
							</span>
							<span class="price__unit">грн.</span>
						</div>
						<?php } ?>
						<?php
						}
						?>
						<div class="mini-card__image-box">
							<?php if (has_post_thumbnail( $loop->post->ID )): ?>
							<?= get_the_post_thumbnail($loop->post->ID, 'shop_catalog', ['class' => 'recent ware']); ?>
							<?php endif; ?>
							<!--                            <img src="-->
							<?php //bloginfo('template_directory')?>
							<!--/images/recent/r-4.jpg" alt="recent ware"/>-->
						</div>
						<p class="mini-card__name">
							<?php the_title(); ?>
						</p>
					</a>

					<?php endwhile; wp_reset_postdata(); ?>

				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->
<style>
#<?php
	$cat_slug = stristr($str, '+', true);
	echo $cat_slug ?> a {
    color: #d50637;
}
</style>
    <?php
    //do_action( 'storefront_sidebar' );
    get_footer();
endif;