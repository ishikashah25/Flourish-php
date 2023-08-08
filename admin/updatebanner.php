<?php
include_once 'connection.php';
if (isset($_POST['submit'])) {
	$imagename = trim(mysqli_real_escape_string($connection, $_POST['imagename']));
	$imagecaption = trim(mysqli_real_escape_string($connection, $_POST['imagecaption']));
	$active = trim($_POST['active']);
	$slidertype = trim(mysqli_real_escape_string($connection, $_POST['slidertype']));
	$imageid = $_POST['id'];
	if ($_FILES['file']['name'] != "") {
		$files = time().".jpg";
		$filename_O = "T".$files;
		$filename_C = "TH".$files;
		$originalpath = "bannerimages/original/";
		$convertedpath = "bannerimages/convert/";
		move_uploaded_file($_FILES['file']['tmp_name'], $originalpath.$filename_O);
		if ($_POST['convert'] == "Y") {
			include_once 'SimpleImage.php';
			$image = new SimpleImage();
			$image->load($originalpath.$filename_O);
			$image->resize(1280,500);
			$image->save($convertedpath."$filename_C");
			$image = imagecreatefromjpeg($convertedpath."$filename_C");
			$destination = $convertedpath."$filename_C"; 
		} else{
			copy($n.$filename_O, $convertedpath."$filename_C");
		}
		$query = "UPDATE `banner` SET `image_name` = '$imagename' , `image_caption` = '$imagecaption', `active` = '$active', `update_date` = NOW(), `slider_type` = '$slidertype',`image_index` = '$files' WHERE `image_id` = '$imageid'";
		$result = mysqli_query($connection,$query);
		if (isset($result)) {
			header("LOCATION:viewbanner.php?update=success");
		} else {
			header("LOCATION:viewbanner.php?update=".mysqli_error($connection));
		}	
	} else {
    	$query = "SELECT * FROM `banner` where `image_id` ='$imageid'";
    	$result = mysqli_query($connection,$query);
    	while($row = mysqli_fetch_array($result)) {
        	$image =$row['image_index'];
    	}
		$originalpath = "bannerimages/original/";
    	$convertedpart ="bannerimages/convert/";
    	$imageindex = $image;
		$query = "UPDATE `banner` SET `image_name` = '$imagename' , `image_caption` = '$imagecaption', `active` = '$active', `update_date` = NOW(), `slider_type` = '$slidertype',`image_index` = '$imageindex' WHERE `image_id` = '$imageid'";
		$result = mysqli_query($connection,$query);
		if (isset($result)) {
			header("LOCATION:viewbanner.php?update=success");
		} else {
			header("LOCATION:viewbanner.php?update=".mysqli_error($connection));
		}
	}
} else{
	header("LOCATION:index.php?message=wrong button press");
}