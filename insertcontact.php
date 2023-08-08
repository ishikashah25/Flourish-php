<?php
include_once 'connection.php';
if (isset($_POST['submit'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$phoneno=$_POST['phoneno'];
$message=$_POST['message'];
$insert ="INSERT INTO `contact`(`contact_name`, `email_id`, `phone_no`, `message`) VALUES ('$name','$email','$phoneno','$message')";
$query=mysqli_query($connection,$insert);
if (isset($query)) {
		header("LOCATION:contact.php?insert=success");
	}
}else
{
    header("LOCATION:index.php?");
}
?>