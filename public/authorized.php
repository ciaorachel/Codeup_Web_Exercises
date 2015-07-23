<?php
	
	//resume session
	session_start();

	//session destroy call when reset=true
	if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
		session_destroy();
		header('Location: logout.php');
		exit();
	} 

	//assigns a session id
	$sessionId = session_id();
	
	
	//pageController function validates log-in credentials
	function pageController()
	{
		$data = array();

		//this if-else checks inputs to confirm whether entries match the username and password
		if (!empty($_POST['username']) && !empty($_POST['password'])) {

			if ($_POST['username'] == 'guest' && $_POST['password']  == 'password') {
					$data['header'] = "Welcome, {$_POST['username']}!";
					$data['message'] = "Login successful";
					$_SESSION["LOGGED_IN_USER"]= array();
					$data['logout'] = "Logout";

				} else {
					if ($_POST['username'] != 'guest' && $_POST['password'] == 'password') { 
						$data['header'] = "NOT Authorized";
						$data['message'] = "Username incorrect";
						$data['logout'] = "Go back to log in";

					} elseif ($_POST['username'] == 'guest' && $_POST['password'] != 'password') {
						$data['header'] = "NOT Authorized";
						$data['message'] = "Password incorrect";
						$data['logout'] = "Go back to log in";

					} else {
						$data['header'] = "NOT Authorized";
						$data['message'] = "Username and password incorrect";
						$data['logout'] = "Go back to log in";
					}
				}
		} else {
			endSession();
			header('Location: login.php');
			exit();
		}

		return $data;
	}

	extract(pageController());


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
	<a href="authorized.php?reset=true"><?php echo $logout; ?></a>
</body>
</html>