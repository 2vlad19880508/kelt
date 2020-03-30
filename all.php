<?php
/*
Template Name: Общий макет для текстовых страниц
*/			   $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
get_header(); ?>



		 <!-- main content starts-->
    <main class="main" id="main">

        <section class="section-meta">
            <div class="container section-meta__container">
                <!-- breadcrumbs start-->
                <div class="storefront-breadcrumb"><div class="col-full"><nav class="woocommerce-breadcrumb"><span class="breadcrumb-title"></span>


                            <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения Kelt Active', 'Інтернет магазин туристичного спорядження Kelt Active') ?></a>
                            <span class="delimiter">/</span><span class="breadcrumb-title"></span><?php the_title() ?></nav></div></div>
                <!-- breadcrumbs end-->

          <h1 class="section-meta__title caption"><?php if (strpos($url, '/uk/') == true) {  $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'title_uk', true ); echo $value; 
							} else {
								the_title();
							}
							?></h1>
        </div>
      </section>
      <section class="section-contacts">
              <div class="container section-size-grids__container">
          <div class="size-grid section-size-grids__size-grid">
            <?php while( have_posts() ) : the_post();
                        $more = 1; // отображаем полностью всё содержимое поста
                        if (strpos($url, '/uk/') == true) {  $post_id = get_the_ID();
                         $value = get_field('text_urk');
                         if(strlen($value) === 0){
                           $value = get_post_meta( $post_id, 'content_uk', true );
                         }
                          echo $value; 
                            } else {                                
                                the_content();                          
                            } // выводим контент
                    endwhile; ?><!--seo_text_end-->
            <!--seo_text_start-->
       </div></div>
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
