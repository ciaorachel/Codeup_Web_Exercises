<?php  
$myFaveThings = ['kittens', 'puppies', 'bunnies', 'flowers', 'chocolate'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Favorite Things</title>
</head>
<body>
	<h1>My Favorite Things</h1>
	<ol>
	<?php foreach ($myFaveThings as $myFaveThing) { ?>
		<li><?php echo $myFaveThing . PHP_EOL; ?></li>
	<?php } ?>
	</ol>
</body>
</html>