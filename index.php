<?php

$main_menu = array(
	'main' => 'Главная',
	'about' => 'Обо мне',
	'contacts' => 'Контакты'
);


$bottom_menu = array(
	'main' => 'Справка'
);

function buildMenu( $menu, $template = 'list_menu' ){

	include 'templates/' . $template . '.php';

} ?>

<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
		<link href="css/styles.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?php
		    buildMenu( $main_menu );
		?>
		<hr />
		<div>
		<?php

			$filename = @$_GET['page'];

			if( empty($filename) ){
				$filename = 'main';
			}

			include("pages/$filename.html");
		?>
		</div>
	    <hr />
		<?php
		    buildMenu( $bottom_menu , 'block_menu' );
		?>
	</body>
</html>




