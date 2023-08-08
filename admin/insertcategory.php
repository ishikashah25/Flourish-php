<?php
include_once 'connection.php';
if (isset($_POST['submit'])) {
	$categoryname = $_POST['categoryname'];
	$categorydescription = $_POST['categorydescription'];
	$query = mysqli_query($connection,"INSERT INTO `category` (`category_name`,`category_description`) VALUES ('$categoryname','$categorydescription')");
	if (isset($query)) {
		header("LOCATION:viewcategory.php?insert=success");
	}
} else{
	header("LOCATION:index.php?message=wrong button press");
}
?>