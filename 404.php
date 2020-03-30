<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
 $url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];




if (strpos($url, '/page/') !== false) {
$pieces  = $url;

$piece = explode("/", $pieces);
	


$i = $piece[count($piece)-2];

$i2 = $i-1;
$url2 = str_ireplace($i, $i2, $url);


header("HTTP/1.1 301 Moved Permanently"); 
		header("Location: $url2"); 
		exit(); 
}

get_header(); 



?>

  <main class="main" id="main">
        <div style="padding-top:70px; padding-bottom:25px;">
				<center>
					<h1 style="font-size:46px; color:#d50637;"><?php lang('404 страница', '404 сторінка') ?></h1>
					<h2><?php lang('Запрашиваемая Страница Не Найдена!', 'Сторінка Не Знайдена!') ?></h2>
				

				<div class="page-content">					
					<p><?php lang('Перейдите на ', 'Перейдіть на ') ?><a href="<?php echo get_home_url(); ?>"><?php lang('главную', 'головна') ?></a> <?php lang('или воспользуйтесь поиском', 'або скористайтеся пошуком') ?></p>
					<?php get_search_form(); ?>
			</div>
			</center>
			</div>
    
		</main><!-- .site-main -->
	
<?php echo $url2; get_footer(); ?>
