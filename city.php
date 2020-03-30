<?php
/*
Template Name: Города
Template Post Type: post, page
*/
get_header(); ?>
<style>
.section-art-previews__content a {
	font-family:'OpenSans',Arial,'Nimbus Sans L','Helvetica CY',sans-serif;text-decoration:none;;line-height:1.3125;color:#0097d4
}
</style>
<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; $post_id2 = get_the_ID();?>
<main class="main" id="main">
    <section class="section-meta">
        <div class="container section-meta__container">
		
		<!-- breadcrumbs start-->
             <div class="storefront-breadcrumb"><div class="col-full"><nav class="woocommerce-breadcrumb"><span class="breadcrumb-title"></span>
			 
			 <?php if ( $url == "https://kelt.com.ua/dostavka/" ) { ?>
			  <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения KELT', 'Інтернет магазин туристичного спорядження KELT') ?></a>
               <span class="delimiter">/</span><?php the_title(); ?></nav></div></div>     
          
			 <?php } else { ?>
			 <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения KELT', 'Інтернет магазин туристичного спорядження KELT') ?></a>
               <span class="delimiter">/</span><a class="breadcrumbs__link" href="/dostavka/"><?php lang('Доставка', 'Доставка') ?></a><span class="delimiter">/</span><?php $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'город', true ); echo $value; ?></nav></div></div>     
            <!-- breadcrumbs end-->
			 <?php } ?>
           

            <h1 class="section-meta__title caption"><?php the_title() ?></h1>
			<br><div style="margin-left: 8px; font-family: 'OpenSans',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 15px; line-height: 1.3125; color: #000; text-transform: uppercase; text-decoration: none; position: relative;">


			  <?php
					if ( have_posts() ) :
					query_posts('cat=3588&posts_per_page=50');
					while (have_posts()) : the_post();
				 ?>



					<a href="<?php the_permalink();?>" style="margin-left:10px; text-decoration:none; line-height: 2.3125; font-size:16px;">
					<?php $post_id = get_the_ID(); 
					
					if (strpos($url, '/uk/') == true) {
					$value = get_post_meta( $post_id, 'город_ук', true );
					} else {
					$value = get_post_meta( $post_id, 'город', true );
					}
					
					if ($post_id == $post_id2) {
					} else {
					echo $value;

					?>
				    <span style="position: relative; top: 0; left: 6px; color: #d50637; font-size: 16px;">/</span>
					<?php
					}
					?></a>


				 <?php endwhile; endif; wp_reset_query(); ?></div>
        </div>
    </section>
    <section class="section-art-previews">
        <div class="container section-art-previews__container">
            <div class="section-art-previews__content">              
		
			<?php if (strpos($url, '/uk/') == true) {  
				$post_id = get_the_ID(); 
				$value = get_post_meta( $post_id, 'content_uk', true ); 

				$value = get_field('text_urk',$post_id);
                if(strlen($value) === 0){
                  $value = get_post_meta( $post_id, 'content_uk', true );
                }
				echo $value; 
							} else {								
								the_content();							
							} ?>

            </div>
           
        </div>
    </section>
    <?php pagination($Posts->max_num_pages); ?>
</main>
<!-- main content ends-->
<?php get_footer(); ?>
      
          
        