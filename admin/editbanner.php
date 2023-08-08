<?php
session_start();
if (!isset($_SESSION['adminlogin'])) {
	header("LOCATION:index.php");
}
include_once 'connection.php';
$id = $_GET['image_id'];
$query = "SELECT * FROM `banner` WHERE `image_id`='$id'";
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
	<form action="updatebanner.php" method="POST" class="signin-form" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<table class="table">
		<?php 
		while($row = mysqli_fetch_array($result)) {
			$name = $row['image_name'];
			$caption = $row['image_caption'];
			$active = $row['active'];
			$updatedate = $row['update_date'];
			$slidertype = $row['slider_type'];
			$image = $row['image_index'];
		}
		$originalpath = "bannerimages/original/";
		$convertedpath = "bannerimages/convert/";
		?>
		<tr>
			<td>Image name</td>
			<td><input type="text" name="imagename" value="<?php echo $name; ?>" placeholder="Image name" required="" autofocus /></td>
		</tr>
		<tr>
			<td>Image caption</td>
			<td><input type="text" name="imagecaption" value="<?php echo $caption; ?>" placeholder="Image caption" required=""/></td>
		</tr>
		<tr>
			<td>Active</td>
			<td><select name="active">
				<option value="Y">Yes</option>
				<option value="N">No</option>
			</select></td>
		</tr>
		<tr>
			<td>Update Date</td>
			<td><input type="text" name="updatedate" value="<?php echo $updatedate; ?>" placeholder="updatedate" required=""/></td>
		</tr>
		<tr>
			<td>slider Type</td>
			<td><input type="text" name="slidertype" value="<?php echo $slidertype; ?>" placeholder="slider type" required=""/></td>
		</tr>
		<tr>
			<td>convert</td>
			<td><select name="convert">
				<option value="Y">Yes</option>
				<option value="N">No</option>
			</select></td>
		</tr>
		<tr>
			<td>Image Index</td>
			<td><input type="file" name="file" id="file"><img src="<?php echo $convertedpath."TH". $image ?>" width="100" height="75"></td>
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