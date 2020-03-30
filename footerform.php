<?php
/*
Template Name: Подписаться на новости и акции
*/
get_header(); ?>
<?php 

$sendto   = get_post_meta( 11, 'mail', true ); echo $value; // почта, на которую будет приходить письмо
$useremail = $_POST['email']; // номер телефона 



// Формирование заголовка письма
$subject  = "Новое сообщение";
$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

// Формирование тела письма
$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Подписался на новости и акции</h2>\r\n";
$msg .= "<p><strong>E-mail:</strong> ".$useremail."</p>\r\n";


$msg .= "</body></html>";

// отправка сообщения
if(@mail($sendto, $subject, $msg, $headers)) {
	echo "<center><img src='spasibo.png' width=100%></center>";
} else {
	echo "<center><img src='images/ne-otpravleno.png'></center>";
}

?>

  <main class="main" id="main">
        <div style="padding-top:70px; padding-bottom:25px;">
				<center>
					<h1 style="font-size:46px; color:#d50637;"><?php lang('Спасибо! Вы подписаны на наши новости и акции', 'Дякую! Ви підписані на наші новини та акції') ?></h1>
				
				

				
			</center>
			</div>
    
		</main><!-- .site-main -->
	
<?php get_footer(); ?>
