<?php 
include_once 'connection.php' ;
$id = $_GET['contact_id'];
$delete = "DELETE FROM `contact` WHERE contact_id='$id'";
$query = mysqli_query($connection,$delete);
header("LOCATION:viewcontact.php?delete=success");