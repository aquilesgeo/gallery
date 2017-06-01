<?php
    include "db.php";
    if(isset($_GET['id'])) {    
        $id = intval($_GET['id']);
        $query = "SELECT concat('../../images/',b._folder,'/',i._name) as _imagepath FROM gal_image as i, gal_book as b WHERE i._id = $id and i._bookid=b._id";
        $result = mysqli_query($dblink, $query);

		$row = mysqli_fetch_assoc($result);

		$file = $row['_imagepath'];
		
		mysqli_free_result($result);
		$extension = substr($file, strlen($file)-3, 3);
		if ($extension=="jpg"){
			header('Content-Type: image/jpeg');
		}else if ($extension=="png"){
			header('Content-Type: image/png');	
		}else{
			header('Content-Type: application/octet-stream');
		}
		header('Content-Length: ' . filesize($file));
		readfile($file);
		exit;
    } 

    ?>