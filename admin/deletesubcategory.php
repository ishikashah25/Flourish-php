<?php 
include_once 'connection.php' ;
$cat_id = $_GET['subcategory_id'];
$delete = "DELETE FROM `subcategory` WHERE subcategory_id='$cat_id'";
$query = mysqli_query($connection,$delete);
header("LOCATION:viewsubcategory.php?delete=success");