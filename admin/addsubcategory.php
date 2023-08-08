<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
	header("LOCATION:index.php");
}
include_once 'connection.php';
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
	<form action="insertsubcategory.php" method="POST" class="signin-form">
	<table class="table" border="1">
		<tr>
			<td>Select Category id</td>
			<td>
				<select name="category_id">
					<?php
						$select = "SELECT * FROM `category`";
						$result = mysqli_query($connection,$select) or die(mysqli_error());
						while($row = mysqli_fetch_array($result)){
							$category_id = $row['category_id'];
							$name = $row['category_name'];	
					?>
					<option value="<?php echo $category_id; ?>"><?php echo $name; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Subcategory name</td>
			<td><input type="text" name="subcategoryname" placeholder="subcategory name" required="" autofocus /></td>
		</tr>
		<tr>
			<td>SubCategory description</td>
			<td><textarea name="subcategorydescription" placeholder="subcategory description" required=""></textarea></td>
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