<?php  
$myFaveThings = array('kittens', 'puppies', 'bunnies', 'flowers', 'chocolate');
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Favorite Things</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<style>
	#fancyTable {
		width: 40%;
		font-size: 2rem;
	}
	</style>
</head>
<body>
	<div class="container-fluid">
		<table class="table table-striped" id="fancyTable">
		<thead><tr><th>
		My Favorite Things
		</th></tr></thead>

		<? foreach ($myFaveThings as $myFaveThing): ?>
			<tr><td><?= $myFaveThing; ?></td></tr>
		<? endforeach; ?>
		</table>
	</div>

</body>
</html>