<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
	header("LOCATION:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include_once'head.php'; ?>
<style>
	.table{
		width: 80%;
		margin-top: 20px;
		word-spacing: 5px;
		border: 2px solid black;
		padding: 15px;
	}
	.button{
		border: 2px solid black;
	}
	input{
		width: 50%;
		height: 40%;
		border: 2px solid black;

	}
	textarea{
		width: 50%;
		height: 40%;
	}
</style>
</head>
<body>
	<?php include_once'header.php'; ?>
	<form action="insertcourier.php" method="POST" class="signin-form">
	<table class="table">
		<tr>
			<td>Courier name</td>
			<td><input type="text" name="couriername" placeholder="Courier Name" required="" autofocus /></td>
		</tr>
		<tr>
			<td>Courier Address</td>
			<td><textarea name="courieraddress" placeholder="Courier Address" required=""></textarea></td>
		</tr>
		<tr>
			<td>Phone No</td>
			<td><input type="number" name="phoneno" placeholder="Phone No" required="" /></td>
		</tr>
		<tr>
			<td>Email Id</td>
			<td><input type="text" name="emailid" placeholder="email id" required="" /></td>
		</tr>
		<tr>
			<td><center><input type="submit" name="submit" class="button"></center></td>
			<td><button class="button" type="button" onclick="history.back();">Back</button></td>
		</tr>
	</table>	
	</form>
	<?php include_once'footer.php'; ?>
</body>
</html>