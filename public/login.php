<?php
	var_dump($_POST);
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
</body>
</html>