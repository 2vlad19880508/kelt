<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();

$url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<style>
.button {
    display: -webkit-box;
    /* display: flex; */
    /* -webkit-transition: .3s; */
    -o-transition: .3s;
    transition: .3s;
    cursor: pointer;
    /* background: #4591c8; */
    /* border: 2px solid #4591c8; */
    font-family: 'OpenSans',Arial,'Nimbus Sans L','Helvetica CY',sans-serif;
    /* line-height: 1; */
    /* color: #fff; */
    text-transform: uppercase;
    text-decoration: none;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    padding: 15px 40px;
    border-top-left-radius: 20px;
    border-bottom-right-radius: 20px;
    position: relative;
    overflow: hidden;
    color: white;
    /*background: #194483;*/
    /*-webkit-background-size: 100% 100%;*/
    /*-moz-background-size: 100% 100%;*/
    /*-o-background-size: 100% 100%;*/
    /*background-size: 100% 100%;*/
    /*background: -webkit-gradient(linear, left top, left bottom, from(#4591c8), to(#194483));*/
    /*background: -webkit-linear-gradient(top, #4591c8, #194483);*/
    /*background: -moz-linear-gradient(top, #4591c8, #194483);*/
    /*background: -ms-linear-gradient(top, #4591c8, #194483);*/
    /*background: -o-linear-gradient(top, #4591c8, #194483);*/
    /*background: linear-gradient(top, #4591c8, #194483);*/
	border:0;
}

.button:hover {
    background: #194483;
	    -webkit-background-size: 100% 100%;
    -moz-background-size: 100% 100%;
    -o-background-size: 100% 100%;
    background-size: 100% 100%;
    background: -webkit-gradient(linear, left top, left bottom, from(#194483), to(#194483));
    background: -webkit-linear-gradient(top, #194483, #194483);
    background: -moz-linear-gradient(top, #194483, #194483);
    background: -ms-linear-gradient(top, #194483, #194483);
    background: -o-linear-gradient(top, #194483, #194483);
    background: linear-gradient(top, #194483, #194483);
	border:0;
}

a, body {
    text-decoration: none;
    font-family: 'OpenSans',Arial,'Nimbus Sans L','Helvetica CY',sans-serif;
    line-height: 1.3125;
    color: #3f86be;
}
</style>


<!-- main content starts-->
    <main class="main" id="main">
        <section class="section-meta">
            <div class="container section-meta__container">
                <!-- breadcrumbs start-->
                <div class="storefront-breadcrumb"><div class="col-full"><nav class="woocommerce-breadcrumb"><span class="breadcrumb-title"></span>


                            <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения KELT ACTIVE', 'Інтернет магазин туристичного спорядження KELT ACTIVE') ?></a>
                            <span class="delimiter">/</span><span class="breadcrumb-title"></span>
                            <a class="breadcrumbs__link" href="/brands/"><?php lang('Бренды', 'Бренди') ?></a> <span class="delimiter">/</span><span class="breadcrumb-title"></span><?php the_title() ?></nav></div></div>
                <!-- breadcrumbs end-->

			<h1 class="section-meta__title caption">
				<?php if (strpos($url, '/uk/') == true) {  $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'title_uk', true ); echo $value; 
							} else {
								the_title();
							}
							?>
			</h1>
		</div>
	</section>
	<section class="section-brand-card">
		<div class="container section-brand-card__container">
			<div class="section-brand-card__left">
				<h2 class="section-brand-card__header"><?php lang('категории бренда', 'категорії бренду') ?> <?php the_title() ?></h2>
				<ul class="aside-menu aside-menu_decorated section-brand-card__aside-menu">
					<?php
					$idbr = get_the_ID();

					$loop = new WP_Query( array(
						'post_type' => 'product',
                        'posts_per_page' => -1,
						'meta_key' => 'brand',
						'meta_value' => $idbr,
						'orderby' => 'menu_order',
						'order' => 'ASC',
					) );

                    $cur_terms = [];
                    foreach ($loop->posts as $post) {
                        foreach (get_the_terms($post->ID, 'product_cat') as $term) {
                            $cur_terms[$term->term_id] = $term;
                        }
                    }

                    $termsList = [];
                    foreach ($cur_terms as $key => $curTerm) {
                        $termsList[$curTerm->slug] = $curTerm->name;
                    }

                    asort($termsList);
                    foreach ($termsList as $cat_slug => $name) { ?>
					<li id="<?php echo $cat_slug; ?>" class="aside-menu__item  11">
						<a href="/product-category/<?php echo $cat_slug; ?>/?filter_brand_prod=<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	
						$piece = explode("/", $url); echo $piece[count($piece)-2]; ?>&query_type_brand_prod=or">
							<?php echo $name; ?>
						</a>
					</li>
					<?php } ?>


					<!--OR SELECT BRAND-->
					<?php
                    $idbr = get_the_title();
					$loop = new WP_Query( array(
						'post_type' => 'product',
						//'posts_per_page' => '4',
                        'posts_per_page' => -1,
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

                    asort($cur_terms, function ($a, $b) {
                        return $a->name > $b->name;
                    });

					foreach( $cur_terms as $cur_term ){
					$cat_slug = $cur_term->slug; ?>
					<li id="<?php echo $cat_slug; ?>" class="aside-menu__item">
						<a href="/product-category/<?php echo $cat_name = $cur_term->slug; ?>/?<?php echo $cat_name = $cur_term->slug; ?>+<?php
							$post_object = get_field( 'brand' );
							if ( $post_object ):
								$post = $post_object;
							setup_postdata( $post ); ?><?php the_ID(); ?><?php wp_reset_postdata(); ?>
							<?php endif; ?>">
							<?php echo $cat_name = $cur_term->name; ?>
						</a>
					</li>
					<?php } ?>
					<?php endwhile; wp_reset_postdata(); ?>
					<!---->
				</ul>
                <a class="button" href="/shop/?filter_brand_prod=<?php the_title(); ?>"><span><?php lang('все товары', 'усі товари') ?> </span></a>
			</div>
			<div class="section-brand-card__right">
				<article class="article text text_light section-brand-card__article clearfix">
					<?php while( have_posts() ) : the_post(); $more = 1; ?>
					<h2 class="hidden">
						<?php if (strpos($url, '/uk/') == true) {  $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'title_uk', true ); echo $value; 
							} else {
								the_title();
							}
							?>
					</h2>
					<img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="logo"/>
						<?php if (strpos($url, '/uk/') == true) {  $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'content_uk', true ); echo $value; 
							} else {								
								the_content();							
							}
							?>
					<?php endwhile; ?>
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
					$idbr = get_the_ID();
					$loop = new WP_Query( array(
						'post_type' => 'product',
                        'posts_per_page' => -1,
						'meta_key' => 'brand',
						'meta_value' => $idbr,
						'orderby' => 'menu_order',
						'order' => 'ASC',
					) );
					
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
<?php wp_reset_query();  ?>

					</div>
			</div>
		</div>
	</section>
</main>
<!-- main content ends-->

<?php get_footer(); ?>