<?php
	
	//session start
	session_start();

	//session destroy call when reset=true
	if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
		session_destroy();
		header('Location: logout.php');
		exit();
	} 

	//assigns a session id
	$sessionId = session_id();

	//authorizes user credentials
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		if ($_POST['username'] == 'guest' && $_POST['password']  == 'password') {
			$header = "Welcome, {$_POST['username']}!";
			$message = "Login successful";
			$_SESSION["LOGGED_IN_USER"]= array();
			$logout = "Logout";
		} else {
			if ($_POST['username'] != 'guest' && $_POST['password'] == 'password') { 
				$header = "NOT Authorized";
				$message = "Username incorrect";
				$logout = "Go back to log in";
			} elseif ($_POST['username'] == 'guest' && $_POST['password'] != 'password') {
				$header = "NOT Authorized";
				$message = "Password incorrect";
				$logout = "Go back to log in";
			} else {
				$header = "NOT Authorized";
				$message = "Username and password incorrect";
				$logout = "Go back to log in";
			}
		}
	} else {
		endSession();
		header('Location: login.php');
		exit();
	}

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
	<h1><?php echo $header; ?></h1>
	<h2><?php echo $message; ?></h2>
	<a href="logout.php?reset=true"><?php echo $logout; ?></a>
	<p>Session Id: <?php echo $sessionId; ?></p>

</body>
</html>