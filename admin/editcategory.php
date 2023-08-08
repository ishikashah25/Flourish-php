<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
	header("LOCATION:index.php");
}
include_once 'connection.php';
$id = $_GET['category_id'];
$query = "SELECT * FROM `category` WHERE `category_id`='$id'";
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
	<form action="updatecategory.php" method="POST" class="signin-form">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<table class="table">
		<?php 
		while($row = mysqli_fetch_array($result)) {
			$id = $row['category_id'];
			$name = $row['category_name'];
			$description = $row['category_description'];
		}
		?>
		<tr>
			<td>category name</td>
			<td><input type="text" name="categoryname" value="<?php echo $name; ?>" placeholder="category name" autofocus /></td>
		</tr>
		<tr>
			<td>category description</td>
			<td><input type="text" name="categorydescription" value="<?php echo $description; ?>" placeholder="category description" /></td>
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