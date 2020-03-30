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
 ?>

<!DOCTYPE html>
<?php if (strpos($url, '/uk/') !== true) { ?>
<html lang="ru" dir="ltr">

<link rel="alternate" href="https://kelt.com.ua" hreflang="ru-ua"/>



<link rel="alternate" href="https://kelt.com.ua/uk/" hreflang="uk-ua" />
<?php } else { ?>
<html lang="uk" dir="ltr">
<link rel="alternate" href="https://kelt.com.ua/uk/" hreflang="uk-ua" />

<link rel="alternate" href="https://kelt.com.ua" hreflang="ru-ua"/>
<?php } ?>
  <head>
    <!--meta information starts-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="metaDescription">

    <!--meta information ends-->

   
    <!--favicon starts-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory')?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory')?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory')?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php bloginfo('template_directory')?>/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php bloginfo('template_directory')?>/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory')?>/favicon/fav.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="<?php bloginfo('template_directory')?>/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!--favicons ends-->

    <!--styles-->
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/vendors/lightbox/lightbox.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/vendors/xzoom/xzoom.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/vendors/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/vendors/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/css/styles.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/style.css">
    <!--styles ends-->
	<?php $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		$url_array = explode('=',$url);	
		$keyurl = $url_array[1];	
		$keys = str_replace("%20", " ", "$keyurl");		
		$keys_array = explode('&',$keys);	
		$key = $keys_array [0];
		$key2 = str_replace("-", " ", "$key");	
		$key3 = ucwords(strtolower($key2));
		$paged  = $url;
		$page = explode("/", $paged);
		$page = $page[count($page)-2];
		$key2 = ucfirst($key2);
		
		if (strpos($url, 'filter_brand_prod=') !== false){ 
			$urlwidth = substr_count($url,'/');
			if ($urlwidth < 5) {
				$meta1 = "<title>Купить товары бренда $key2 в Украине : Киев, Днепр, Харьков | Интернет-магазин KELT</title>\n";
				$meta2 = "<meta name=\"description\" content=\"Товары бренда $key2 - Большой выбор✓ Лучшая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓\">";
				$meta1_uk ="<title>Купити товари бренду $key2 в Україні : Київ, Дніпро, Харьків | Інтернет-магазин KELT</title>\n";
				$meta2_uk = "<meta name=\"description\" content=\"Товари бренду $key2 - Великий вибір✓ Краща ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓\">";
			
				
				lang($meta1, $meta1_uk); 
				lang($meta2, $meta2_uk); 
				
				
				} elseif ($urlwidth > 5 && strpos($url, '/shop/page/') !== false) {
					$meta1 = "<title>Купить товары бренда $key2 в Украине : Киев, Днепр, Харьков | Интернет-магазин KELT - Старница $page</title>\n";
					$meta1_uk = "<title>Купити товари бренду $key2 в Україні : Київ, Дніпро, Харьків | Інтернет-магазин KELT - Старінка $page</title>\n";
					$meta2 = "<meta name=\"description\" content=\"Товары бренда $key2 - Большой выбор✓ Лучшая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ - Старница $page\">";
					$meta2_uk = "<meta name=\"description\" content=\"Товари бренду $key2 - Великий вибір✓ Краща ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ - Сторінка $page\">";
				
				lang($meta1, $meta1_uk); 
				lang($meta2, $meta2_uk); 
			} else { ?>
				<?php if (strpos($url, '/product-category/sport/lyzhnyj-sport/?filter') !== false){ ?>
					<title>	<?php lang('Товары для лыжного спорта', 'Товари для лижного спорту') . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php  lang('Товары для лыжного спорта', 'Товари для лижного спорту') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				
				<?php } elseif (strpos($url, '/product-category/sport/fitnes/?filter') !== false){ ?>
					<title>	<?php lang('Товары для фитнеса', 'Товари для фітнесу') . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php lang('Товары для фитнеса', 'Товари для фітнесу') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				
				<?php } elseif (strpos($url, '/product-category/sport/snowboarding/?filter') !== false){ ?>
					<title>	<?php lang('Товары для сноубординга', 'Товари для сноубордингу') . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php lang('Товары для сноубординга', 'Товари для сноубордингу') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				
				<?php } elseif (strpos($url, '/product-category/sport/badminton-squash/?filter') !== false){ ?>
					<title>	<?php lang('Товары для БАДМИНТОНА И СКВОША', 'Товари для БАДМИНТОНУ ТА СКВОШУ') . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php lang('Товары для БАДМИНТОНА И СКВОША', 'Товари для БАДМИНТОНУ ТА СКВОШУ') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				
				<?php } elseif (strpos($url, '/product-category/sport/boks-edinoborstva/?filter') !== false){ ?>
					<title>	<?php lang('Товары для единоборств', 'Товари для єдиноборства') . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php lang('Товары для единоборств', 'Товари для єдиноборства') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				
				<?php } elseif (strpos($url, '/product-category/sport/bolshoj-tennis/?filter') !== false){ ?>
					<title>	<?php lang('Товары для большого тениса', 'Товары для великого тенісу') . $key3; echo ' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT';?></title>
					<meta name="description" content="<?php  lang('Товары для большого тениса', 'Товары для великого тенісу') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				
				<?php } elseif (strpos($url, '/product-category/sport/nastolnyj-tennis/?filter') !== false){ ?>
					<title>	<?php lang('Товары для настольного тениса', 'Товары для настольного тенісу') . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php lang('Товары для настольного тениса', 'Товары для настольного тенісу') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				
				<?php } elseif (strpos($url, '/product-category/sport/atletika/?filter') !== false){ ?>
					<title>	<?php lang('Товары для занятия атлетикой', 'Товары для заняття атлетикою') . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php  lang('Товары для занятия атлетикой', 'Товары для заняття атлетикою') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				
				<?php } elseif (strpos($url, '/product-category/sport/velosipedy/?filter') !== false){ ?>
					<title>	<?php lang('Товары для велоспорта', 'Товары для велоспорту') . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php lang('Товары для велоспорта', 'Товары для велоспорту') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				
				<?php } elseif (strpos($url, '/product-category/sport/plavanie/?filter') !== false){ ?>
					<title>	<?php echo lang('Товары для плаванья', 'Товары для плавання') . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php lang('Товары для плаванья', 'Товары для плавання') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				
				<?php } elseif (strpos($url, '/product-category/sport/igry-s-myachem/?filter') !== false){ ?>
					<title>	<?php lang('Товары для игры с мячем', 'Товары для гри з м\'ячем') . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php lang('Товары для игры с мячем', 'Товары для гри з м\'ячем') . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
			
				<?php } else { ?>
					<title><?php single_cat_title(''); echo ' ' . $key3; lang(' купить недорого Киев, Полтава, Львов, Днепр | Интернет-магазин KELT', ' купити недорого Київ, Полтава, Львів, Дніпро | Інтернет-магазин KELT'); ?></title>
					<meta name="description" content="<?php single_cat_title(''); echo ' ' . $key3; lang(' Лучший выбор✓ Хорошая цена✓ 100% гарантия качества✓ ✈ Оперативная доставка✓ Интернет-магазин KELT', ' Кращий выбір✓ Гарна ціна✓ 100% гарантія якості✓ ✈ Оперативна доставка✓ Інтернет-магазин KELT'); ?>">
				<?php } ?>
			<?php }
			
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




