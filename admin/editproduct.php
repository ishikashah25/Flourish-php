<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
	header("LOCATION:index.php");
}
include_once 'connection.php';
$id = $_GET['product_id'];
$query = "SELECT * FROM `product` WHERE `product_id`='$id'";
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
	<form action="updateproduct.php" method="POST" class="signin-form" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<table class="table">
		<?php 
		while($row = mysqli_fetch_array($result)) {
			$id = $row['subcategory_id'];
			$name = $row['product_name'];
			$description = $row['product_description'];
			$price = $row['product_price'];
			$special_price = $row['product_special_price'];
			$active = $row['active'];
			$sku = $row['product_sku'];
			$image = $row['product_image'];
			$quantity = $row['product_quantity'];
			$popular_product = $row['popular_product'];
			$newarrival = $row['new_arrival'];
		}
		$originalpath = "productimages/original/";
		$convertedpath = "productimages/convert/";
		?>
		<tr>
			<td>SubCategory</td>
			<td>
				<?php
					$select = "SELECT * FROM `subcategory` WHERE `subcategory_id` = '$id'";
					$result = mysqli_query($connection,$select) or die(mysqli_error());
					while($row1 = mysqli_fetch_array($result)){
						//$subcategory_id = $row1['subcategory_id'];
						$subcategory_name = $row1['subcategory_name'];	
				?>
					<input type="text" name="subcategory_id" value="<?php echo $subcategory_name; ?>" readonly/>
					<?php } ?>
			</td>
		</tr>
		<tr>
			<td>Product name</td>
			<td><input type="text" name="productname" value="<?php echo $name; ?>" placeholder="Product name" required="" autofocus /></td>
		</tr>
		<tr>
			<td>Product description</td>
			<td><input type="text" name="productdescription" value="<?php echo $description; ?>" placeholder="product description" required=""/></td>
		</tr>
		<tr>
			<td>Product Price</td>
			<td><input type="number" name="productprice" value="<?php echo $price; ?>" placeholder="product price" required=""/></td>
		</tr>
		<tr>
			<td>Product Special Price</td>
			<td><input type="number" name="productspecialprice" value="<?php echo $special_price; ?>" placeholder="product special price"/></td>
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
			<td><input type="text" name="productsku" value="<?php echo $sku; ?>" placeholder="product stock keep unit" required=""/></td>
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
			<td><input type="file" name="file" id="file"><img src="<?php echo $convertedpath."TH". $image ?>" width="100" height="75"></td>
		</tr>
		<tr>
			<td>Product Quantity</td>
			<td><input type="number" name="productquantity" value="<?php echo $quantity; ?>" placeholder="product quantity" required=""/></td>
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