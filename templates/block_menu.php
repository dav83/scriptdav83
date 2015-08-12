<div class="menu">

	<?php foreach($menu as $key => $value): ?>

		<div><a href="index.php?page=<?php echo $key; ?>"><?php echo $value; ?></a></div>

	<?php endforeach; ?>

</div>