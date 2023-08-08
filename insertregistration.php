<?php 
include_once 'connection.php';
if (isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phonenumber = $_POST['phonenumber'];
	$emailid = $_POST['emailid'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$password = md5($_POST['password']);
	$confirmpassword = md5($_POST['confirmpassword']);
	$type = "customer";
	$result = mysqli_query($connection,"SELECT * FROM `registration` WHERE `email_id` ='$emailid' ");
	$count = mysqli_num_rows($result);
	if ($count > 0) {
		header("LOCATION:index.php?user email already used");
	} else {
		$insert = "INSERT INTO `registration`(`first_name`, `last_name`, `phone_no`, `email_id`, `password`, `confirm_password`, `address`, `city`, `state`, `country`) VALUES ('$firstname','$lastname','$phonenumber','$emailid','$password','$confirmpassword','$address','$city','$state','$country')";
	$query = mysqli_query($connection,$insert);
	$insertlog = "INSERT INTO `login`(`email_id`,`phone_no`,`password`,`type`) VALUES ('$emailid','$phonenumber','$password','$type' )";
	$querylog = mysqli_query($connection,$insertlog);
	if (isset($query)) {
		header("LOCATION:index.php?insert=success");
	}
}
} else{
	header("LOCATION:index.php?message=wrong button press");
}
