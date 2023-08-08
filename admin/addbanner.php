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
	<form action="insertbanner.php" method="POST" class="signin-form" enctype="multipart/form-data">
	<table class="table" border="1">
		<tr>
			<td>Image Name</td>
			<td><input type="text" name="imagename" placeholder="image name" required="" autofocus /></td>
		</tr>
		<tr>
			<td>Image Caption</td>
			<td><textarea name="imagecaption" placeholder="image caption" required=""></textarea></td>
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
			<td><input type="text" name="updatdate" placeholder="update date" required=""/></td>
		</tr>
		<tr>
			<td>Slider Type</td>
			<td><input type="text" name="slidertype" placeholder="Slider type" required=""/></td>
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
			<td><input type="file" name="file" id = "file"></td>
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