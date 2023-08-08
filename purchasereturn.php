<?php
include_once('connection.php');
$order_id=$_GET['order_id'];

$select = "SELECT * FROM `ordertbl` WHERE order_id = '$order_id'";
$result = mysqli_query($connection,$select) or die(mysqli_error($connection));
while($row = mysqli_fetch_array($result)){
	$TotalItem = $row['TotalItem'];
	$TotalAmount = $row['total_amount'];
}

$insert = "INSERT INTO `return` ( `order_id`, `return_date`, `quantity`, `total_refunded_amount`) values('$order_id',now(),'$TotalItem','$TotalAmount')";	
$resultcat = mysqli_query($connection,$insert) or die(mysqli_error($connection));
$updatecat = "UPDATE `ordertbl` set order_status = 'Return' where order_id = '$order_id'";	
$resultcat = mysqli_query($connection,$updatecat) or die(mysqli_error($connection));
header('Location:vieworder.php?cancel=suc');
?>