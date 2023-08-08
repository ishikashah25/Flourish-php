<?php 
include_once 'connection.php' ;
$cat_id = $_GET['category_id'];
$delete = "DELETE FROM `category` WHERE category_id='$cat_id'";
$query = mysqli_query($connection,$delete);
header("LOCATION:viewcategory.php?delete=success");