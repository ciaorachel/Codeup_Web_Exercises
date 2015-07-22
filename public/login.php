<?php
	//start session
	session_start();

	if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
		session_destroy();
		header('Location: login.php');
		exit();
	} 

	$sessionId = session_id();

?>
<!DOCTYPE html>
<html>
<head>
	<title>POST Form Exercise: Login</title>
</head>
<body>
	<form method="POST" action="authorized.php">
    	<label>Username</label>
    	<input type="text" name="username" placeholder="Type your username"><br>
    	<label>Password</label>
    	<input type="password" name="password" placeholder="Type your password"><br>
    	<input type="submit">
	</form>

	<p>Session Id: <?php echo $sessionId; ?></p>
</body>
</html>