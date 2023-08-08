<?php 
include_once 'connection.php';
$id = $_POST['id'];
$name = $_POST['categoryname'];
$description = $_POST['categorydescription'];
$query = "UPDATE `category` SET `category_name` = '$name' , `category_description` = '$description' WHERE `category_id` = '$id'";
$result = mysqli_query($connection,$query);
header("LOCATION:viewcategory.php?update=success");
?>
