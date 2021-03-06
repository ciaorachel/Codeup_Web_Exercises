<?php

	//resume session
	session_start();

	//confirming whether already logged in, otherwise redirect to login page
	if (!isset($_SESSION["LOGGED_IN_USER"])) {
		header('Location: login2.php');
		exit();
	}

	//assigns a session id
	$sessionId = session_id();


	//session destroy function
	function endSession() {
	    $_SESSION["LOGGED_IN_USER"]= array();

	    if (ini_get("session.use_cookies")) {
	        $params = session_get_cookie_params();
	        setcookie(session_name(), '', time() - 42000,
	            $params["path"], $params["domain"],
	            $params["secure"], $params["httponly"]
	        );
	    }

	    session_destroy();
	}

	require_once '../Input.php';
	require_once '../Auth.php';

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
	<h1>Authorized</h1>
	<h2>Login successful!</h2>
	<a href="logout2.php?reset=true">Log out</a>
</body>
</html>