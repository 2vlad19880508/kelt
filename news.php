<?php
/*
Template Name: Новости
*/
get_header(); ?>
<main class="main" id="main">
    <section class="section-meta">
        <div class="container section-meta__container">
            <!-- breadcrumbs start-->
             <div class="storefront-breadcrumb"><div class="col-full"><nav class="woocommerce-breadcrumb"><span class="breadcrumb-title"></span>
			 
			 <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения Kelt Active', 'Інтернет магазин туристичного спорядження Kelt Active') ?></a>
               <span class="delimiter">/</span><span class="breadcrumb-title"></span><?php lang('Новости', 'Новини');
			   $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			   if (strpos($url, '/page/') !== false){ 
			   $paged  = $url;
			   $paged = explode("/", $paged);
			   $paged = $paged[count($paged)-2];
			   lang(' - Страница ', ' - Сторінка ');
			   echo $paged;
			   }
			    ?></nav></div></div>     
            <!-- breadcrumbs end-->

            <h1 class="section-meta__title caption"><?php lang('Новости', 'Новини'); 
			   $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			   if (strpos($url, '/page/') !== false){ 
			   $paged  = $url;
			   $paged = explode("/", $paged);
			   $paged = $paged[count($paged)-2];
			   lang(' - Страница ', ' - Сторінка '); } if ($paged == 0) {  } else {  echo $paged; } ?></h1>
        </div>
    </section>
    <section class="section-art-previews">
        <div class="container section-art-previews__container">
            <div class="section-art-previews__content">
                <?php
				
					
                $CurrentPage = get_query_var('paged');
                $Posts = new WP_Query(array(
//                    'post_type' => 'post', // Default or custom post type
                    'posts_per_page' => 10, // Max number of posts per page
                    'cat' => 19,
                    'paged' => $CurrentPage
                ));



                if ($Posts->have_posts()) :
//                    query_posts('cat=19&posts_per_page=2');
                    while ($Posts->have_posts()) : $Posts->the_post();
                        ?>

                        <div class="art-preview clearfix section-art-previews__art-preview">

                            <img src="<?php the_post_thumbnail_url(); ?>" alt="Фото <?php the_title() ?>"/>
                            <h3 class="art-preview__name"><?php if (strpos($url, '/uk/') == true) {  $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'title_uk', true ); echo $value; 
							} else {
								the_title();
							}
							?></h3>
                            <p class="art-preview__text"><?php if (strpos($url, '/uk/') == true) {  
                                $post_id = get_the_ID(); 
                                $value = get_post_meta( $post_id, 'prev_uk', true ); 

                                echo $value; 

							} else {								
								the_excerpt();							
							}
							?></p>
                            <a class="button art-preview__more"
                               href="<?php the_permalink(); ?>"><span><?php lang('Читать далее', 'Читати далі') ?></span></a>
                        </div>

                    <?php endwhile; endif;
                wp_reset_query(); ?>


            </div>
           
        </div>
    </section>
    <?php pagination($Posts->max_num_pages); ?>
</main>
<!-- main content ends-->
<?php get_footer(); ?>