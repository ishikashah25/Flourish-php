<?php 
include_once 'connection.php' ;
$id = $_GET['image_id'];
$delete = "DELETE FROM `banner` WHERE image_id='$id'";
$query = mysqli_query($connection,$delete);
header("LOCATION:viewbanner.php?delete=success");