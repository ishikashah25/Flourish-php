<?php
include_once('connection.php');
$name=$_POST['name'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$country=$_POST['country'];
$pincode=$_POST['pincode'];
$phone_number=$_POST['phone_number'];
$email_id=$_POST['email_id'];

session_start();
$username = $_SESSION['sessionid']; 
$getustid = "select registration_id from `registration` where email_id = '".$username."'";
$result = mysqli_query($connection,$getustid) or die(mysqli_error($connection)); 
$rowcustid = mysqli_fetch_array($result);
$rid = $rowcustid['registration_id']; 
$insert1="INSERT INTO `billing` (registration_id,name,address,city,state,country,pincode,phone_no,email_id)
values ('$rid','$name','$address','$city','$state','$country','$pincode','$phone_number','$username')";
$result=mysqli_query($connection,$insert1) or die(mysqli_error($connection));

if (isset($_POST['shipping_submit'])) {
	$shipping_name=$_POST['shipping_name'];
	$shipping_address=$_POST['shipping_address'];
	$shipping_city=$_POST['shipping_city'];
	$shipping_state=$_POST['shipping_state'];
	$shipping_country=$_POST['shipping_country'];
	$shipping_pincode=$_POST['shipping_pincode'];
	$shipping_phone_number=$_POST['shipping_phone_number'];
	$shipping_email_id=$_POST['shipping_email_id'];

	$insert="INSERT INTO shipping (registration_id,shipping_name, shipping_address, shipping_city, shipping_state, shipping_country, pincode, phone_number, email_id)
	values ('$rid','$shipping_name','$shipping_address','$shipping_city','$shipping_state','$shipping_country','$shipping_pincode','$shipping_phone_number','$shipping_email_id')";
	$result=mysqli_query($connection,$insert);
}

header('location:payment.php');
?>