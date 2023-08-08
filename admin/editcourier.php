<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
	header("LOCATION:index.php");
}
include_once 'connection.php';
$id = $_GET['courier_id'];
$query = "SELECT * FROM `courier` WHERE `courier_id`='$id'";
$result = mysqli_query($connection,$query);
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
	<form action="updatecourier.php" method="POST" class="signin-form">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<table class="table">
		<?php 
		while($row = mysqli_fetch_array($result)) {
			$id = $row['courier_id'];
			$name = $row['courier_name'];
			$address = $row['courier_address'];
			$phoneno = $row['phone_no'];
			$emailid = $row['email_id'];
		}
		?>
		<tr>
			<td>Courier Name</td>
			<td><input type="text" name="couriername" value="<?php echo $name; ?>" placeholder="courier name" required="" autofocus /></td>
		</tr>
		<tr>
			<td>Courier Address</td>
			<td><input type="text" name="courieraddress" value="<?php echo $address; ?>" placeholder="courier address" required="" /></td>
		</tr>
		<tr>
			<td>Phone No</td>
			<td><input type="number" name="phoneno" value="<?php echo $phoneno; ?>" placeholder="Phone No" required="" /></td>
		</tr>
		<tr>
			<td>Email Address</td>
			<td><input type="text" name="emailid" value="<?php echo $emailid; ?>" placeholder="emailid" required="" /></td>
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