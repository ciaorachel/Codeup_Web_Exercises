<?php  

	//resume session
	session_start();

	//destroy the session and redirect to login page
	endSession();
	header('Location: login2.php');
	exit();

	//function to destroy the session
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