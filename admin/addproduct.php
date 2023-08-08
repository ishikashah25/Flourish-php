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
	<form action="insertproduct.php" method="POST" class="signin-form" enctype="multipart/form-data">
	<table class="table" border="1">
		<tr>
			<td>Select SubCategory</td>
			<td>
				<select name="subcategory_id">
					<?php
						$select = "SELECT * FROM `subcategory`";
						$result = mysqli_query($connection,$select) or die(mysqli_error());
						while($row = mysqli_fetch_array($result)){
							$subcategory_id = $row['subcategory_id'];
							$name = $row['subcategory_name'];	
					?>
					<option value="<?php echo $subcategory_id; ?>"><?php echo $name; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Product name</td>
			<td><input type="text" name="productname" placeholder="product name" required="" autofocus /></td>
		</tr>
		<tr>
			<td>Product description</td>
			<td><textarea name="productdescription" placeholder="product description" required=""></textarea></td>
		</tr>
		<tr>
			<td>Product Price</td>
			<td><input type="number" name="productprice" placeholder="product price" required=""/></td>
		</tr>
		<tr>
			<td>Product Special Price</td>
			<td><input type="number" name="productspecialprice" placeholder="product special price"/></td>
		</tr>
		<tr>
			<td>Active</td>
			<td><select name="active">
				<option value="Y">Yes</option>
				<option value="N">No</option>
			</select></td>
		</tr>
		<tr>
			<td>Product SKU</td>
			<td><input type="text" name="productsku" placeholder="product stock keep unit" required=""/></td>
		</tr>
		<tr>
			<td>convert</td>
			<td><select name="convert">
				<option value="Y">Yes</option>
				<option value="N">No</option>
			</select></td>
		</tr>
		<tr>
			<td>Product Image</td>
			<td><input type="file" name="file" id = "file"></td>
		</tr>
		<tr>
			<td>Product Quantity</td>
			<td><input type="number" name="productquantity" placeholder="product quantity" required=""/></td>
		</tr>
		<tr>
			<td>Popular Product</td>
			<td><select name="popularproduct">
				<option value="Y">Yes</option>
				<option value="N">No</option>
			</select></td>
		</tr>
		<tr>
			<td>New Arrival</td>
			<td><select name="newarrival"> 
				<option value="Y">Yes</option>
				<option value="N">No</option>
			</select></td>
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