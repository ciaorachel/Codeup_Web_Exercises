<?php

function getRandomName () {
	$adjectives = array('Massive', 'Titanic', 'Monster', 'Jumbo', 'Mighty', 'Brawny', 'Stout', 'Beefy', 'Burly', 'Hefty');
	$nouns = array('Rose', 'Violet', 'Bluebonnet', 'Orchid', 'Daisy', 'Marigold', 'Clover', 'Dandelion', 'Lilac', 'Pansy');
	$randomArrayOne = $adjectives[rand(0, 9)];
	$randomArrayTwo = $nouns[rand(0, 9)];
	$serverName = "$randomArrayOne $randomArrayTwo";
	return $serverName;
}

function pageController()
{
	$data = array();
	$data ['serverName'] = getRandomName();
	return $data; 
}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
    <title>Server Name Generator</title>
    <style type="text/css">
    body {
    	font-family: Arial, Helvetica, sans-serif;
    	text-align: center;
    	background-color: #FFFFFF;
    	margin: 0;
    }
    h1 {
    	color: #121212;
    	font-size: 3rem;
    }
    h2 {
    	color: #333333;
    	font-size: 3rem;
    	font-weight: lighter;
    }

	#gradient {
    	height: 140%;
    	width: 100%;
    	background-image: linear-gradient(
    		to right,
    		#FFFF99, #FF3030
    		);
    	padding-top: 3%;
    	padding-bottom: 3%;
    }
    </style>
</head>
<body>
	<div id="gradient">
		<h1>Server Name Generator</h1>
	</div>
	<h2><?php echo $serverName; ?></h2>
</body>
</html>