<?php
	
	//resume session
	session_start();

	
	//assigns a session id
	$sessionId = session_id();
	
	
	//pageController function validates log-in credentials
	function pageController()
	{
		$data = array();

		$data['message'] = '';

		//this if-else checks inputs to confirm whether entries match the username and password
		if (!empty($_POST['username']) && !empty($_POST['password'])) {

			if ($_POST['username'] == 'guest' && $_POST['password']  == 'password') {
				$_SESSION["LOGGED_IN_USER"]= array();
				header('Location: authorized2.php');
				exit();

			} else {
				$data['message'] = "Username or password incorrect";
			}
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

require_once '../functions.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>POST Form Exercise: Login and Verify Credentials on Same Page</title>
</head>
<body>
	<h2><?php echo $message; ?></h2>
	
	<form method="POST">
    	<label>Username</label>
    	<input type="text" name="username" placeholder="Type your username"><br>
    	<label>Password</label>
    	<input type="password" name="password" placeholder="Type your password"><br>
    	<input type="submit">
	</form>

</body>
</html>