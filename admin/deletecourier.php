<?php 
include_once 'connection.php' ;
$id = $_GET['courier_id'];
$delete = "DELETE FROM `courier` WHERE courier_id='$id'";
$query = mysqli_query($connection,$delete);
header("LOCATION:viewcourier.php?delete=success");