<?php
include_once 'connection.php';
if (isset($_POST['submit'])) {
	$productid = $_POST['id'];
	$productname = trim(mysqli_real_escape_string($connection, $_POST['productname']));
	$productdescription = trim(mysqli_real_escape_string($connection, $_POST['productdescription']));
	$productprice = trim(mysqli_real_escape_string($connection, $_POST['productprice']));
	$productspecialprice = trim(mysqli_real_escape_string($connection, $_POST['productspecialprice']));
	$active = trim($_POST['active']);
	$productsku = trim(mysqli_real_escape_string($connection, $_POST['productsku']));
	$productquantity = trim(mysqli_real_escape_string($connection, $_POST['productquantity']));
	$popularproduct = trim($_POST['popularproduct']);
	$newarrival = trim($_POST['newarrival']);
	//$id = $_POST['subcategory_id'];	
	if ($_FILES['file']['name'] != "") {
		$files = time().".jpg";
		$filename_O = "T".$files;
		$filename_C = "TH".$files;
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
		$query = "UPDATE `product` SET `product_name` = '$productname' , `product_description` = '$productdescription', `product_price` = '$productprice', `product_special_price` = '$productspecialprice',`active` = '$active', `product_sku` = '$productsku',`product_image` = '$files', `product_quantity` = '$productquantity', `popular_product` = '$popularproduct', `new_arrival` = '$newarrival' WHERE `product_id` = '$productid'";
		$result = mysqli_query($connection,$query);
		if (isset($result)) {
			header("LOCATION:viewproduct.php?update=success");
		} else {
			header("LOCATION:viewproduct.php?update=".mysqli_error($connection));
		}	
	} else {
		$query = "SELECT * FROM `product` WHERE `product_id`='$productid'";
		$result = mysqli_query($connection,$query);
		while($row = mysqli_fetch_array($result)) {
			$image = $row['product_image'];
		}
		$originalpath = "productimages/original/";
		$convertedpath = "productimages/convert/";
		$productimage = $image;
		$query = "UPDATE `product` SET `product_name` = '$productname' , `product_description` = '$productdescription', `product_price` = '$productprice', `product_special_price` = '$productspecialprice',`active` = '$active', `product_sku` = '$productsku',`product_image` = '$productimage', `product_quantity` = '$productquantity', `popular_product` = '$popularproduct', `new_arrival` = '$newarrival' WHERE `product_id` = '$productid'";
		$result = mysqli_query($connection,$query);
		if (isset($result)) {
			header("LOCATION:viewproduct.php?update=success");
		} else {
			header("LOCATION:viewproduct.php?update=".mysqli_error($connection));
		}
	}
} else{
	header("LOCATION:index.php?message=wrong button press");
}