<?php

$menu = array(
	'main' => 'Главная',
	'about' => 'Обо мне',
	'contacts' => 'Контакты'
);

?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
		<link href="css/styles.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<ul>
			<?php foreach($menu as $key => $value): ?>
				<li><a href="index.php?page=<?php echo $key; ?>"><?php echo $value; ?></a></li>
			<?php endforeach; ?>
		</ul>
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
	</body>
</html>




