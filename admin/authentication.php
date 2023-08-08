<?php 
include_once 'connection.php'; 
session_start();
if (isset($_SESSION['adminlogin'])) {
	header("LOCATION:home.php");
} else if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = mysqli_query($connection,"SELECT * FROM `login` WHERE email_id='$username' AND password='$password' AND type='admin' LIMIT 1");
	if ($query) {
		$result = mysqli_fetch_assoc($query);
		if ($result['email_id'] == $username && $result['password'] == $password) {
			$_SESSION['adminlogin'] = $result['login_id'];
			header("LOCATION:viewcategory.php?message=loginsuccessfully");
		} else {
			header("LOCATION:index.php?message=not valid username and password");
		}
	} else {
		header("LOCATION:index.php?message=check you details");
	}
} else {
	session_destroy();
	header("LOCATION:index.php?message=not authorization");
}
?>
