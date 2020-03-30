<?php
/*
Template Name: Контакты
*/

get_header(); ?>

<style>
@media screen and (max-width: 420px) {
.caption {
    margin-bottom: 20px;
}
}
</style>
	
		 <!-- main content starts-->
    <main class="main" id="main">
      <section class="section-meta">
        <div class="container section-meta__container">
          <!-- breadcrumbs start-->
          <ul class="breadcrumbs section-meta__breadcrumbs" id="breadcrumbs">
            <li class="breadcrumbs__item">
              
              <a class="breadcrumbs__link" href="<?php echo get_home_url(); ?>"><?php lang('Интернет магазин туристического снаряжения KELT', 'Інтернет магазин туристичного спорядження KELT') ?></a>
            </li>			
            <li class="breadcrumbs__item breadcrumbs__item_last"><?php lang('Контакты', 'Контакти'); ?></li>
          </ul>
          <!-- breadcrumbs end-->

          <h1 class="section-meta__title caption" style="margin-bottom: 20px;"><?php lang('Контакты', 'Контакти'); ?></h1>
        </div>
      </section>
    
      <section class="section-contacts">
        <div class="container section-contacts__container">
          <div class="section-contacts__info">
            <div class="section-contacts__contacts">
			<div itemscope itemtype="http://schema.org/Organization">
              <div class="section-contacts__block">
                <div class="section-contacts__block-header">
                  <p class="section-contacts__caption bold caption caption_small">Тел.</p>
                </div>
                <div class="section-contacts__block-body">
                  <div class="contact-box section-contacts__contact-box">
                    
                 <a class="contact-box__link link" href="tel:<?php $value = get_post_meta( 11, 'телефон_1_ссылка', true ); echo $value; ?>"><?php $value = get_post_meta( 11, 'телефон_1', true ); echo $value; ?></a>
            
            <a class="contact-box__link link" href="tel:<?php $value = get_post_meta( 11, 'телефон_2_ссылка', true ); echo $value;  ?>"><?php $value = get_post_meta( 11, 'телефон_2', true ); echo $value;  ?></a>
            </div>
                </div>
              </div>

              <div class="section-contacts__block">
                <div class="section-contacts__block-header">
                  <p class="section-contacts__caption bold caption caption_small">Email</span></p>
                </div>
                <div class="section-contacts__block-body">
                  <div class="contact-box section-contacts__contact-box">
                    
               <a class="contact-box__link link" href="mailto:<?php $value = get_post_meta( 11, 'mail', true ); echo $value;  ?>"><span itemprop="email"><?php $value = get_post_meta( 11, 'mail', true ); echo $value;  ?></span></a>
			</div>
                </div>
              </div>

              <div class="section-contacts__block">
                <div class="section-contacts__block-header">
                  <p class="section-contacts__caption bold caption caption_small"><?php lang('Адрес', 'Адреса') ?></p>
                </div>
                <div class="section-contacts__block-body">
                  <div class="contact-box section-contacts__contact-box">
                    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
<span itemprop="addressLocality"><p class="contact-box__item"><?php $value = get_post_meta( 11, 'адрес', true ); echo $value;  ?></p></span></div>
                  </div>
                </div>
              </div>
			  
			  
			   <div class="section-contacts__block">
                <div class="section-contacts__block-header">
                  <p class="section-contacts__caption bold caption caption_small"><?php lang('Время работы', 'Час роботи') ?></p>
                </div>
                <div class="section-contacts__block-body">
                  <div class="contact-box section-contacts__contact-box">
                    <p class="contact-box__item"><?php $value = get_post_meta( 11, 'время', true ); echo $value;  ?></p>
                  </div>
                </div>
              </div>

              <div class="section-contacts__block">
                <div class="section-contacts__block-header">
                  <p class="section-contacts__caption bold caption caption_small"><?php lang('Соцсети', 'Соцмережі') ?></p>
                </div><span itemscope itemtype="http://schema.org/Organization">
                <div class="section-contacts__block-body">
                  <div class="socials section-contacts__socials">
                    
					 <link itemprop="url" href="https://kelt.com.ua/">
                     <a itemprop="sameAs" class="socials__item socials__item_fb" href="<?php $value = get_post_meta( 11, 'facebook', true ); echo $value;  ?>" rel="nofollow"></a>
            
					<a itemprop="sameAs" class="socials__item socials__item_tw" href="<?php $value = get_post_meta( 11, 'twitter', true ); echo $value;  ?>" rel="nofollow"></a>
            
					<a itemprop="sameAs" class="socials__item socials__item_insta" href="<?php $value = get_post_meta( 11, 'instagram', true ); echo $value;  ?>" rel="nofollow"></a>
        
		

      
                  </div>
                </div>  </span>
              </div>

            </div>
            <div class="form-comment section-contacts__form-comment">             
				<?php echo do_shortcode(  '[contact-form-7 id="94" title="Контакты"]' ); ?>
            </div>
			
			</div>
          </div>
          <div class="section-contacts__map">
            <iframe src="<?php $value = get_post_meta( 11, 'карта', true ); echo $value;  ?>" allowfullscreen=""></iframe>
          </div>
        </div>
      </section>
    </main>
    <!-- main content ends-->
    <!-- main content ends-->

<?php get_footer(); ?>
