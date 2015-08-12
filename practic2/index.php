<?php

	define('ADMIN_EMAIL', 'deavenor.encarma@gmail.com');

	$received = false;
	$error = '';

	if(!empty($_POST['send'])){

		$valid = true;

		$name = $_POST['name'];
		$date = date("d.m.Y");
		$email = $_POST['email'];
		$phone = $_POST['phone'];
  
		mysqli_query(connection,"insert into orders set name=")
		if( empty($name) || (strlen($name)<3) ){
			$valid = false;
			$error = 'Имя короткое или отсутствует';
		}elseif( empty($email)){
			$valid = false;
			$error = 'Не допустим пустой email';
		}

		if($valid)
		{
			$message = sprintf("Имя: %s\nEmail: %s\nТлф.: %s\nДата: %s\n-------------\n", $name, $email, $phone, $date );

			// Сохраняем в файл:
			$file = fopen('sendings.txt', 'a');
			fwrite($file, $message);
			fclose($file);

			// Отправить почту:
			$headers= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

			/* дополнительные шапки */
			$headers .= "From: Birthday Reminder <test@example.com>\r\n";
			$headers .= "Cc: test@example.com\r\n";
			$headers .= "Bcc: test@example.com\r\n";

			mail(ADMIN_EMAIL, 'Новый заказ', $message, $headers );
			mail($email, 'Ваш заказ', $message, $headers );

			$received = true;
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="format-detection" content="telephone=no"/>
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/booking.css">

	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>

	<!--[if lt IE 9]>
	<html class="lt-ie9">
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://windows.microsoft.com/en-US/internet-explorer/..">
			<img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
					 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
		</a>
	</div>
	<script src="js/html5shiv.js"></script>
	<![endif]-->

	<script src='js/device.min.js'></script>
</head>

<body>
<div class="page">
	<!--==============================HEADER==============================-->
	<header>
		<section class="parallax parallax01">
			<div class="top-panel">
				<div class="container">
					<div class="brand">
						<h1 class="brand_name"><a href="./">astoria</a></h1>
						<p class="brand_slogan">restaurant</p>
					</div>
				</div>
			</div>
			<div class="container">
				<h2>Discover the New Way to Love Food</h2>
				<p><em>Best Service, Best Food &amp; best Atmosphere!</em></p>
				<div class="row">
					<div class="preffix_4 grid_4">
						<form id="bookingForm" class="booking-form" action="index.php" method="POST">
							<?php if($received): ?>
								<p style="color:#00FF00;">Ваш заказ успешно отправлен!</p>
							<?php endif; ?>
							<?php if($error): ?>
								<p style="color:#ff0000;"><?php echo $error; ?></p>
							<?php endif; ?>
							<div class="tmInput">
								<input name="name" value="<?php if(!$received) echo @$name; ?>" placeHolder="Full name" type="text" data-constraints='@NotEmpty @Required @AlphaSpecial'>
							</div>
    						<div class="tmInput">
								<input name="email" value="<?php if(!$received) echo @$email; ?>" placeHolder="E-mail" type="text" data-constraints='@NotEmpty @Required @Email'>
							</div>
							<div class="tmInput">
								<input name="phone" value="<?php if(!$received) echo @$phone; ?>" placeHolder="Phone" type="text" data-constraints='@NotEmpty @Required @JustNumbers'>
							</div>
							<input type="hidden" name="send" value="1"/>
							<button class="btn" >Booking Now</button>
							<p><small>Vivamus diam enim, cursus sed urna eu, lobortis lobortis tellus at, tempor nisl. </small></p>
						</form>
					</div>
				</div>
			</div>
		</section>
	</header>

	<!--==============================FOOTER==============================-->
	<footer>
		<div class="container">
			<p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio.</p>
			<div class="footer-brand">
				<div class="footer-brand_name"><a href="#">astoria</a></div>
				<p class="footer-brand_slogan">restaurant</p>
			</div>
			<p class="copyright">
				© <span id="copyright-year"></span>. All Rights Reserved
				<!-- {%FOOTER_LINK} -->
			</p>
		</div>
	</footer>
</div>

<script src="js/script.js"></script>
<!-- coded by nyan -->
</body>
</html>