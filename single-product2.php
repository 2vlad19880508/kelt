<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<div>
  <div itemtype="http://schema.org/Product" itemscope>
    <meta itemprop="mpn" content="<?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?>" />
    <meta itemprop="name" content="<?php the_title(); ?>" />
    <link itemprop="image" href="<?php the_post_thumbnail_url(); ?>" />
    <meta itemprop="description" content="<?php the_title(); ?> - Лучшая цена✓ 100% Гарантия качества✓ ✈ Оперативная доставка✓ Акции! Скидки! Интернет-магазин KELT" />
    <div itemprop="offers" itemtype="http://schema.org/Offer" itemscope>
      <link itemprop="url" href="<?php echo $url; ?>" />
      <meta itemprop="availability" content="https://schema.org/InStock" />
      <meta itemprop="priceCurrency" content="UAH" />
      <meta itemprop="itemCondition" content="https://schema.org/UsedCondition" />
      <meta itemprop="price" content="<?php echo $product->get_display_price(); ?>" />
      <meta itemprop="priceValidUntil" content="2020-11-05" />
      <div itemprop="seller" itemtype="http://schema.org/Organization" itemscope>
        <meta itemprop="name" content="<?php the_title(); ?>" />
      </div>
    </div>
    <div itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating" itemscope>
      <meta itemprop="reviewCount" content="89" />
      <meta itemprop="ratingValue" content="4.4" />
    </div>
    <div itemprop="review" itemtype="http://schema.org/Review" itemscope>
      <div itemprop="author" itemtype="http://schema.org/Person" itemscope>
        <meta itemprop="name" content="Kelt" />
      </div>
      <div itemprop="reviewRating" itemtype="http://schema.org/Rating" itemscope>
        <meta itemprop="ratingValue" content="4" />
        <meta itemprop="bestRating" content="5" />
      </div>
    </div>
    <meta itemprop="sku" content="<?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?>" />
    <div itemprop="brand" itemtype="http://schema.org/Thing" itemscope>
      <meta itemprop="name" content="ACME" />
    </div>
  </div>
</div>
<main class="main" id="main">
	<section class="section-meta">
		<div class="container section-meta__container">
			<!-- breadcrumbs start-->
			<?php
				$args = array(
						'delimiter' => '<span class="delimiter">/</span>',
						'before' => '<span class="breadcrumb-title">' . __( '', 'woothemes' ) . '</span>'
				);
			?>
			<?php woocommerce_breadcrumb( $args ); ?>
			<?php // if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
			<!-- breadcrumbs end-->

			<h1 class="section-meta__title caption">
				<?php the_title(); ?>
			</h1>
		</div>

		<?php while ( have_posts() ) : the_post(); ?>


		<section class="section-card" style="padding-top:50px;">
			<div class="container section-card__container">
				<div class="card section-card__card">
					<div class="card__gallery xzoom-container">
					<?php $post_id = get_the_ID(); 
					$value = get_post_meta( $post_id, 'акция', true );
					if ($value == '+') { ?>
					<img src="<?php bloginfo('template_directory')?>/images/sale.png" style="position:absolute; width:60%; margin-left:30%;">
					<?php } ?>
						<img class="xzoom" id="xzoom-default" style="max-height: 400px;" src="<?php the_post_thumbnail_url(); ?>" xoriginal="<?php the_post_thumbnail_url(); ?>">
						<div class="xzoom-thumbs">
							<a style="text-decoration: none;" href="<?php the_post_thumbnail_url(); ?>">
					<img class="xzoom-gallery" style="height:60px;" src="<?php the_post_thumbnail_url(); ?>" xoriginal="<?php the_post_thumbnail_url(); ?>" xpreview="<?php the_post_thumbnail_url(); ?>" xoriginal="<?php the_post_thumbnail_url(); ?>" alt="Фото <?php the_title(); ?>" title="Фотография <?php the_title(); ?>">
					</a>
							<?php
							global $product;
							global $post;

							$attachment_ids = $product->get_gallery_attachment_ids();


							foreach ( $attachment_ids as $attachment_id ) {
								?>
								
							<a style="text-decoration: none;" href="<?php echo wp_get_attachment_image_url( $attachment_id, 'full', " " ); ?>">
					<img class="xzoom-gallery" style="height:60px;" src="<?php echo wp_get_attachment_image_url( $attachment_id, 'full', "" ); ?>" xpreview="<?php echo wp_get_attachment_image_url( $attachment_id, 'full', "" ); ?>" alt="Фото <?php the_title(); ?>" title="Фотография <?php the_title(); ?>">
					</a>
						
							<?php
							}
							?>
						</div>
					</div>
					<div class="card__info" action="#" method="post">
												<?php $impbr =  get_field('import_brand'); 
							if (empty($impbr)) {
							?>
							<?php
							$post_object = get_field( 'brand' );
							if ( $post_object ):
								$post = $post_object;
							setup_postdata( $post );
							?>
							<a href="<?php the_permalink(); ?>">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="brand" style="max-width:100px; max-height:100px; min-width:100px; min-height:100px;">
							</a>
						
							<?php wp_reset_postdata(); ?>
							<?php endif; ?>
							<!---->
							<?php 
							} else {
							?>
							
							<?php
							}
							?>						
						<!---->
							<?php
							$args = array( 
								'post_type' => 'brendy', 
								//'posts_per_page' => -1,
								'title' => $impbr,
							);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ): $loop->the_post();
							?>
							<a style="border:0; margin-left:10px;" href="<?php the_permalink(); ?>">

					  		<img src="<?php the_post_thumbnail_url(); ?>" alt="brand"/  style="max-width:100px; max-height:100px; min-width:100px; min-height:100px;"></a>
							<?php endwhile; wp_reset_query(); ?>
							<!---->
						<p class="card__name">
							<?php the_title(); ?>
						</p>
						<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

						<p class="card__id">Код товара:
							<?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?>
						</p>

						<?php endif; ?>

						<?php  if (get_post_meta(get_the_ID(), '_stock_status', true) == 'outofstock') {
						echo '<p class="card__absents">Нет в наличии</p>';
				} else {
						echo '<p class="card__exists">Есть в наличии</p>';
				} ?>

						<p class="card__price">
							Цена: <?php echo $product->get_display_price(); ?> грн</p>
						<?php 
				if($product->get_type() == "variable"){
				?>
						<?php
						} else {
							?>
							
							
			<?php if ( $product->is_in_stock() ) { ?>
						<a class="card__add button button_green" href="<?php echo do_shortcode('[add_to_cart_url id=" '.get_the_ID().' "]'); ?>" style="text-decoration:none;">
			    <span>Добавить в корзину</span>
             	</a>
					<?php } else { ?>
						
						<?php } ?>
						<?php
						}
						?>
							<?php if ( $product->is_in_stock() ) { ?>
						<div class="card__actions">
							<button class="card__buy-now button modal-buy-opener"><span>быстрый заказ</span></button>

							
							<?php echo do_shortcode('[yith_compare_button]');  //кнопка сравнение товаров?>
						</div>
						<?php } else { ?>
						
						<?php } ?>
						<div class="card__sizes picker">
							<?php 
				if($product->get_type() == "variable"){
				woocommerce_variable_add_to_cart();
				//do_action( 'woocommerce_single_product_summary' );
				?>
							<?php
							} else {
								//woocommerce_template_loop_add_to_cart();
							}
							?>
						</div>
						<?php
						$post_object = get_field( 'razm' );
						if ( $post_object ):
							$post = $post_object;
						setup_postdata( $post );
						?>
						<a class="card__grids-link button button_inverted" style="padding-top:12px;" href="<?php the_permalink(); ?>/?=tovar"><span>Размерные сетки</span></a>
						<?php wp_reset_postdata(); ?>
						<?php endif; ?>						

					</div>
				</div>
				<div class="section-card__features">
					<div class="fancy-text fancy-text_car section-card__fancy-text">
						<p>Оперативная доставка</p>
					</div>
					<div class="fancy-text fancy-text_card section-card__fancy-text">
						<p>Оплата удобным для вас способом</p>
					</div>
					<div class="fancy-text fancy-text_percent section-card__fancy-text">
						<p>Скидки постоянным клиентам</p>
					</div>
					<div class="fancy-text fancy-text_shield section-card__fancy-text">
						<p>Официальная гарантия</p>
					</div>
				</div>
				<div class="section-card__info text">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
		<?php endwhile; // end of the loop. ?>
		<section class="section-comments">
			<div class="container section-comments__container">

				<?php comments_template(); ?>


			</div>
		</section>
		<section class="section-recent margin-bottom-60">
			<div class="container section-recent__container">
				<h2 class="caption caption_black caption_margin caption_center caption_mobile">похожие товары</h2>
				<?php 
			//echo $post_id = get_the_ID(); 
			$cur_terms = get_the_terms($post_id, 'product_cat' );
			foreach( $cur_terms as $cur_term ){
				$cat_slug = $cur_term->slug;
				$cat_name = $cur_term->name;
			}
			?>
				<div class="section-recent__slider-wrapper">
					<div class="slider slider_recent section-recent__slider owl-carousel owl-carousel_recent owl-theme" style="max-height:400px;">
						<?php $post_id = get_the_ID(); ?>
						<?php
						$args = array(
							'post_type' => 'product', // указываем, что выводить нужно именно товары
							'posts_per_page' => -1, // количество товаров для отображения
							'orderby' => 'date', // тип сортировки (в данном случае по дате)
							'product_cat' => $cat_slug, // указываем слаг нужной категории
							'post__not_in' => array( $post_id )
						);
						$loop = new WP_Query( $args );
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
								<span class="price__unit">грн</span>
							</div>
							<?php
							} else {
								?>
							<?php if ($sale !== $price) { ?>
							<div class="price price_old mini-card__price">
								<span class="price__digits">
									<?php echo $sale; ?>
								</span><span class="price__unit">грн</span>
							</div>
							<div class="price price_new mini-card__price">
								<span class="price__digits">
									<?php echo $cust_price; ?>
								</span><span class="price__unit">грн</span>
							</div>
							<?php } else { ?>
							<div class="price mini-card__price">
								<span class="price__digits">
									<?php echo $cust_price; ?>
								</span>
								<span class="price__unit">грн</span>
							</div>
							<?php } ?>
							<?php
							}
							?>

							<div class="mini-card__image-box" style="    max-height: 200px;">
							
								<img src="<?php the_post_thumbnail_url(); ?>" style="max-height: 200px;" >
							</div>
							<p class="mini-card__name">
								<?php the_title(); ?>
							</p>
						</a>


						<?php endwhile; ?>
						<?php wp_reset_query(); ?>

					</div>
				</div>
			</div>
		</section>
		<section class="section-article-previews">
			<div class="container section-article-previews__container">
				<center><h2 class="caption caption_black caption_margin caption_mobile">Статьи и обзоры</h2></center>
			</div>

			<div class="four-skewed section-article-previews__four-skewed">
				<?php 
$posts = get_field('news_home_1', 'option');
if( $posts ): ?>
				<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				<a class="four-skewed__block" href="<?php the_permalink(); ?>">
				<div class="four-skewed__container" style="background-image: url(<?php the_post_thumbnail_url( 'large' );  ?>);">
					<div class="four-skewed__name">
						<p>
							<?php the_title(); ?>
						</p>
					</div>
				</div>
			</a>
			

				<?php endforeach; ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				<?php 
$posts = get_field('news_home_2', 'option');
if( $posts ): ?>
				<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				<a class="four-skewed__block four-skewed__block_skewed" href="<?php the_permalink(); ?>">
				<div class="four-skewed__container" style="background-image: url(<?php the_post_thumbnail_url( 'large' );  ?>);">
					<div class="four-skewed__name">
						<p>
							<?php the_title(); ?>
						</p>
					</div>
				</div>
			</a>
			

				<?php endforeach; ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				<?php 
$posts = get_field('news_home_3', 'option');
if( $posts ): ?>
				<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				<a class="four-skewed__block four-skewed__block_skewed" href="<?php the_permalink(); ?>">
				<div class="four-skewed__container" style="background-image: url(<?php the_post_thumbnail_url( 'large' );  ?>);">
					<div class="four-skewed__name">
						<p>
							<?php the_title(); ?>
						</p>
					</div>
				</div>
			</a>
			

				<?php endforeach; ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				<?php 
$posts = get_field('news_home_4', 'option');
if( $posts ): ?>
				<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				<?php setup_postdata($post); ?>
				<a class="four-skewed__block" href="<?php the_permalink(); ?>">
				<div class="four-skewed__container" style="background-image: url(<?php the_post_thumbnail_url( 'large' );  ?>);">
					<div class="four-skewed__name">
						<p>
							<?php the_title(); ?>
						</p>
					</div>
				</div>
			</a>
			

				<?php endforeach; ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
			</div>



			<a class="button section-article-previews__all" href="/news/"><span>Читать все</span></a>
		</section>
</main>
<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */