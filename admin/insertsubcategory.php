<?php
include_once 'connection.php';
if (isset($_POST['submit'])) {
	$categoryname = $_POST['subcategoryname'];
	$categorydescription = $_POST['subcategorydescription'];
	$id = $_POST['category_id'];
	$insert = "INSERT INTO `subcategory` (`subcategory_name`,`subcategory_description`,`category_id`) VALUES ('$categoryname','$categorydescription','$id')";
	/*echo "<pre>";
	print_r($insert);
	die();*/
	$query = mysqli_query($connection,$insert);
	if (isset($query)) {
		header("LOCATION:viewsubcategory.php?insert=success");
	}
} else{
	header("LOCATION:index.php?message=wrong button press");
}
?>