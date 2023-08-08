<?php
include_once('connection.php');
$orderid=$_GET['order_id'];
$delete="DELETE FROM `ordertbl` WHERE `order_id`='$orderid' ";
$result=mysqli_query($connection,$delete);
header("LOCATION:vieworder.php?delete=suc");
?>