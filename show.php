<?php
	include "db.php";
	$id = $_GET["id"];
?>
<html>
	<header>
		<meta name="theme-color" content="#000000" />
	</header>
	<style>
		.content{
			vertical-align:bottom;
			text-align:center;
			color:#ffffff;
			font:14px Verdana;
			text-shadow:
				-1px -1px 0 #000,
				1px -1px 0 #000,
				-1px 1px 0 #000,
				1px 1px 0 #000;
		}
	</style>
	<script>
		function Event(imageIndex, text){
			this.image = images[imageIndex];
			this.text = text;
			return this;
		}
		var numImages = 0;
		var numFrames = 0;
		var images = new Array();
		var events = new Array();
		var currentEvent = 0;
		
		function frame(imageIndex, text){			
			events[numFrames] = new Event(imageIndex, text);
			numFrames++;
		}
		
		function preload(indexImage, imageSource) {
			images[indexImage] = new Image();
			images[indexImage].src = imageSource;
		}
		
		<?php
			$rset = mysqli_query($dblink, "select _id from gal_image where _bookid=$id");
			while(($row = mysqli_fetch_array($rset))>0){
				echo "preload(\"{$row["_id"]}\",\"image.php?id={$row["_id"]}\");\n";
			}
			mysqli_free_result($rset);
		?>
	
		<?php
			$rset = mysqli_query($dblink, "select _imageid, _text from gal_event where _bookid=$id");
			while(($row = mysqli_fetch_array($rset))>0){
				echo "frame(\"{$row["_imageid"]}\",\"{$row["_text"]}\");\n";
			}
			mysqli_free_result($rset);
		?>		
		function setFrame(){
			var f;
			var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
			var h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
			var iFrame = document.getElementById('tLayout');
			var iText = document.getElementById('tText');
			iFrame.style.backgroundImage = "url('"+events[currentEvent].image.src+"')";
			iText.innerHTML = events[currentEvent].text;
			dx = w;
			dy = (w*360)/640;
			f = (w*14)/640;
			if (dy>h){
				dx = (h*640)/360;
				dy = h;
				f = (h*14)/360
			}
			iFrame.style.width = dx;
			iFrame.style.height = dy;
			iFrame.style.position = 'absolute';
			iFrame.style.top = 0;
			iFrame.style.left = (w-dx)/2;
			iText.style.fontSize=f;
		}
		
		function move(step){
			var futureFrame = currentEvent + step;
			if (futureFrame<0 || futureFrame>=events.length){
				return;
			}
			currentEvent = futureFrame;
			setFrame();
		}		
	</script>
	<body style="background:#000000;margin:0px" onresize="setFrame()">
		<table id="tLayout" style="width:640;height:360;background-size: 100%;">
			<tr>
				<td onclick="move(-1)" style="cursor:pointer">&lt;</td>
				<td class="content"><div id="tText">&nbsp;</div></td>
				<td onclick="move(1)" style="cursor:pointer">&gt;</td>
			</tr>
		</table>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		&nbsp;<br>
		<script>
			setFrame();
		</script>
	</body>
</html>