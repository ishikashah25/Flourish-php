<?php 
include_once 'connection.php';
$id = $_POST['id'];
$name = $_POST['couriername'];
$address = $_POST['courieraddress'];
$phoneno = $_POST['phoneno'];
$emailid = $_POST['emailid'];
$query = "UPDATE `courier` SET `courier_name` = '$name' , `courier_address` = '$address' , `phone_no` = '$phoneno' , `email_id` = '$emailid' WHERE `courier_id` = '$id'";
$result = mysqli_query($connection,$query);
header("LOCATION:viewcourier.php?update=success");
?>
