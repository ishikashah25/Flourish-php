<?php
include_once 'connection.php';
if (isset($_POST['submit'])) {
	$couriername = $_POST['couriername'];
	$courieraddress = $_POST['courieraddress'];
	$phoneno = $_POST['phoneno'];
	$emailid = $_POST['emailid'];
	$query = mysqli_query($connection,"INSERT INTO `courier` (`courier_name`,`courier_address`,`phone_no`,`email_id`) VALUES ('$couriername','$courieraddress','$phoneno','$emailid')");
	if (isset($query)) {
		header("LOCATION:viewcourier.php?insert=success");
	}
} else{
	header("LOCATION:index.php?message=wrong button press");
}
?>