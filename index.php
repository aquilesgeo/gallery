<?php
	$public = true;
	include "db.php";
	
	
	if (isset($_SESSION["user"])){		
		?>
<html>
	<style>
		body {			
			background:#000000;			
		}
		a, td, body {
			font:60px Arial;			
			color:#ffffff;
		}
		a{
			text-decoration:none;
		}
	</style>

	<body style="font:60 Arial">
		<table>
			<tr><td>Books | <a href="login.php?logout=123">Lgout</a></td></tr>
		
		<?php
			$rset = mysqli_query($dblink, "select * from gal_book");
			while(($row=mysqli_fetch_array($rset))){
				echo "<tr>";
				echo "<td style=\"background:#C00000;color:#ffffff\"><a href=\"book.php?id={$row['_id']}\">{$row['_name']}</a></td>";
				echo "<td style=\"background:#C00000;color:#ffffff\"><a href=\"strip.php?id={$row['_id']}\">strip</a></td>";
				// echo "<td><a href=\"images.php?id={$row['_id']}\">{$row['_name']}</a></td>";
				// echo "<td><a href=\"events.php?id={$row['_id']}\">{$row['_name']}</a></td>";
				echo "</tr>";
			}
			mysqli_free_result($rset);
		?>
		</table>
		
	</body>
</html>
		<?php
	}else{
		?>
<html>
	<style>
		body {			
			background:#000000;			
		}
		body, td,a {
			font:60px Arial;
			color:#ffffff;
		}
		a{
			text-decoration:none;
		}
	</style>
	<body style="font:60 Arial">
		<a href="login.php">Login</a>
	</body>
</html>
		<?php
	}
	
?>