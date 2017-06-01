<?php
	include "db.php";
	$id = $_GET["b"];
?>
<html>
	<header>
		<meta name="theme-color" content="#000000" />
	</header>
	<style>
		body{
			background:#808080;
		}
		td, body{
			font:60px Arial;
			color:#ffffff;
		}
	</style>
	<body style="background:#000000;margin:0px" onresize="setFrame()">
		<table id="tLayout" style="width:100%;">
		<?php
			$rset = mysqli_query($dblink, "select _imageid, _text from gal_event where _bookid=$id");
			while(($row = mysqli_fetch_array($rset))>0){
				$imageId = $row["_imageid"];
				$text = $row["_text"];
				?>
					<tr><td><img src="image.php?id=<?=$imageId?>"></td><td><?=$text?></td></tr>
				<?php
			}
			mysqli_free_result($rset);
		?>
		</table>
	</body>
</html>