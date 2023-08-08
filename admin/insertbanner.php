<?php
include_once 'connection.php';
if (isset($_POST['submit'])) {
	if ($_FILES['file']['name'] != "") {
		$files = time().".jpg";
		$filename_O = "T".$files;
		$filename_C = "TH".$files;
		$imagename = trim(mysqli_real_escape_string($connection, $_POST['imagename']));
		$imagecaption = trim(mysqli_real_escape_string($connection, $_POST['imagecaption']));
		$active = trim($_POST['active']);
		$slidertype = trim(mysqli_real_escape_string($connection, $_POST['slidertype']));
		$originalpath = "bannerimages/original/";
		$convertedpath = "bannerimages/convert/";
		move_uploaded_file($_FILES['file']['tmp_name'], $originalpath.$filename_O);
		if ($_POST['convert'] == "Y") {
			include_once 'SimpleImage.php';
			$image = new SimpleImage();
			$image->load($originalpath.$filename_O);
			$image->resize(1280,780);
			$image->save($convertedpath."$filename_C");
			$image = imagecreatefromjpeg($convertedpath."$filename_C");
			$destination = $convertedpath."$filename_C"; 
		} else{
			copy($n.$filename_O, $convertedpath."$filename_C");
		}
		$insert = "INSERT INTO `banner` (`image_name`,`image_caption`,`active`,`update_date`,`slider_type`,`image_index`) VALUES ('$imagename','$imagecaption','$active',NOW(),'$slidertype','$files')";
		$query = mysqli_query($connection,$insert);
		if (isset($query)) {
			header("LOCATION:viewbanner.php?insert=success");
		}	
	} else {
		echo "please select image...";
	}	
} else{
	header("LOCATION:index.php?message=wrong button press");
}
?>