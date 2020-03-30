<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

  $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
get_header();
?>
<style>
@media screen and (max-width: 420px) {
.section-article-previews, .section-article-previews__four-skewed.four-skewed, .section-brand-slider {
    margin-bottom: 10px;
}
}
</style>
<!-- main header ends-->

<!-- main content starts-->
<main class="main" id="main">
	<section class="section-featured">
		<div class="slider slider_full section-featured__slider owl-carousel owl-carousel_featured owl-theme">
			
			<a class="slider__slide slide" href="#" style="background-image: url(<?php $contents = explode("src=", get_the_post_thumbnail(45052)); $content = explode("\"", $contents{1}); echo $content[1]; ?>); center no-repeat" href="<?php echo $link; ?>);">
				<div class="slide__content">
					<p>
						<?php if (strpos($url, '/uk/') == !true) { echo get_the_title(45052); } else { echo get_post_meta( 45052, 'title_uk', true ); } ?>
					</p>
				</div>
			</a>
			
			<a class="slider__slide slide" href="#" style="background-image: url(<?php $contents = explode("src=", get_the_post_thumbnail(45055)); $content = explode("\"", $contents{1}); echo $content[1]; ?>); center no-repeat" href="<?php echo $link; ?>);">
				<div class="slide__content">
					<p>
						<?php if (strpos($url, '/uk/') == !true) { echo get_the_title(45055); } else { echo get_post_meta( 45055, 'title_uk', true ); } ?>
					</p>
				</div>
			</a>
			
			<a class="slider__slide slide" href="#" style="background-image: url(<?php $contents = explode("src=", get_the_post_thumbnail(45058)); $content = explode("\"", $contents{1}); echo $content[1]; ?>); center no-repeat" href="<?php echo $link; ?>">
				<div class="slide__content">
					<p>
						<?php if (strpos($url, '/uk/') == !true) { echo get_the_title(45058); } else { echo get_post_meta( 45058, 'title_uk', true ); } ?>
					</p>
				</div>
			</a>
			
		</div>
	</section>
	<section class="section-main-categories">

		
		<a class="main-category" style="background-image: url(<?php $contents = explode("src=", get_the_post_thumbnail(45048)); $content = explode("\"", $contents{1}); echo $content[1]; ?>); center no-repeat" href="<?php echo get_post_meta( 45048, 'content_uk', true ) ?>">
			<div class="main-category__content">
				<div class="main-category__overlay"></div>
				<p class="main-category__text">
					<?php if (strpos($url, '/uk/') == !true) { echo get_the_title(45048); } else { echo get_post_meta( 45048, 'title_uk', true ); } ?>
				</p>
			</div>
		</a>
		
			<a class="main-category" style="background-image: url(<?php $contents = explode("src=", get_the_post_thumbnail(45046)); $content = explode("\"", $contents{1}); echo $content[1]; ?>); center no-repeat" href="<?php echo get_post_meta( 45046, 'content_uk', true ) ?>">
			<div class="main-category__content">
				<div class="main-category__overlay"></div>
				<p class="main-category__text">
					<?php if (strpos($url, '/uk/') == !true) { echo get_the_title(45046); } else { echo get_post_meta( 45046, 'title_uk', true ); } ?>
				</p>
			</div>
		</a>
		
			<a class="main-category" style="background-image: url(<?php $contents = explode("src=", get_the_post_thumbnail(45044)); $content = explode("\"", $contents{1}); echo $content[1]; ?>); center no-repeat" href="<?php echo get_post_meta( 45044, 'content_uk', true ) ?>">
			<div class="main-category__content">
				<div class="main-category__overlay"></div>
				<p class="main-category__text">
					<?php if (strpos($url, '/uk/') == !true) { echo get_the_title(45044); } else { echo get_post_meta( 45044, 'title_uk', true ); } ?>
				</p>
			</div>
		</a>
		
	</section>
	<section class="section-recent">
	<div class="mainmob">
		<div class="container section-recent__container">
			<span class="caption caption_black caption_margin caption_mobile" style="font-weight:700;"><?php lang('последние поступления', 'Останні надходження') ?></span>
			<div class="section-recent__slider-wrapper">
				<div class="slider slider_recent section-recent__slider owl-carousel owl-carousel_recent owl-theme">
					<?php
					$args = array(
						'post_type' => 'product',
						'stock' => 1,
						'posts_per_page' => 6,
						'orderby' => 'date',
						'order' => 'DESC' );
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
								<?php lang('Цена:', 'Ціна:') ?> <?php echo $cust_price; ?>
							</span>
							<span class="price__unit">грн</span>
						</div>
						<?php
						} else {
							?>
						<?php if ($sale !== $price) { ?>
						<div class="price price_old mini-card__price">
							<span class="price__digits">
								<?php lang('Цена:', 'Ціна:') ?>  <?php echo $price; ?>
							</span><span class="price__unit">грн</span>
						</div>
						<div class="price price_new mini-card__price">
							<span class="price__digits">
								<?php lang('Цена:', 'Ціна:') ?>  <?php echo $sale; ?>
							</span><span class="price__unit">грн</span>
						</div>
						<?php } else { ?>
						<div class="price mini-card__price">
							<span class="price__digits">
								<?php lang('Цена:', 'Ціна:') ?> <?php echo $cust_price; ?>
							</span>
							<span class="price__unit">грн</span>
						</div>
						<?php } ?>
						<?php
						}
						?>
						<div class="mini-card__image-box">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="Фото <?php the_title(); ?>" title="Фотография <?php the_title(); ?>" style="max-height: 250px;">
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
	</div>	
	</section>



	<section class="section-article-previews">
		<div class="container section-article-previews__container">
			<span class="caption caption_black caption_margin caption_mobile" style="font-weight:700;"><?php lang('Статьи и обзоры', 'Статті та огляди') ?> </span>
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
							<?php if (strpos($url, '/uk/') == true) {  $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'title_uk', true ); echo $value; 
							} else {
								the_title();
							}
							?>
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
							<?php if (strpos($url, '/uk/') == true) {  $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'title_uk', true ); echo $value; 
							} else {
								the_title();
							}
							?>
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
							<?php if (strpos($url, '/uk/') == true) {  $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'title_uk', true ); echo $value; 
							} else {
								the_title();
							}
							?>
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
							<?php if (strpos($url, '/uk/') == true) {  $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'title_uk', true ); echo $value; 
							} else {
								the_title();
							}
							?>
						</p>
					</div>
				</div>
			</a>
		
			<?php endforeach; ?>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
		</div>




		<a class="button section-article-previews__all" href="/news/"><span><?php lang('Читать все', 'Читати все') ?></span></a>
	</section>
	<section class="section-brand-slider">
		<div class="mainmob">
		<div class="container section-brand-slider__container">
			<span class="caption caption_black caption_margin caption_mobile" style="font-weight:700;"><?php lang('бренды', 'бренди') ?></span>
			<div class="section-brand-slider__slider-wrapper">
				<div class="slider slider_brands section-brand-slider__slider owl-carousel owl-carousel_brands owl-theme" style="max-height:100px;">

					<?php
					$args = array( 'post_type' => 'brendy', 'posts_per_page' => 10, 'orderby' => 'ID', 'order' => 'ASC' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ): $loop->the_post();
					?>
					<a class="mini-brand section-brand-slider__mini-brand" style="max-height:100px;" href="<?php the_permalink(); ?>">

						<?php the_post_thumbnail(); ?>
					</a>
					<?php endwhile; wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="section-seo-text">
		<div class="text section-seo-text__content">
			<?php 
			if( is_front_page() ){
				$post27 = get_post( 16 );
				$text = $post27->post_content; // контент поста
				
				if (strpos($url, '/uk/') == true) {  
					$post_id = get_the_ID(); 

					$value = get_field('text_urk',16);
                    if(strlen($value) === 0){
                      $value = get_post_meta( 16, 'content_uk', true );
                    }

					echo $value; 
				} else {								
					echo apply_filters('the_content', $text); // выводим контент						
				}
			}
			else {
	 
			}
			?>
		</div>
		</div>
	</section>
</main>
<!-- main content ends-->

<?php
get_footer();