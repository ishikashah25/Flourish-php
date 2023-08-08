<?php
include_once('connection.php');
$orderid=$_GET['cart_id'];
$delete="DELETE from add_to_cart WHERE cart_id='$orderid' ";
$result=mysqli_query($connection,$delete);
header("LOCATION:viewcart.php?delete=suc");
?>