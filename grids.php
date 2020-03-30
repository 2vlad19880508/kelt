<?php
/*
Template Name: Размерные сетки
*/
get_header(); ?>


	
		  <!-- main content starts-->
    <main class="main" id="main">
      <section class="section-meta">
        <div class="container section-meta__container">
         <!-- breadcrumbs start-->
             <div class="storefront-breadcrumb"><div class="col-full"><nav class="woocommerce-breadcrumb"><span class="breadcrumb-title"></span>
			 
			 <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения Kelt Active', 'Інтернет магазин туристичного спорядження Kelt Active') ?></a>
               <span class="delimiter">/</span><span class="breadcrumb-title"></span><?php lang('Размерные сетки', 'Розмірні сітки') ?></nav></div></div>     
            <!-- breadcrumbs end-->

          <h1 class="section-meta__title caption"><?php lang('Размерные сетки', 'Розмірні сітки') ?></h1>
        </div>
      </section>
      <section class="section-brands">
        <div class="container section-brands__container">
          <div class="section-brands__featured">
            
			 <?php
					$args = array( 'post_type' => 'razmer_set', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ): $loop->the_post();
					?>
					<a class="brand section-brands__brand" href="<?php the_permalink(); ?>">
              
              <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>"/></a>
					<?php endwhile; wp_reset_query(); ?>
           
          </div>
        </div>
      
      </section>
    </main>
    <!-- main content ends-->

<?php get_footer(); ?>
