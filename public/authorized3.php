<?php

	require_once '../Input.php';
	require_once '../Auth.php';

	//resume session
	session_start();

	//confirming whether already logged in, otherwise redirect to login page
	if (Auth::check()) {
		 $username = $_SESSION["LOGGED_IN_USER"];
	} else {
		header('Location: login3.php');
		exit();
	}

	//assigns a session id
	$sessionId = session_id();

?>
<!DOCTYPE html>
<html>
<head>
	<title>POST Form Exercise: Authorized</title>
	<style type="text/css">
	body {
		font-family: Arial, Helvetica, sans-serif;
	}
	h1 {
		color: #333333;
		font-style: italic;
	}
	h2 {
		color: red;
	}
	</style>
</head>
<body>
	<h1>Welcome, <?= $username; ?>!</h1>
	<h2>Login successful!</h2>
	<a href="logout3.php?reset=true">Log out</a>
</body>
</html>