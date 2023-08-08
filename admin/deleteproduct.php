<?php 
include_once 'connection.php' ;
$id = $_GET['product_id'];
$delete = "DELETE FROM `product` WHERE product_id='$id'";
$query = mysqli_query($connection,$delete);
header("LOCATION:viewproduct.php?delete=success");