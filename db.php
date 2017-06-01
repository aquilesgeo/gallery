<?php
	session_start();
	
	if (!isset($public)){
		if (!isset($_SESSION["user"])){
			header("Location: index.php");
			exit(0);
		}
	}
	
	$dblink = mysqli_connect("localhost","id1727636_panchelo","merida"); 
 	mysqli_select_db($dblink, "id1727636_galery1975");
 	mysqli_set_charset($dblink, 'utf-8');
	
	/*
	$dblink = mysqli_connect("localhost","root","magic"); 
 	mysqli_select_db($dblink, "gal");
 	mysqli_set_charset($dblink, 'utf-8');
	*/
?>