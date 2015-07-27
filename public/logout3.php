<?php  

	require_once '../Input.php';
	require_once '../Auth.php';

	//resume session
	session_start();

	//destroy the session and redirect to login page
	Auth::logout();
	header('Location: login3.php');
	exit();

?>