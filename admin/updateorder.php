<?php
include_once('connection.php');
$id = $_POST['order_id'];
$order_status = $_POST['order_status'];
$user_id = $_POST['user_id'];
$courier_name = $_POST['courier_name'];

$updatecat = "UPDATE `ordertbl` SET order_status= '$order_status', courier_name = '$courier_name' WHERE order_id = '$id'";		
$resultcat = mysqli_query($connection,$updatecat) or die(mysqli_error($connection));
header('Location:vieworder.php?update=suc');
?>