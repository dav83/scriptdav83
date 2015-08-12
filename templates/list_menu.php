<ul>

<?php foreach($menu as $key => $value): ?>

	<li><a href="index.php?page=<?php echo $key; ?>"><?php echo $value; ?></a></li>

<?php endforeach; ?>

</ul>
 