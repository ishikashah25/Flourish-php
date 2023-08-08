<?php
include_once('connection.php');
$order_id=$_GET['order_id'];
$updatecat = "UPDATE `ordertbl` set order_status= 'Cancelled' where order_id = '$order_id'";
$resultcat = mysqli_query($connection,$updatecat) or die(mysqli_error($connection));
header('Location:vieworder.php?cancel=suc');
?>