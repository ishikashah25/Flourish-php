<?php 
include_once 'connection.php';
$id = $_POST['id'];
$name = $_POST['subcategoryname'];
$description = $_POST['subcategorydescription'];
$query = "UPDATE `subcategory` SET `subcategory_name` = '$name' , `subcategory_description` = '$description' WHERE `subcategory_id` = '$id'";
$result = mysqli_query($connection,$query);
header("LOCATION:viewsubcategory.php?update=success");
?>
