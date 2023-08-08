<?php
include_once('connection.php');
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$special_price = $_POST['special_price'];
$product_image = $_POST['product_image'];
$qty = $_POST['quantity'];
session_start();

$registration_id = $_SESSION['sessionid'];

if(isset($_SESSION['sessionid']))
{
 	$sessionid = $_SESSION['sessionid'];
}
else{
 	header('Location:index.php?message="success"');
}
if (isset($_POST['submit'])) {
	if (isset($registration_id)) {
		$active = "1";
		$getustid = "SELECT `registration_id` from registration where email_id = '".$registration_id."'";
		$result = mysqli_query($connection,$getustid) or die(mysqli_error($connection)); 
		$rowcustid = mysqli_fetch_array($result);
		$regid = $rowcustid['registration_id'];

		$insert = "INSERT into session(session_key,registration_id,product_id) values ('$sessionid','$regid','$product_id')";
		$result = mysqli_query($connection,$insert) or die(mysqli_error($connection));
		$select = "SELECT cart_id,product_id,product_quantity from add_to_cart where sessionkey = '".$sessionid."' AND product_id = '".$product_id."' AND active = '".$active."' ";
		$res1 = mysqli_query($connection,$select) or die(mysqli_error($connection));

		$row = mysqli_fetch_all($res1, MYSQLI_ASSOC);
		
		if(count($row)) {
			$quantity = $row[0]['product_quantity'] + $qty;
			$update = "UPDATE add_to_cart SET product_quantity = '".$quantity."' where cart_id='".$row[0]['cart_id']."'";
			$res = mysqli_query($connection,$update) or die(mysqli_error($connection));
		}
		else
		{
			$ins = "insert into add_to_cart(product_id,product_image,product_name,product_quantity,product_price,registration_id,sessionkey) values ('$product_id','$product_image','$product_name','$qty','$special_price','$regid','$sessionid')";
			$res = mysqli_query($connection,$ins) or die(mysqli_error($connection));
		}
		
		header('Location:product.php?product_id='.$product_id);
	} else {
		header('Location:index.php?message="You Are Not Logged In"');
	}
}
if (isset($_POST['buynow'])) {
	if (isset($registration_id)) {
		$active = "1";
		$getustid = "SELECT `registration_id` from registration where email_id = '".$registration_id."'";
		$result = mysqli_query($connection,$getustid) or die(mysqli_error($connection)); 
		$rowcustid = mysqli_fetch_array($result);
		$regid = $rowcustid['registration_id'];

		$insert = "INSERT into session(session_key,registration_id,product_id) values ('$sessionid','$regid','$product_id')";
		$result = mysqli_query($connection,$insert) or die(mysqli_error($connection));
		$select = "SELECT cart_id,product_id,product_quantity from add_to_cart where sessionkey = '".$sessionid."' AND product_id = '".$product_id."' AND active = '".$active."' ";
		$res1 = mysqli_query($connection,$select) or die(mysqli_error($connection));

		$row = mysqli_fetch_all($res1, MYSQLI_ASSOC);
		
		if(count($row)) {
			$quantity = $row[0]['product_quantity'] + $qty;
			$update = "UPDATE add_to_cart SET product_quantity = '".$quantity."' where cart_id='".$row[0]['cart_id']."'";
			$res = mysqli_query($connection,$update) or die(mysqli_error($connection));
		}
		else
		{
			$ins = "insert into add_to_cart(product_id,product_image,product_name,product_quantity,product_price,registration_id,sessionkey) values ('$product_id','$product_image','$product_name','$qty','$special_price','$regid','$sessionid')";
			$res = mysqli_query($connection,$ins) or die(mysqli_error($connection));
		}
		header('Location:viewcart.php');
	} else {
		header('Location:index.php?message="You Are Not Logged In"');
	}
}