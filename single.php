<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>



		 <!-- main content starts-->
    <main class="main" id="main">
      <section class="section-meta">
        <div class="container section-meta__container">
		
		
			
          <!-- breadcrumbs start-->
          <div class="storefront-breadcrumb"><div class="col-full"><nav class="woocommerce-breadcrumb"><span class="breadcrumb-title"></span>
			 
			 <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения KELT ACTIVE', 'Інтернет магазин туристичного спорядження KELT ACTIVE') ?></a>
               <span class="delimiter">/</span>
			<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

				if (strpos($url, '/news/') !== false){ ?>			
					
					<a class="breadcrumbs__link" href="/news/"><?php lang('Новости', 'Новини') ?></li></a><span class="delimiter">/</span>
					
					<span class="breadcrumb-title"></span><?php the_title() ?></nav></div></div>  
			<?php } elseif (strpos($url, '/razmer-set/') !== false) { ?>
					
					<a class="breadcrumbs__link" href="/razmernye-setki/"><?php lang('Размерные сетки', 'Размірні сітки') ?></li></a><span class="delimiter">/</span>
					
					<?php lang('Размерные сетки', 'Размірні сітки') ?> <?php the_title() ?></nav>
			
			<?php } else { ?>
            <?php the_title() ?></nav>
			<?php }  ?>
          </div></div>  
          <!-- breadcrumbs end-->

          <h1 class="section-meta__title caption"><?php the_title() ?></h1>
        </div>
      </section>
      <section class="section-contacts">
        <div class="container section-size-grids__container">
          <div class="size-grid section-size-grids__size-grid test">
		  <style>
		  .table-container {
  width: 100%;
  overflow: auto;
  -webkit-overflow-scrolling: touch;
}
		  </style>
		  <div class="table-container">
			<?php while( have_posts() ) : the_post();
                        $more = 1; // отображаем полностью всё содержимое поста
						if (strpos($url, '/uk/')){ 
							$post_id = get_the_ID(); $value = get_post_meta( $post_id, 'content_uk', true ); echo apply_filters('the_content', get_post_meta( $post_id, 'content_uk', true )); 							
						} else {
							the_content(); // выводим контент ип
						}
                    endwhile; ?>
					</div>
					
						<?php if (strpos($url, '/?=tovar') !== false) { ?>							
							
							<center><button class="button section-article-previews__all"  onclick="history.back()" style="width:300px;"><span><?php lang('Назад в товар', 'Назад до товару') ?></span></a></center>
						<?php } else { ?>
						
						<?php } ?>
       </div> </div>
      </section>
        <section class="section-article-previews">
            <div class="container section-article-previews__container">
                <span class="caption caption_black caption_margin caption_mobile" style="font-weight:700;"><?php lang('Статьи и обзоры', 'Статті та огляди') ?></span>
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
    </main>
    <!-- main content ends-->

<?php get_footer(); ?>
