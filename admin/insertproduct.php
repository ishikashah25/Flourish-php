<?php
include_once 'connection.php';
if (isset($_POST['submit'])) {
	if ($_FILES['file']['name'] != "") {
		$files = time().".jpg";
		$filename_O = "T".$files;
		$filename_C = "TH".$files;
		$productname = trim(mysqli_real_escape_string($connection, $_POST['productname']));
		$productdescription = trim(mysqli_real_escape_string($connection, $_POST['productdescription']));
		$productprice = trim(mysqli_real_escape_string($connection, $_POST['productprice']));
		$productspecialprice = trim(mysqli_real_escape_string($connection, $_POST['productspecialprice']));
		$active = trim($_POST['active']);
		$productsku = trim(mysqli_real_escape_string($connection, $_POST['productsku']));
		$productquantity = trim(mysqli_real_escape_string($connection, $_POST['productquantity']));
		$popularproduct = trim($_POST['popularproduct']);
		$newarrival = trim($_POST['newarrival']);
		$id = $_POST['subcategory_id'];
		$originalpath = "productimages/original/";
		$convertedpath = "productimages/convert/";
		move_uploaded_file($_FILES['file']['tmp_name'], $originalpath.$filename_O);
		if ($_POST['convert'] == "Y") {
			include_once 'SimpleImage.php';
			$image = new SimpleImage();
			$image->load($originalpath.$filename_O);
			$image->resize(1263,669);
			$image->save($convertedpath."$filename_C");
			$image = imagecreatefromjpeg($convertedpath."$filename_C");
			$destination = $convertedpath."$filename_C"; 
		} else{
			copy($n.$filename_O, $convertedpath."$filename_C");
		}
		$insert = "INSERT INTO `product` (`product_name`,`product_description`,`product_price`,`product_special_price`,`active`,`product_sku`,`product_image`,`product_quantity`,`popular_product`,`new_arrival`,`subcategory_id`) VALUES ('$productname','$productdescription','$productprice','$productspecialprice','$active','$productsku','$files','$productquantity','$popularproduct','$newarrival','$id')";
		$query = mysqli_query($connection,$insert);
		if (isset($query)) {
			header("LOCATION:viewproduct.php?insert=success");
		}	
	} else {
		echo "please select image...";
	}
} else{
	header("LOCATION:index.php?message=wrong button press");
}
?>