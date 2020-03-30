<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url, '/turisticheskoe-snaryazhenie/?add-to-ca') !== false) {
?>
<style>
.section-category__filters {
	display:none;
}
</style>

<?php } elseif (strpos($url, '/kemping/?add-to-ca') !== false) {
?>
<style>
.section-category__filters {
	display:none;
}
</style>


<?php } elseif (strpos($url, '/bagazh/?add-to-ca') !== false) {
?>
<style>
.section-category__filters {
	display:none;
}
</style>


<?php } elseif (strpos($url, '/sport/?add-to-ca') !== false) {
?>
<style>
.section-category__filters {
	display:none;
}
</style>


<?php } elseif (strpos($url, '/detyam/?add-to-ca') !== false) {
?>
<style>
.section-category__filters {
	display:none;
}
</style>


<?php } elseif (strpos($url, '/odezhda/?add-to-ca') !== false) {
?>
<style>
.section-category__filters {
	display:none;
}
</style>


<?php } elseif (strpos($url, '/obuv/?add-to-ca') !== false) {
?>
<style>
.section-category__filters {
	display:none;
}
</style>

<?php } elseif (strpos($url, '/optika/?add-to-ca') !== false) {
?>
<style>
.section-category__filters {
	display:none;
}
</style>

<?php } else { ?>
<style>
.section-category__filters {
	display:block;
}
</style>
<?php } ?>

<style>
@media screen and (max-width: 420px) {
.section-meta__title.caption.noborder:before {
	display:none;
}
}
.section-category__slider.slider {
		max-height:350px!important;
}
.owl-carousel .owl-item img{
		max-height:350px!important;
}
</style>
<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
if (is_search()) {
    require_once dirname(__DIR__) . '/search.php';
} else {
    defined( 'ABSPATH' ) || exit;

if (strpos($url, '/?filter_brand_prod=') !== false) { 

    require_once dirname(__DIR__) . '/header_filters.php'; 

} else {
	
	get_header( 'shop' );

}

    /**
     * Hook: woocommerce_before_main_content.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     * @hooked WC_Structured_Data::generate_website_data() - 30
     */
    do_action( 'woocommerce_before_main_content' );

    ?>

    <section class="section-meta">
    <div class="container section-meta__container">
                <!-- breadcrumbs start-->
                <?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				if (strpos($url, '/?filter_brand_prod=') !== false) { ?>
				<?php if ($urlwidth < 5) { ?>
					<div class="storefront-breadcrumb"><div class="col-full">
					<nav class="woocommerce-breadcrumb"><span class="breadcrumb-title"></span><a href="<?php echo get_home_url(); ?>"><?php lang('Главная', 'Головна') ?></a>
					<span class="delimiter">/</span><a href="/brands/"><?php lang('Бренды', 'Бренди') ?></a>
					<span class="delimiter">/</span><a href="/brands/<?php echo $key2s; ?>">Бренд <?php echo $key2; ?></a>
					<span class="delimiter">/</span><span class="breadcrumb-title"></span><?php lang('Товары бренда', 'Товари бренду') ?><?php echo $key2; ?></nav></div></div>  
					
					<?php } elseif ($urlwidth > 5 && strpos($url, '/shop/page/') !== false && strpos($url, '?filter_brand_prod=') !== false) { ?>
					<div class="storefront-breadcrumb"><div class="col-full">
					<nav class="woocommerce-breadcrumb"><span class="breadcrumb-title"></span><a href="<?php echo get_home_url(); ?>"><?php lang('Главная', 'Головна') ?></a>
					<span class="delimiter">/</span><a href="/brands/"><?php lang('Бренды', 'Бренди') ?></a>
					<span class="delimiter">/</span><a href="/brands/<?php echo $key2s; ?>">Бренд <?php echo $key2; ?></a>
					<span class="delimiter">/</span><span class="breadcrumb-title"></span><?php lang('Товары бренда', 'Товари бренду') ?> <?php echo $key2; ?> - <?php lang('Страница', 'Сторінки') ?> <?php pages(); ?> </nav></div></div>  
					
				<?php } else {
			   if (strpos($url, '/uk/') !== false){ 
					if (strpos($url, '/?filter_brand_prod=') !== false) { 
						$numpage = ' ';
						$page = ' ';
					} else {
						$numpage = ' - Сторінка ';
					}
						$main = 'інтернет магазин туристичного спорядження Kelt Active';
			   } else {
				   if (strpos($url, '/?filter_brand_prod=') !== false) { 
						$numpage = ' ';
						$page = ' ';
					} else {
						$numpage = ' - Страница ';
					}
			   $main = 'интернет магазин туристического снаряжения Kelt Active';
			   }
                    $args = array(
                            'delimiter' => '<span class="delimiter">/</span>',
                            'before' => '<span class="breadcrumb-title">' . __( '', 'woothemes' ). '</span>',
							'wrap_after' => $numpage . $page,
							'home'       => _x( $main, 'breadcrumb', 'woocommerce' )
                    );
				
				woocommerce_breadcrumb( $args ); 
				} ?>
				<?php } else {
					if (strpos($url, '/page/') !== false){ 
			   $paged  = $url;
			   $page = explode("/", $paged);
			   $page = $page[count($page)-2];
			   if (strpos($url, '/uk/') !== false){ 
			   $numpage = ' - Сторінка ';
			   $main = 'інтернет магазин туристичного спорядження Kelt Active';
			   } else {
			   $numpage = ' - Страница ';
			   $main = 'интернет магазин туристического снаряжения Kelt Active';
			   }
			   
                    $args = array(
                            'delimiter' => '<span class="delimiter">/</span>',
                            'before' => '<span class="breadcrumb-title">' . __( '', 'woothemes' ). '</span>',
							'wrap_after' => $numpage . $page,
							'home'        => _x( $main, 'breadcrumb', 'woocommerce' )
                    );
					
					woocommerce_breadcrumb( $args );  
					
					} else { 
					
			   if (strpos($url, '/uk/') !== false){ 
			
			   $main = 'інтернет магазин туристичного спорядження Kelt Active';
			   } else {
		
			   $main = 'интернет магазин туристического снаряжения Kelt Active';
			   }
					
					$args = array(
                            'delimiter' => '<span class="delimiter">/</span>',
                            'before' => '<span class="breadcrumb-title">' . __( '', 'woothemes' ). '</span>',
					
							'home'        => _x( $main, 'breadcrumb', 'woocommerce' )
							
                    );
					
				
				woocommerce_breadcrumb( $args );  
			    
					
			

			   }
			   
				} ?>
                <?php // if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
                <!-- breadcrumbs end-->

                <h1 class="section-meta__title caption" style="margin-top:30px;">
                    <?php
					$key2 = str_replace("-", " ", "$key");	
					if (strpos($url, '/?filter_brand_prod=') !== false) { 
						if ($urlwidth < 5) {
							lang('Товары бренда', 'Товари бренду') . $key2; ;
							} elseif ($urlwidth > 5 && strpos($url, '/shop/page/') !== false && strpos($url, '?filter_brand_prod=') !== false) { 
								 lang('Товары бренда', 'Товари бренду') . $key2 . lang('Страница', 'Сторінка'); pages();
						} else { ?>
						
				<?php if (strpos($url, '/product-category/sport/lyzhnyj-sport/?filter') !== false){ ?>
					<?php lang('Товары для лыжного спорта', 'Товари для лижного спорту') . $key2;?>
					
				<?php } elseif (strpos($url, '/product-category/sport/fitnes/?filter') !== false){ ?>
					<?php lang('Товары для фитнеса', 'Товари для фітнесу') . $key2;?>
					
				<?php } elseif (strpos($url, '/product-category/sport/snowboarding/?filter') !== false){ ?>
				    <?php lang('Товары для сноубординга', 'Товари для сноубордингу') . $key2;?>
					
				<?php } elseif (strpos($url, '/product-category/sport/badminton-squash/?filter') !== false){ ?>
					<?php lang('Товары для БАДМИНТОНА И СКВОША', 'Товари для БАДМІНТОНУ ТА СКВОШУ') . $key2;?>
					
				<?php } elseif (strpos($url, '/product-category/sport/boks-edinoborstva/?filter') !== false){ ?>
					<?php lang('Товары для бокса и единаборств', 'Товари для боксу та єдиноборств') . $key2;?>
					
				<?php } elseif (strpos($url, '/product-category/sport/bolshoj-tennis/?filter') !== false){ ?>
					<?php lang('Товары для большого тениса', 'Товарb для великого тенісу') . $key2;?>
					
				<?php } elseif (strpos($url, '/product-category/sport/nastolnyj-tennis/?filter') !== false){ ?>
						<?php lang('Товары для настольного тениса', 'Товари для настольного тенісу') . $key2;?>
					
				<?php } elseif (strpos($url, '/product-category/sport/atletika/?filter') !== false){ ?>
					<?php lang('Товары для занятия атлетикой', 'Товари для заняття атлетикою') . $key2;?>
					
				<?php } elseif (strpos($url, '/product-category/sport/velosipedy/?filter') !== false){ ?>
					<?php lang('Товары для велоспрота', 'Товари для велоспроту') . $key2;?>
					
				<?php } elseif (strpos($url, '/product-category/sport/plavanie/?filter') !== false){ ?>
					<?php lang('Товары для плавания', 'Товари для плавання') . $key2;?>
					
				<?php } elseif (strpos($url, '/product-category/sport/igry-s-myachem/?filter') !== false){ ?>
					<?php lang('Товары для игр с мячем', 'Товари для гри з м\'ячем') . $key2;?>
						
				<?php } else { ?>
				<?php single_cat_title(''); echo ' ' . $key2; } ?>
						<?php }
					
					} else {
						
               single_cat_title(''); 
			   if (strpos($url, '/page/') !== false){ 
			   $paged  = $url;
			   $page = explode("/", $paged);
			   $page = $page[count($page)-2];
				if (strpos($url, '/uk/') !== false){ 
			   $numpage = ' - Сторінка ';
			   
			   } else {
			   $numpage = ' - Страница ';
			  
			   }
			   echo  $numpage . $page; }
			   
					}
					
                ?>
                </h1><br>
            </div>
    </section>
    <section class="section-category">
        <div class="container section-category__container">
            <div class="section-category__aside">
                <?php require_once dirname(__DIR__) . '/inc/_section-category__nav.php' ?>
				<div class="mobblock">
				<br>
				</div>
   
                <hr class="redline section-category__aside-redline">
                 <center><div class="slider slider_dotted section-category__slider owl-carousel owl-carousel_aside">
                    <?php 
						if ( have_posts() ) : 
							query_posts('cat=3641&posts_per_page=4');  
						while (have_posts()) : the_post();  
					?>
					
                    <a class="slide" href="<?php $post_id = get_the_ID(); $value = get_post_meta( $post_id, 'prev_uk', true ); echo $value; ?>">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/  style="width:100%;"></a>
                    <?php endwhile; endif; wp_reset_query(); ?>
					
									
                </div></center>
				<style>
				@media (max-width: 768px) {
				.pcblock {display:none;}
				.mobblock {display:block; margin: 0 auto;}
				}
				@media (min-width: 768px) {
				.pcblock {display:block;}
				.mobblock {display:none;}
				}
				
				#woocommerce_layered_nav-38 {
				display:none;	
				}
				</style>
				<div class="pcblock">
				<hr class="redline section-category__aside-redline">
				<center><span style="margin-top:-10px; font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 18px; line-height: 1.2; color: #111;  text-transform: none;"><?php lang('Отзывы о товарах', 'Відгуки про товар'); ?></span>	</center>
					<?php $args = array(
						'number' => 5,
						'orderby' => 'comment_date',
						'order' => 'DESC',
						//'post_id' => 0,
						'type' => '', // только комментарии, без пингов и т.д...
						);

						if( $comments = get_comments( $args ) ){							
							foreach( $comments as $comment ){
							$comm_link = get_comment_link( $comment->comment_ID ); // может быть тяжелый запрос ...
							$comm_short_txt = mb_substr( strip_tags( $comment->comment_content ), 0, 50 ) .'...';

							?> 
							
							<p style="margin-top:10px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/ </span>
							<span style="color:#cbcbcb; font-weight:400;font-style: italic;"><?php echo $comment->comment_author;?> <?php  echo $comment->comment_date ?></span><br> 
							<?php $comm_short_txt = mb_substr( strip_tags( $comment->comment_content ), 0, 50 ) .'...'; echo $comm_short_txt ?><br> 
							<?php lang('Отзыв о товаре:', 'Отзыв о товаре:') ?> 
							<a href="<?php echo $comm_link ?>" style="color:#62c63a; text-decoration:none;"><?php echo get_the_title( $comment->comment_post_ID ); ?></a></p>
						<?php	}	}		?>
						<hr class="redline section-category__aside-redline">
				<center><span style=" font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 18px; line-height: 1.2; color: #111;  text-transform: none;"><?php lang('Популярные запросы', 'Популярні відгуки') ?> </span>	</center>
				
				<?php 
				
				$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				
				if (strpos($url, '/uk/') == true){ 
				
				$post = get_post( 45800 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(0,700,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2 ?></a></p>
	
				<?php 			
				
				
				$post = get_post( 45800 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(702,1400,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2 ?></a></p>
				
				<?php 			
				
				
				$post = get_post( 45800 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(1402,2000,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2   ?></a></p>
				
					
				
				<?php 			
				
				
				
				
				} else {
				
				$post = get_post( 35172 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(0,700,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2 ?></a></p>
	
				<?php 			
				
				
				$post = get_post( 35172 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(702,1400,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2 ?></a></p>
				
				<?php 			
				
				
				$post = get_post( 35172 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(1402,2000,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2 
				} ?></a></p>
				
			
					
				
					
					<hr class="redline section-category__aside-redline">
			
				</div>
              </div>






    <div class="section-category__content">
	<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];	
	
	if (strpos($url, 'add-to-cart=') !== false) { ?>
        <center><div id="mydiv"><span style="color: #62c63a; border:#62c63a solid 2px; padding:15px 40px;"><?php lang('Спасибо! Товар добавлен в корзину', 'Дякуємо! Товар додано в кошик') ?></span></div></center>
		<script>
		setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 4000); // <-- time in milliseconds
		</script>
   <?php }	?>
        <div class="user-tools section-category__user-tools">
                  <div class="switch section-category__switch mobvid">
				   <p class="switch__label">Вид</p>
                    <ul class="switch__states">
                      <li class="switch__state switch__state_lines"></li>
                      <li class="switch__state switch__state_tiles switch__state_active"></li>
                    </ul>				
                  </div>
                  <div class="amounter section-category__amounter">
                    <p class="amounter__label"><?php lang('Показывать на странице', 'Показити на сторінці') ?> </p>
                    <div class="select-wrapper amounter__select-wrapper">
                        <form method="post" action="" class="form-wppp-select products-per-page"><select name="ppp" onchange="this.form.submit()" class="select wppp-select">
						<option value="9">9</option><option value="18">18</option><option value="27">27</option><option value="36">36</option></select></form>
                    </div>
                  </div>
                  <div class="section-category__sorter">
                    <div class="select-wrapper">
                      <select id="dynamic_select" class="select">
                        <option value="?orderby=name_list"><?php lang('Название: от А до Я', 'Назва: від А до Я') ?></option>
                        <option value="?orderby=name_list_2"><?php lang('Название: от А до Я', 'Назва: від Я до А') ?></option>
                        <option value="?orderby=price"><?php lang('Цены: по возрастанию', 'Ціни: по зростанню') ?></option>
                        <option value="?orderby=price-desc"><?php lang('Цены: по убыванию', 'Ціни: по зниженню') ?></option>
                      </select>
                        <?php
                        $str = $_SERVER['QUERY_STRING'];
                        ?>
                        <script>
                            jQuery(function() {
                              // bind change event to select
                              jQuery('#dynamic_select').on('change', function() {
                                var url = jQuery(this).val(); // get selected value
                                if (url) { // require a URL
                                  window.location = url; // redirect
                                }
                                return false;
                              });
                            });
                            var rating = window.location.href;
                            var index_rating = rating.indexOf("orderby=name_list");
                            if(index_rating != -1) {
                                jQuery("#dynamic_select option[value='?orderby=name_list']").attr('selected', 'true');
                            }

                            var popularity = window.location.href;
                            var index_popularity = popularity.indexOf("orderby=name_list_2");
                            if(index_popularity != -1) {
                                jQuery("#dynamic_select option[value='?orderby=name_list_2']").attr('selected', 'true');
                            }

                            var price = window.location.href;
                            var index_price = price.indexOf("orderby=price");
                            if(index_price != -1) {
                                jQuery("#dynamic_select option[value='?orderby=price']").attr('selected', 'true');
                            }

                            var price_desc = window.location.href;
                            var index_price_desc = price_desc.indexOf("orderby=price-desc");
                            if(index_price_desc != -1) {
                                jQuery("#dynamic_select option[value='?orderby=price-desc']").attr('selected', 'true');
                            }
                        </script>
                    </div>
                  </div>
                </div>
        <div class="section-category__products"><!--isset_listing_page-->
        <?php
    if ( woocommerce_product_loop() ) {

        /**
         * Hook: woocommerce_before_shop_loop.
         *
         * @hooked woocommerce_output_all_notices - 10
         * @hooked woocommerce_result_count - 20
         * @hooked woocommerce_catalog_ordering - 30
         */
        //do_action( 'woocommerce_before_shop_loop' );

        woocommerce_product_loop_start();

        if ( wc_get_loop_prop( 'total' ) ) {
            while ( have_posts() ) {
                the_post();

                /**
                 * Hook: woocommerce_shop_loop.
                 *
                 * @hooked WC_Structured_Data::generate_product_data() - 10
                 */
                do_action( 'woocommerce_shop_loop' );

                wc_get_template_part( 'content', 'productshop' );
            }
        }

        woocommerce_product_loop_end();
        ?>
        <div class="section-category__pager">
		
        <?php
        do_action( 'woocommerce_before_shop_loop' );
        /**
         * Hook: woocommerce_after_shop_loop.
         *
         * @hooked woocommerce_pagination - 10
         */  ?>		
      
        </div>
		 <div class="section-category__pager" style="margin:-20px 0 40px 0;">
		  <?php do_action( 'woocommerce_after_shop_loop' );
        ?>
		 </div>
            <div class="section-category__advantages">
                  <h3 class="caption caption_center caption_margin"><?php lang('Почему мы', 'Чому ми') ?></h3>
                  <div class="section-category__advantages-box">
                    <div class="advantage section-category__advantage">
                      <div class="advantage__icon advantage__icon_original"></div>
                      <p class="advantage__info"><?php lang('Только оригинальная<br>продукция', 'Тільки оригинальна<br>продукція') ?></p>
                    </div>
                    <div class="advantage section-category__advantage">
                      <div class="advantage__icon advantage__icon_delivery"></div>
                      <p class="advantage__info"><?php lang('Оперативная<br>доставка', 'Оперативна<br>доставка') ?></p>
                    </div>
                    <div class="advantage section-category__advantage">
                      <div class="advantage__icon advantage__icon_discount"></div>
                      <p class="advantage__info"><?php lang('Скидки постоянным<br>клиентам', 'Скидки постійним<br>кліентам') ?></p>
                    </div>
                    <div class="advantage section-category__advantage">
                      <div class="advantage__icon advantage__icon_payment"></div>
                      <p class="advantage__info"><?php lang('Оплата удобным<br>для вас способом', 'Оплата зручним<br>для вас способом') ?></p>
                    </div>
                    <div class="advantage section-category__advantage">
                      <div class="advantage__icon advantage__icon_return"></div>
                      <p class="advantage__info"><?php lang('14 дней на обмен<br>или возврат', '14 днів на обмін<br>або возврат') ?></p>
                    </div>
                    <div class="advantage section-category__advantage">
                      <div class="advantage__icon advantage__icon_consult"></div>
                      <p class="advantage__info"><?php lang('Профессиональная<br>консультация', 'Професійна<br>консультація') ?></p>
                    </div>
                  </div>
				  
				  
				  <?php if ($url == "https://kelt.com.ua/product-category/optika/") { ?>
					  <h3 class="caption caption_center caption_margin" style="text-align:left!important;"><?php lang('ОПТИЧЕСКИЕ ПРИБОРЫ с доставкой по Украине:', 'ОПТИЧНІ ПРИЛАДИ з доставкою по Україні:') ?> </h3>
				  <?php } elseif ($url == "https://kelt.com.ua/product-category/obuv/") { ?>
				  	  <h3 class="caption caption_center caption_margin" style="text-align:left!important;"><?php lang('ТРЕККИНГОВАЯ ОБУВЬ с доставкой по Украине:', 'ТРЕКИНГОВА ОБУВЬ з доставкою по Україні:') ?> </h3>
				  <?php  } elseif ($url == "https://kelt.com.ua/product-category/odezhda/"){ ?>
				  	  <h3 class="caption caption_center caption_margin" style="text-align:left!important;"><?php lang('ТУРИСТИЧЕСКАЯ ОДЕЖДА с доставкой по Украине: ', 'ТУРИСТИЧЕСКАЯ ОДЕЖДА з доставкою по Україні:') ?> </h3>
				  <?php  } elseif ($url == "https://kelt.com.ua/product-category/sport/") { ?>
				  	  <h3 class="caption caption_center caption_margin" style="text-align:left!important;"><?php lang('СПОРТТОВАРЫ с доставкой по Украине: ', 'СПОРТТОВАРИ з доставкою по Україні:') ?> </h3>
				  <?php  } elseif ($url == "https://kelt.com.ua/product-category/bagazh/"){ ?>
				  	  <h3 class="caption caption_center caption_margin" style="text-align:left!important;"><?php lang('БАГАЖНЫЕ СУМКИ с доставкой по Украине:', 'БАГАЖНІ СУМКИ з доставкою по Україні:') ?> </h3>
				  <?php  } elseif ($url == "https://kelt.com.ua/product-category/kemping/") { ?>
				  	  <h3 class="caption caption_center caption_margin" style="text-align:left!important;"><?php lang('ТОВАРЫ ДЛЯ КЕМПИНГА с доставкой по Украине:', 'ТОВРАИ ДЛЯ КЕМПІНГУ з доставкою по Україні:') ?> </h3>
				  <?php  } elseif ($url == "https://kelt.com.ua/product-category/turisticheskoe-snaryazhenie/") { ?>
				  	  <h3 class="caption caption_center caption_margin" style="text-align:left!important;"><?php lang('ТУРИСТИЧЕСКОЕ СНАРЯЖЕНИЕ с доставкой по Украине:', 'ТУРИСТИЧНЕ СПОРЯДЖЕННЯ з доставкою по Україні:') ?> </h3>
				  <?php } else { ?>
					  
				    <h3 class="caption caption_center caption_margin" style="text-align:left!important;"><?php single_cat_title(''); ?> <?php lang('с доставкой по Украине:', 'з доставкою по Україні:') ?> </h3>
				  
				  <?php } ?>
				  <div style="font-family: 'OpenSans',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 15px; line-height: 1.3125; color: #000; text-transform: uppercase; text-decoration: none; margin-right: 15px; position: relative;">
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
			<div class="mobblock">
				<hr style="width: 100%; margin: 20px 0 20px 0; padding: 0; height: 2px; background-color: #d50637; border: 0;">
				<center><span style="margin-top:-10px; font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 18px; line-height: 1.2; color: #111;  text-transform: none;"><?php lang('Отзывы о товарах', 'Відгуки у товарах') ?> </span>	</center>
					<?php $args = array(
						'number' => 5,
						'orderby' => 'comment_date',
						'order' => 'DESC',
						//'post_id' => 0,
						'type' => '', // только комментарии, без пингов и т.д...
						);

						if( $comments = get_comments( $args ) ){							
							foreach( $comments as $comment ){
							$comm_link = get_comment_link( $comment->comment_ID ); // может быть тяжелый запрос ...
							$comm_short_txt = mb_substr( strip_tags( $comment->comment_content ), 0, 50 ) .'...';

							?> 
							
							<p style="margin-top:10px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/ </span>
							<span style="color:#cbcbcb; font-weight:400;"><i><?php echo $comment->comment_author;?> <?php  echo $comment->comment_date ?></i></span><br> 
							<?php $comm_short_txt = mb_substr( strip_tags( $comment->comment_content ), 0, 50 ) .'...'; echo $comm_short_txt ?><br> 
							<?php lang('Отзыв о товаре: ', 'Отзыв о товаре: ') ?>
							<a href="<?php echo $comm_link ?>" style="color:#62c63a; text-decoration:none;"><?php echo get_the_title( $comment->comment_post_ID ); ?></a></p>
						<?php	}	}		?>
						<hr style="width: 100%; margin: 20px 0 20px 0; padding: 0; height: 2px; background-color: #d50637; border: 0;">
				<center><span style=" font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 18px; line-height: 1.2; color: #111;  text-transform: none;"><?php lang('Популярные запросы', 'Популярные запросы') ?></span>	</center>
				
				<?php 
				
				$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				
				if (strpos($url, '/uk/') == true){ 
				
				$post = get_post( 45800 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(0,700,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2 ?></a></p>
	
				<?php 			
				
				
				$post = get_post( 45800 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(702,1400,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2 ?></a></p>
				
				<?php 			
				
				
				$post = get_post( 45800 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(1402,2000,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2   ?></a></p>
				
					
				
				<?php 			
				
				
				
				
				} else {
				
				$post = get_post( 35172 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(0,700,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2 ?></a></p>
	
				<?php 			
				
				
				$post = get_post( 35172 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(702,1400,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2 ?></a></p>
				
				<?php 			
				
				
				$post = get_post( 35172 );
				$text = $post->post_content; // контент поста
				
				$piece = explode("+", $text);
				$i = range(1402,2000,2);
				$rand_keys1 = array_rand($i, 1);
				$piece2 = explode(" https://", $piece[$i[$rand_keys1]]);
				
				 ?>
				<p style="margin-top:20px;"><span style="position: relative; top: 1px; color: #d50637; font-size: 16px; font-weight:700;">/</span><a style="text-decoration:none; margin-left:10px;" href="<?php echo 'https://' . $piece2[1];; // piece1 ?>#<?php echo $i[$rand_keys1]+1; // piece1 ?>-1">
				<?php echo $piece2[0]; // piece2 
				} ?></a></p>
				
			
					
			
					
						<hr style="width: 100%; margin: 20px 0 20px 0; padding: 0; height: 2px; background-color: #d50637; border: 0;">
				</div>
        <?php
    } else {
        /**
         * Hook: woocommerce_no_products_found.
         *
         * @hooked wc_no_products_found - 10
         */
        do_action( 'woocommerce_no_products_found' );
    }

    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */
    do_action( 'woocommerce_after_main_content' );

    /**
     * Hook: woocommerce_sidebar.
     *
     * @hooked woocommerce_get_sidebar - 10
     */
    do_action( 'woocommerce_sidebar' );
    ?>

                </div>
            </div>
        </div>
    </section>
    <?php
    get_footer( 'cat' );
}