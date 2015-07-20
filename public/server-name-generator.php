<?php

$adjectives = ['Massive', 'Titanic', 'Monster', 'Jumbo', 'Mighty', 'Brawny', 'Stout', 'Mega', 'King-Size', 'Hefty'];
$nouns = ['Rose', 'Violet', 'Bluebonnet', 'Orchid', 'Daisy', 'Marigold', 'Clover', 'Dandelion', 'Lilac', 'Pansy'];

//$randAdj = rand(0, 9);
//$randNoun = rand(0, 9);

//var_dump($adjectives[$randAdj]);
//var_dump($nouns[$randNoun]);

//var_dump($randAdj);
//var_dump($randNoun);

function getRandomName ($adjectives, $nouns) {
	$randAdj = rand(0, 9);
	$randNoun = rand(0, 9);
	return "$adjectives[$randAdj] $nouns[$randNoun]" . PHP_EOL;
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Server Name Generator</title>
</head>
<body>
	<h1>Server Name Generator</h1>
	<h2><?php echo getRandomName($adjectives, $nouns); ?></h2>
   

</body>
</html>