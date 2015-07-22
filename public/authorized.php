<?php
	
	if ($_POST['username'] == 'guest' && $_POST['password']  == 'password') {
		$header = "Authorized";
		$message = "Login successful";
	} else {
		if ($_POST['username'] != 'guest' && $_POST['password'] == 'password') { 
			$header = "NOT Authorized";
			$message = "Username incorrect";
		} elseif ($_POST['username'] == 'guest' && $_POST['password'] != 'password') {
			$header = "NOT Authorized";
			$message = "Password incorrect";
		} else {
			$header = "NOT Authorized";
			$message = "Username and password incorrect";
		}
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
	<a href="login.php">Back</a>
</body>
</html>