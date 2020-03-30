  <!-- main footer starts-->
    <footer class="footer" id="footer">
      <div class="footer__top">
        <div class="container footer__top-container">
          <div class="footer__block">
            <p class="caption caption_small bold footer__caption"><?php lang('контакты', 'контакти') ?></p>
            <div class="contact-box footer__contact-box">
              
				<a class="contact-box__link link bold" href="tel:<?php $value = get_post_meta( 11, 'телефон_1_ссылка', true ); echo $value; ?>"  rel="noindex,nofollow"><?php $value = get_post_meta( 11, 'телефон_1', true ); echo $value; ?></a>
			
            <a class="contact-box__link link bold" href="tel:<?php $value = get_post_meta( 11, 'телефон_2_ссылка', true ); echo $value;  ?>"  rel="noindex,nofollow"><?php $value = get_post_meta( 11, 'телефон_2', true ); echo $value;  ?>
<img src="<?php bloginfo('template_directory')?>/images/logo-viber.png" style="width:50px; position: absolute; margin: -5px 0 0 10px;"></a>

    
              
              <a class="contact-box__link link bold" href="mailto:<?php $value = get_post_meta( 11, 'mail', true ); echo $value;  ?>"><?php $value = get_post_meta( 11, 'mail', true ); echo $value;  ?></a>
            
			<div xmlns:v="http://rdf.data-vocabulary.org/#"  style="font-size:14px; float:right; font-weight:700; position:absolute; margin:100px 0 20px 0; font-family: 'OpenSans',Arial,'Nimbus Sans L','Helvetica CY',sans-serif;">
<span typeof="v:Breadcrumb">
<a href="https://kelt.com.ua/" rel="v:url" property="v:title" style="text-decoration:none;"><?php lang('Интернет магазин туристического снаряжения Kelt Active ', 'Інтернет магазин туристичного спорядження Kelt Active') ?></a> ›› </span>
<span typeof="v:Breadcrumb">
<a href="https://kelt.com.ua/#Товары для туризма" rel="v:url" property="v:title" style="text-decoration:none;"><?php lang('Товары для туризма', 'Товари для туризму') ?></a>
</span>
</div>
			</div>
          </div>

          <div class="footer__block">
            <p class="caption caption_small bold footer__caption"><?php lang('Информация', 'Інформація') ?></p>
            <ul class="menu footer__menu">			
              <li class="menu__item"><a href="<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; if (strpos($url, '/uk/') !== false){ echo '/uk/materiali/'; } else { echo '/materiali/'; } ?>"><?php lang('Материалы и технологии', 'Матеріали та технології') ?></a></li>
              <li class="menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/brands/'; } else { echo '/brands/'; } ?>"><?php lang('Бренды', 'Бренди') ?></a></li>
              <li class="menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/razmernye-setki/'; } else { echo '/razmernye-setki/'; } ?>"><?php lang('Размерные сетки', 'Розмірні сітки') ?></a></li>
            </ul>
          </div>

          <div class="footer__block">
            <p class="caption caption_small bold footer__caption"><?php lang('Покупателям', 'Покупцям') ?></p>
            <ul class="menu footer__menu">
              <li class="menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/diskontnaya-programma/'; } else { echo '/diskontnaya-programma/'; } ?>"><?php lang('Дисконтная программа', 'Дисконтна програма') ?></a></li>
              <li class="menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/news/'; } else { echo '/news/'; } ?>"><?php lang('Полезные статьи', 'Корисні статті') ?></a></li>
				<li class="menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/sitemap/'; } else { echo '/sitemap/'; } ?>"><?php lang('Карта сайта', 'Карта сайту') ?></a></li>
            </ul>
          </div>

          <div class="socials footer__socials">
            
            <a class="socials__item socials__item_fb" href="<?php $value = get_post_meta( 11, 'facebook', true ); echo $value;  ?>" rel="nofollow"></a>
            
            <a class="socials__item socials__item_tw" href="<?php $value = get_post_meta( 11, 'twitter', true ); echo $value;  ?>" rel="nofollow"></a>
            
            <a class="socials__item socials__item_insta" href="<?php $value = get_post_meta( 11, 'instagram', true ); echo $value;  ?>" rel="nofollow"></a>
            
            </div>
			
        </div>	
		
      </div>

      <div class="footer__bottom">	  
        <div class="container footer__bottom-container">	
		
          <p class="footer__label footer__label_subscribe"><?php lang('Подписаться на новости и акции', 'Підписатися на новини та акції') ?></p>
          <form class="form-subscribe footer__form-subscribe" action="<?php echo get_home_url(); ?>/footerform"  method="POST" >
            <input class="input form-subscribe__input" type="email" name="email" id="email" placeholder="Введите Ваш E-mail" required>
            <button class="button form-subscribe__submit" type="submit"  style="padding:0;"> <span><?php lang('Подписаться', 'Підписатися') ?></span></button>
          </form>
        </div>
      </div>
    </footer>
    <!-- main footer ends-->

    <!-- button to top starts-->
    <div class="totop" id="totop"></div>
    <!-- button to top ends-->

    <!-- overlay starts-->
    <!--overlay starts-->
    <div class="overlay" id="overlay-region"></div>
    <!--overlay ends-->
    <!--overlay starts-->
    <div class="overlay" id="overlay"></div>
    <!--overlay ends-->
    <!-- overlay ends-->

    <!-- touch panel starts-->
    <div class="touch-panel touch-panel_pos_right" id="touch-panel">
      <div class="touch-panel__container">
        <!-- closer starts-->
        <div class="closer touch-panel__closer touch-panel-closer">
          <div class="closer__line closer__line_one"></div>
          <div class="closer__line closer__line_two"></div>
        </div>
        <!-- closer ends-->

		<?php if( is_front_page() ){ ?>
		
		 <a class="logo touch-panel__logo"  href="#">
            
            <img src="https://kelt.com.ua/wp-content/themes/storefront/images/logos/logo.png" alt="Логотип <?php bloginfo('name'); ?>"/></a>
		
		<?php } else { ?>
		
          
           <a class="logo touch-panel__logo" href="<?php echo get_home_url(); ?>">
          
          <img src="<?php bloginfo('template_directory')?>/images/logos/logo.png" alt="KELT logo"/></a>		
		<?php } ?>
        
     

      
        <div class="contact-box touch-panel__contact-box">
          
          <a class="contact-box__link link bold" href="tel:<?php $value = get_post_meta( 11, 'телефон_1_ссылка', true ); echo $value; ?>"><?php $value = get_post_meta( 11, 'телефон_1', true ); echo $value; ?></a>
            
            <a class="contact-box__link link bold" href="tel:<?php $value = get_post_meta( 11, 'телефон_2_ссылка', true ); echo $value;  ?>"><?php $value = get_post_meta( 11, 'телефон_2', true ); echo $value;  ?></a>
              </div>
        <hr class="touch-panel__line">
        <ul class="secondary-menu touch-panel__secondary-menu">             
              <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/about/'; } else { echo '/about/'; } ?>"><?php lang('Публичная оферта', 'Публічна оферта') ?></a></li>
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/dostavka/'; } else { echo '/dostavka/'; } ?>"><?php lang('Доставка', 'Доставка') ?></a></li>
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/sposoby-oplaty/'; } else { echo '/sposoby-oplaty/'; } ?>"><?php lang('Способы оплаты', 'Способи оплати') ?></a></li>
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/vozvrat-i-obmen/'; } else { echo '/vozvrat-i-obmen/'; } ?>"><?php lang('Возврат и обмен', 'Возврат та обмін') ?></a></li>
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/garantii/'; } else { echo '/garantii/'; } ?>"><?php lang('Гарантии', 'Гарантії') ?></a></li>
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/contacts/'; } else { echo '/about/'; } ?>"><?php lang('Контакты', 'Контакти') ?></a></li>
        </ul>
        <hr class="touch-panel__line">
          <div class="touch-panel__catalog">
              <div class="touch-panel__category slide-box">
                  <div class="slide-box__header">
                    <? include_once __DIR__ . '/inc/nav-header-mobile.php' ?>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
    <!-- touch panel ends-->
    <!-- touch panel ends-->

    <!-- modal popups start-->
    <!-- modal starts-->
    <div class="modal modal_callback modal_fx_scale" id="modal-callback-modal">
      <div class="modal__content">
        <!-- closer starts-->
        <div class="closer modal__closer modal-callback-closer">
          <div class="closer__line closer__line_one"></div>
          <div class="closer__line closer__line_two"></div>
        </div>
        <!-- closer ends-->

        <p class="modal__caption caption"><?php lang('Заказать звонок', 'Замовити дзінок') ?></p>
        
          <p class="form-callback__label"><?php lang('Наши специалисты свяжутся с Вами как можно скорее', 'Наші спеціалисти зв\'яжуться з Вами як можно швидше') ?></p>
        <?php echo do_shortcode(  '[contact-form-7 id="46" title="Заказать звонок"]' ); ?>
      </div>
    </div>
    <!-- modal ends-->
  <!-- modal starts-->
    <div class="modal modal_buy modal_fx_scale" id="modal-buy-modal">
      <div class="modal__content">
        <!-- closer starts-->
        <div class="closer modal__closer modal-buy-closer">
          <div class="closer__line closer__line_one"></div>
          <div class="closer__line closer__line_two"></div>
        </div>
        <!-- closer ends-->

        <p class="modal__caption caption"><?php lang('Быстрый заказ', 'Швидке замовлення') ?></p>
        <div class="form-buy">
          <div class="form-buy__product">
            <div class="form-buy__image">
               <?php $post_id = get_the_ID(); ?>
              <img src="<?php the_post_thumbnail_url(); ?>" alt="tent"/>
            </div>
            <p class="form-buy__name"><?php the_title(); ?></p>
          </div>
          <p class="form-buy__label"><?php lang('Наши специалисты свяжутся с Вами как можно скорее', 'Наші спеціалисти зв\'яжуться з Вами як можно швидше') ?></p>
          <?php echo do_shortcode(  '[contact-form-7 id="149" title="Быстрый заказ"]' ); ?>
      </div>
    </div>
	</div>
    <!-- modal ends-->

    <!-- modal popups end-->

    <!--scripts-->
    <script src="<?php bloginfo('template_directory')?>/vendors/jQuery/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory')?>/vendors/jQuery/jquery.maskedinput.min.js"></script>
    <script src="<?php bloginfo('template_directory')?>/vendors/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?php bloginfo('template_directory')?>/vendors/lightbox/lightbox.js"></script>
    <script src="<?php bloginfo('template_directory')?>/vendors/xzoom/xzoom.min.js"></script>
    <script src="<?php bloginfo('template_directory')?>/js/onmind.plugins.min.js"></script>
    <script src="<?php bloginfo('template_directory')?>/js/scripts.js"></script>
<?php wp_footer(); ?>
    <!--scripts ends-->
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112483905-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112483905-1');
</script>
</section>
<!-- Help -->
<style>
@media (min-width: 480px) {
.help_pc {
	width:300px;
	z-index:10;
	position:fixed;
	bottom:0; /* отступ кнопки от нижнего края страницы*/
	left:10px;	
}
.help_mob {
	display:none;
}
}
@media (max-width: 480px) {
.help_pc {
	display:none;
}
.help_mob {
	width:15%;
	z-index:10;
	position:fixed;
	bottom:10px; /* отступ кнопки от нижнего края страницы*/
	left:10px;	
}
}

#box {
	width:370px;
	height:300px;
	z-index:100;
	position:fixed;
	left:10px;	
	bottom:0;
	background-color: #fff;
	text-align:center;
	color:#000;
	font-size:21px;
	font-weight:700;
	padding: 20px 10px 20px 10px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);
}

</style>
<script type="text/javascript">

function openbox(id){
    display = document.getElementById(id).style.display;

    if(display=='none'){
       document.getElementById(id).style.display='block';
    }else{
       document.getElementById(id).style.display='none';
    }
}
</script>

<a href="#" onclick="openbox('box'); return false"><img src="<?php bloginfo('template_directory')?>/images/pc_help.png" class="help_pc"></a>
<a href="#" onclick="openbox('box'); return false"><img src="<?php bloginfo('template_directory')?>/images/help_mob.png" class="help_mob"></a>

<div id="box" style="display: none;"><a href="#" onclick="openbox('box'); return false" style="color:red; font-size:14px; float:right; margin-top:-10px; text-decoration:none;"><?php lang('Закрыть X', 'Закрити X') ?></a>
<p><?php lang('Если у вас возникли вопросы, свяжитесь с нами в любом из мессенджеров', 'Якщо у вас є питання, звяжіться з нами в будь якому з мессенджерів') ?></p><br>
<p style="font-size:14px; font-weight:400;"><img src="<?php bloginfo('template_directory')?>/images/strela.png" style="width:15px; margin-right:10px;" ><?php lang('Задайте нам вопрос', 'Задайте нам питання') ?><img src="<?php bloginfo('template_directory')?>/images/strela.png" style="width:15px; margin-left:10px;" ></p>
<p><a href="https://www.messenger.com/t/Keltshop/"><img src="<?php bloginfo('template_directory')?>/images/mes.png" style="width:100px;" rel="noindex,nofollow"></a>
<a href="viber://chat?number=%2B380684279808"><img src="<?php bloginfo('template_directory')?>/images/viber.png" style="width:100px;" rel="noindex,nofollow"></a>
<a href="https://t.me/0684279808"><img src="<?php bloginfo('template_directory')?>/images/tel.png" style="width:100px;" rel="noindex,nofollow"></a>
</p>
</div>

<!-- Help -->
  </body>
</html>