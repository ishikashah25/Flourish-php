<?php 
include_once 'connection.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
if ($username == "" || $password == "") {
	header("LOCATION:topheader.php?insert=empty");
} else {
	$query = "SELECT * FROM `login` WHERE `email_id` = '$username' AND `password` = '$password' ";
	$result = mysqli_query($connection,$query);
	$numofresult = mysqli_num_rows($result);
	if ($numofresult > 0) {
		session_start();
		$_SESSION['sessionid'] = $username;
		header("LOCATION:mydashboard.php?insert=success");
	} else {
		header("LOCATION:index.php?insert=notlogin");
	}
}
?>