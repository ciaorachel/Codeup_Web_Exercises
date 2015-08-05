<?php  

require_once '../parks_config.php';
require_once '../db_connect.php';

$limitVal = 4;
$offsetVal = 0;
$page = 1;

/*if (Input::has('park') && 
		Input::has('location') && 
		Input::has('established') && 
		Input::has('area_in_acres') && 
		Input::has('description')) {*/

if (!empty($_POST)) {
	if ($_POST['park'] && 
		$_POST['location'] && 
		$_POST['established'] && 
		$_POST['area_in_acres'] && 
		$_POST['description']) {	
			$post = $dbc->prepare('INSERT INTO national_parks(park, location, established, area_in_acres, description) VALUES (
				:inputParkName, 
				:inputLocation, 
				:inputEstablished, 
				:inputAcres,
				:inputDescription
			)');
			$post->bindValue(':park', Input::get('park'), PDO::PARAM_STR);
			$post->bindValue(':location', Input::get('location'), PDO::PARAM_STR);
			$post->bindValue(':established', Input::get('established'), PDO::PARAM_INT);
			$post->bindValue(':area_in_acres', Input::get('area_in_acres'), PDO::PARAM_INT);
			$post->bindValue(':description', Input::get('description'), PDO::PARAM_STR);
			$post->execute();

		    //echo "Inserted ID: " . $dbc->lastInsertId() . PHP_EOL;
	}
}

$total = $dbc->prepare('SELECT count(*) FROM national_parks');
$total->execute();

$results = $total->fetchColumn();

$maxPages = ceil($results / $limitVal);


if (isset($_GET['page'])) {
	if ($_GET['page'] > $maxPages) {
		header('Location: ?page=' . $maxPages);
	} elseif ($_GET['page'] < 1) {
		header('Location: ?page=1');
	} else {
		$offsetVal = ($_GET['page'] -1) * $limitVal;
		$page = $_GET['page'];
	}

} else {
	$_GET['page'] = 1;
	$page = 1;
}


$stmt = $dbc->prepare('SELECT * FROM national_parks LIMIT :limitVal OFFSET :offsetVal');
$stmt->bindValue(':limitVal', $limitVal, PDO::PARAM_INT);
$stmt->bindValue(':offsetVal', $offsetVal, PDO::PARAM_INT);
$stmt->execute();

/*$dateFmt = new $dbc->prepare('SELECT established FROM national_parks');
$dateFmt->bindValue(':date', $dateFmt, PDO::PARAM_INT);
$dateFmt->format('m-d-Y');
$dateFmt->execute();*/

?>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<title>National Parks</title>

	<style type="text/css">
		h1 {
			font-weight: bolder;
			
		}

		h2 {
			color: #474747;
			font-weight: bolder;
		}

		div.btn-group-wrap {
			text-align: center;
			margin-bottom: 4rem;
		}

		div.btn-group { 
			margin: 0 auto;
			text-align: center;
		    width: inherit;
		    display: inline-block;
		}

		#middleInfo.disabled {
			color: #191919;
			margin: 0 auto;
			background-color: #ffffff;
			font-weight: bold;
			border: 0.1rem solid #cdcdcd;
			padding-left: 4rem;
			padding-right: 4rem;
		}
	</style>
</head>
<body>
	<div class="container">

		<h1>National Parks</h1>

		
		<table class="table table-striped">
			<thead>
				<th>Park</th>
				<th>State</th>
				<th>Established</th>
				<th>Acres</th>
				<th>Description</th>
			</thead>
			<? foreach($stmt as $id => $park): ?>
			<tr>
				<td><?= $park['park']; ?></td>
				<td><?= $park['location']; ?></td>
				<td><?= $park['established']; ?></td>
				<td><?= $park['area_in_acres']; ?></td>
				<td><?= $park['description']; ?></td>
			</tr>
			<? endforeach; ?>

		</table>

		<div class="btn-group-wrap">
			<div class="btn-group btn-block">
				<a class="btn btn-primary" id="back" href="?page=<?= $page - 1; ?>">Back</a>
				<button id="middleInfo" class="btn btn-inverse disabled">Total parks: <?= $results; ?> | Viewing page <?= $page; ?> of <?= $maxPages; ?></button>
				<a class="btn btn-primary" id="next" href="?page=<?= $page + 1; ?>">Next</a>
			</div>
		</div>
		

		<h2>Add a New National Park to the List</h2>

		

		<form class="form-horizontal" role="form">
			<div class="form-group">
				<label class="control-label col-sm-2" for="nameInput">Park Name:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nameInput" placeholder="Park name">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="stateInput">State:</label>
				<div class="col-sm-2"> 
					<input type="text" class="form-control" id="stateInput" placeholder="Ex.: TX, CA">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="establishedInput">Established:</label>
				<div class="col-sm-4"> 
					<input type="text" class="form-control" id="establishedInput" placeholder="YYYY-MM-DD">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="acresInput">Acres:</label>
				<div class="col-sm-4"> 
					<input type="text" class="form-control" id="acresInput" placeholder="Area in acres">
				</div>
			</div>

			<div id="submitButton" class="form-group">
				<label class="control-label col-sm-2" for="descriptionInput">Description:</label>
				<div class="col-sm-8"> 
					<input type="text" class="form-control" id="descriptionInput" placeholder="Description - max 300 characters">
				</div>
			</div>

			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</div>
		</form>




	</div>	

	<!-- Page	1	2	3	
	Limit	...	4	4	4
	Offset	...	0	4	8 -->

	<!--

	if ($results > $offset) {
		//display Next button
	} else {
		//
	}

	-->


</body>
</html>