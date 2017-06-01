<?php
	$public = true;
	include "db.php";
	if (isset($_GET["logout"])){
		unset($_SESSION["user"]);
		header("Location: index.php");
	}
	if (isset($_POST["send"])){
		$user = $_POST["user"];
		$password = md5($_POST["password"]);
		$rset = mysqli_query($dblink, "select * from gal_user where _user='$user' and _password='$password'");
		//echo mysqli_error($link);
		$row = mysqli_fetch_array($rset);
				
		if ($row){
			$_SESSION["user"] = $user;
			header("Location: index.php");
			exit(0);
		}
	}
?>

<html>
	<style>
		body, td, input{
			font:60px Arial;
			background:#000000;
			color:#ffffff;
		}
	</style>
	<body style="font:60 Arial">
		<form action="login.php" method="post">
			<input type="edit" name="user"><br>
			<input type="password" name="password"><br>
			<input type="submit" name="send" value="login">
		</form>
	</body>
</html>