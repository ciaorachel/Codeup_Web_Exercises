<?php
	
	require_once '../Input.php';
	require_once '../Auth.php';

	//resume session
	session_start();

	
	//assigns a session id
	$sessionId = session_id();


	if (Auth::check()) {
		$username = $_SESSION["LOGGED_IN_USER"];
		header('Location: authorized3.php');
		exit();
	} 

	
	//pageController function validates log-in credentials
	function pageController()
	{
		$data = array();

		$data['message'] = '';

		//this if-else checks inputs to confirm whether entries match the username and password

		if (Input::has('username') && Input::has('password')) {
			$username = Input::get('username');
			$password = Input::get('password');

			Auth::attempt($username, $password);
				$data['message'] = "Username or password incorrect";
		}
		return $data;
	} 
	
	extract(pageController());

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