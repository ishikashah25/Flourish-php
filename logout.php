<?php 
session_start();
unset($_SESSION['username']);
unset($_SESSION['sessionid']);
header("LOCATION:index.php?message=LOGGED OUT SUCCESSFULLY");
?>