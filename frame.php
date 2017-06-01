<?php
    include "db.php";

	$image = $_GET["i"];
	$book = $_GET("b");
	
	$fileName = "$IMAGE_BASE/$book/$image";
	if (file_exists($fileName)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');    
		header('Content-Length: ' . filesize($file));
		readfile($file);
		exit;
	}

    ?>