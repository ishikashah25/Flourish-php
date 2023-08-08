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
	<form action="insertcategory.php" method="POST" class="signin-form">
	<table class="table">
		<tr>
			<td>category name</td>
			<td><input type="text" name="categoryname" placeholder="category name" required="" autofocus /></td>
		</tr>
		<tr>
			<td>category description</td>
			<td><textarea name="categorydescription" placeholder="category description" required=""></textarea></td>
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