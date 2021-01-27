<?php 
	include("DataConnection1.php"); // database sql connection 

	session_start(); 
	error_reporting(E_ERROR | E_PARSE); // use for hide warning
	ob_start();
	
	if(isset($_POST["logout"]))
	{
	session_destroy();
	echo 'You have been logged out. <a href="UserLogin10.php">Go back</a>';
	}
?>