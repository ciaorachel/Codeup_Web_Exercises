<?php
function pageController()
{
	var_dump($_GET);

	$data = array();

	$data['counter'] = 0;
	
	if (isset($_GET['moveUpOrDown'])) {

		if ($_GET['moveUpOrDown'] == 'up') {
			$data['counter'] = $_GET['incrementValue'] += 1;

		} elseif ($_GET['moveUpOrDown'] == 'down') {
			$data['counter'] = $_GET['incrementValue'] -= 1;

		}
	} else {
		$data['counter'] = 0;
	}

	return $data; 

}

extract(pageController());

?>
<!DOCTYPE html>
<html>
<head>
	<title>Ping</title>
</head>
<body>
	<a href="?moveUpOrDown=up&incrementValue=<? echo $counter ;?>">HIT</a>

	<a href="?moveUpOrDown=down&incrementValue=<? echo $counter ;?>">MISS</a>

	<h2><? echo $counter; ?></h2>

</body>
</html>