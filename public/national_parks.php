<?php  

require_once '../parks_config.php';
require_once '../db_connect.php';

$stmt = $dbc->query('SELECT * FROM national_parks');

//print_r($stmt->fetch());

//print_r($stmt->fetch(PDO::FETCH_ASSOC));

//print_r($stmt->fetch(PDO::FETCH_NUM));

//print_r($stmt->fetch(PDO::FETCH_BOTH));

$total = $dbc->query('SELECT count(*) FROM national_parks');


function getParks($dbc)
{	
    return $dbc->query('SELECT * FROM national_parks')->fetchAll(PDO::FETCH_ASSOC);
}

//print_r(getParks($dbc));


?>
<html>
<head>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<title>National Parks</title>
</head>
<body>
	<div class="container-fluid">
		<h1>National Parks</h1>
		<table class="table table-striped">
			<thead>
				<th>Park</th>
				<th>Location</th>
				<th>Established</th>
				<th>Area in acres</th>
			</thead>
			<? foreach($stmt as $id => $park): ?>
			<tr>
				<td><?= $park['park']; ?></td>
				<td><?= $park['location']; ?></td>
				<td><?= $park['established']; ?></td>
				<td><?= $park['area_in_acres']; ?></td>
			</tr>
			<? endforeach; ?>
		</table>
		<h5><?= "Total results: " . $total->fetchColumn() . PHP_EOL; ?></h5>
	</div>	

	<!-- Page	1	2	3	
	Limit	...	4	4	4
	Offset	...	0	4	8 -->

</body>
</html>

