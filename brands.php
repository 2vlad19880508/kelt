<?php
/*
Template Name: Бренды
*/
get_header(); ?>


	
		  <!-- main content starts-->
    <main class="main" id="main">
      <section class="section-meta">
        <div class="container section-meta__container">
          <!-- breadcrumbs start-->
             <div class="storefront-breadcrumb"><div class="col-full"><nav class="woocommerce-breadcrumb"><span class="breadcrumb-title"></span>
			 
			 <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения KELT ACTIVE', 'Інтернет магазин туристичного спорядження KELT ACTIVE') ?></a>
               <span class="delimiter">/</span><span class="breadcrumb-title"></span><?php lang('Бренды', 'Бренди') ?></nav></div></div>     
            <!-- breadcrumbs end-->

          <h1 class="section-meta__title caption"><?php lang('Бренды', 'Бренди') ?></h1>
        </div>
      </section>
      <section class="section-brands">
        <div class="container section-brands__container">
          <div class="section-brands__featured">
            <?php
					$args = array( 'post_type' => 'brendy', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ): $loop->the_post();
					?>
					<a class="brand section-brands__brand" href="<?php the_permalink(); ?>">
              
              <img src="<?php the_post_thumbnail_url(); ?>" alt="бренд <?php the_title() ?>"/></a>
					<?php endwhile; wp_reset_query(); ?>
           
          </div>
        </div>
        <div class="container section-brands__container">
          <div class="full-sorter section-brands__full-sorter">
            <p class="full-sorter__caption"><?php lang('сортировка', 'сортування') ?></p>
            <ul class="full-sorter__list">
              <a href="#a" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">A</a>
              <a href="#b" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">B</a>
              <a href="#c" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">C</a>
              <a href="#d" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">D</a>
              <a href="#e" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">E</a>
              <a href="#f" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">F</a>
              <a href="#g" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">G</a>
              <a href="#h" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">H</a>
              <a href="#i" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">I</a>
              <a href="#j" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">J</a>
              <a href="#k" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">K</a>
              <a href="#l" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">L</a>
              <a href="#m" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">M</a>
              <a href="#n" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">N</a>
              <a href="#o" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">O</a>
              <a href="#p" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">P</a>
              <?php 
				if ( have_posts() ) : 
				query_posts('cat=1193');  
				while (have_posts()) : the_post();  
			  ?> <a href="#q" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">Q</a>
              <a href="#r" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">R</a>
              	<?php endwhile; endif; wp_reset_query(); ?>
			  <a href="#s" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">S</a>
              <a href="#t" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">T</a>
              <a href="#u" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">U</a>
              <a href="#v" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">V</a>
              <a href="#w" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">W</a>
              <a href="#x" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">X</a>
              <a href="#y" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">Y</a>
              <a href="#z" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">Z</a>
			<?php 
				if ( have_posts() ) : 
				query_posts('cat=1203');  
				while (have_posts()) : the_post();  
			  ?>             
			 <a href="#one" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">1</a>
             	<?php endwhile; endif; wp_reset_query(); ?>
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1204');  
				while (have_posts()) : the_post();  
			  ?>
			 <a href="#two" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">2</a>
             	<?php endwhile; endif; wp_reset_query(); ?>
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1205');  
				while (have_posts()) : the_post();  
			  ?>
			 <a href="#three" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">3</a>
              	<?php endwhile; endif; wp_reset_query(); ?>
			   <?php 
				if ( have_posts() ) : 
				query_posts('cat=1206');  
				while (have_posts()) : the_post();  
			  ?>
			  <a href="#for" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">4</a>
              	<?php endwhile; endif; wp_reset_query(); ?>
			   <?php 
				if ( have_posts() ) : 
				query_posts('cat=1207');  
				while (have_posts()) : the_post();  
			  ?>
			  <a href="#five" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">5</a>
				<?php endwhile; endif; wp_reset_query(); ?>
				<?php 
				if ( have_posts() ) : 
				query_posts('cat=1208');  
				while (have_posts()) : the_post();  
			  ?>			
			<a href="#six" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">6</a>
				<?php endwhile; endif; wp_reset_query(); ?>             
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1209');  
				while (have_posts()) : the_post();  
			  ?>
			 <a href="#seven" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">7</a>
              	<?php endwhile; endif; wp_reset_query(); ?>
			   <?php 
				if ( have_posts() ) : 
				query_posts('cat=1210');  
				while (have_posts()) : the_post();  
			  ?>
			  <a href="#eight" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">8</a>
              	<?php endwhile; endif; wp_reset_query(); ?>
			   <?php 
				if ( have_posts() ) : 
				query_posts('cat=1211');  
				while (have_posts()) : the_post();  
			  ?>
			  <a href="#nine" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">9</a>
			  	<?php endwhile; endif; wp_reset_query(); ?>
			<?php 
				if ( have_posts() ) : 
				query_posts('cat=1212');  
				while (have_posts()) : the_post();  
			  ?>			 
			 <a href="#zer" style="font-family: 'OpenSans-Bold',Arial,'Nimbus Sans L','Helvetica CY',sans-serif; font-size: 14px; line-height: 1; color: #115185; text-transform: uppercase;text-decoration: none;-webkit-transition: .3s;-o-transition: .3s;transition: .3s;cursor: pointer;margin:-10px 5px 0 0;">0</a>
            	<?php endwhile; endif; wp_reset_query(); ?>
			</ul>
          </div>
 <div class="section-brands__common"><a id="a"></a>
            <div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                
                <span>A</span>
              </div>
              <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1176&posts_per_page=-1'); 				
				while (have_posts()) : the_post();  
				
			  ?>
			
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a>
				

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div><a id="b"></a>
            <div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>B</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1178&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div><a id="c"></a>
            <div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                
                <span>C</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1179&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="d"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>D</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1180&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div><a id="e"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>E</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1181&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div><a id="f"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>F</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1182&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="g"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>G</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1183&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="h"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>H</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1184&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="i"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>I</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1185&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="j"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>J</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1186&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="k"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>K</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1187&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="l"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>L</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1188&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="m"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>M</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1189&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			
			<a id="n"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>N</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1190&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="o"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>O</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1191&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div><a id="p"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>P</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1192&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			 <?php 
				if ( have_posts() ) : 
				query_posts('cat=1193&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="q"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>Q</span>
              </div>
               <ul class="headed-list__list">
			 
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			
                
              
              </ul>
            </div><?php endwhile; endif; wp_reset_query(); ?>
			<a id="r"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>R</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1194&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="s"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>S</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1195&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div><a id="t"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>T</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1196&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="u"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>U</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1197&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div><a id="v"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>V</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1198&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="w"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>W</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1199&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="x"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>X</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1200&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div><a id="y"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>Y</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1201&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			<a id="z"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>Z</span>
              </div>
               <ul class="headed-list__list">
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1202&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			<?php endwhile; endif; wp_reset_query(); ?>
                
              
              </ul>
            </div>
			 <?php 
				if ( have_posts() ) : 
				query_posts('cat=1203&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="one"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>1</span>
              </div>
               <ul class="headed-list__list">
			 
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			
                
              
              </ul>
            </div>
			<?php endwhile; endif; wp_reset_query(); ?><?php 
				if ( have_posts() ) : 
				query_posts('cat=1204&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="two"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>2</span>
              </div>
               <ul class="headed-list__list">
			  
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			
                
              
              </ul>
            </div><?php endwhile; endif; wp_reset_query(); ?> 
			<?php 
				if ( have_posts() ) : 
				query_posts('cat=1205&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="three"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>3</span>
              </div>
               <ul class="headed-list__list">
			 
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			
                
              
              </ul>
            </div><?php endwhile; endif; wp_reset_query(); ?>
			 <?php 
				if ( have_posts() ) : 
				query_posts('cat=1206&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="for"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>4</span>
              </div>
               <ul class="headed-list__list">
			 
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			
                
              
              </ul>
            </div>
			<?php endwhile; endif; wp_reset_query(); ?>
			 <?php 
				if ( have_posts() ) : 
				query_posts('cat=1207&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="five"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>5</span>
              </div>
               <ul class="headed-list__list">
			 
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

		
                
              
              </ul>
            </div>	<?php endwhile; endif; wp_reset_query(); ?>
			  <?php 
				if ( have_posts() ) : 
				query_posts('cat=1208&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="six"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>6</span>
              </div>
               <ul class="headed-list__list">
			
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			
                
              
              </ul>
            </div><?php endwhile; endif; wp_reset_query(); ?>
			<?php 
				if ( have_posts() ) : 
				query_posts('cat=1209&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="seven"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>7</span>
              </div>
               <ul class="headed-list__list">
			  
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			
                
              
              </ul>
            </div><?php endwhile; endif; wp_reset_query(); ?>
			 <?php 
				if ( have_posts() ) : 
				query_posts('cat=1210&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="eight"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>8</span>
              </div>
               <ul class="headed-list__list">
			 
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			
                
              
              </ul>
            </div><?php endwhile; endif; wp_reset_query(); ?>
			 <?php 
				if ( have_posts() ) : 
				query_posts('cat=1211&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="nine"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>9</span>
              </div>
               <ul class="headed-list__list">
			 
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			
                
              
              </ul>
            </div><?php endwhile; endif; wp_reset_query(); ?>
			 <?php 
				if ( have_posts() ) : 
				query_posts('cat=1212&posts_per_page=-1');  
				while (have_posts()) : the_post();  
			  ?>
			<a id="zer"></a>
			<div class="headed-list section-brands__headed-list">
              <div class="headed-list__head">
                <span>0</span>
              </div>
               <ul class="headed-list__list">
			 
			<li class="headed-list__item"><a href="https://kelt.com.ua/brendy/<?php $post_id = get_the_ID(); echo $value = get_post_meta( $post_id, 'ссылка', true ); ?>"><?php 
                        the_title(); // эта функция выводит заголовок
                       ?></a></a>

			
                
              
              </ul>
            </div><?php endwhile; endif; wp_reset_query(); ?>
			
          </div>
        </div>
          <div class="section-brands__common">
			  		<?php
					$args = array( 
						'post_type' => 'brendy', 
						'posts_per_page' => -1 
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ): $loop->the_post();
					?>
					<div id="id_<?php the_field('slag_br'); ?>" class="headed-list section-brands__headed-list" data-sort="<?php the_field('slag_br'); ?>" style="display: none">
					  <div class="headed-list__head">
				
						<span><?php the_field('slag_br'); ?></span>
					  </div>
						<ul class="headed-list__list">
							<?php
							$slag = get_field('slag_br');
							$args_br = array( 
								'post_type' => 'brendy', 
								'posts_per_page' => -1,
								'meta_key' => 'slag_br',
								'meta_value' => $slag,
							);
							$loop_br = new WP_Query( $args_br );
							while ( $loop_br->have_posts() ): $loop_br->the_post();
							?>
                			<li class="headed-list__item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></a>
							<?php endwhile; wp_reset_query(); ?>
						</ul>
			 		</div>
					<?php endwhile; wp_reset_query(); ?>
				<script>
				// FILTER BRAND ADD CLASS
				jQuery(".brendy_sort").click(function(e) {
				  e.preventDefault();
					var dat_fil = jQuery(this).attr('data-filter');
				  jQuery(".brendy_sort").removeClass('active');
					jQuery('.section-brands__headed-list').removeClass('show');
				  jQuery(this).addClass('active');
					jQuery('.section-brands__headed-list[data-sort='+dat_fil+']').addClass('show');
				})
				</script>
          </div>
        </div>
      </section>
    </main>
    <!-- main content ends-->

<?php get_footer(); ?>
