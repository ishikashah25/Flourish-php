<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Flourish Pure Food</title>
	<?php include_once 'head.php';?>
</head>

<body>
	<?php 
	include_once 'topheader.php';
	include_once 'header.php';
	include_once 'menu.php';
	?>
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Order Success</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<?php
			include_once('connection.php');
			$key=0;
			if(isset($_SESSION['sessionid']))
			{
				$key = $_SESSION['sessionid'];
			}
			$custemail = $_SESSION['sessionid'];
			$seesion = "SELECT * FROM billing WHERE email_id = '$custemail'";
			$seres = mysqli_query($connection,$seesion) or die(mysqli_error());
			$row=mysqli_fetch_array($seres);
			$name = $row['name'];
			if($custemail != "")
			{
				$select = "UPDATE `add_to_cart` SET `active` = 0 WHERE sessionkey = '$custemail'";
				$result=mysqli_query($connection,$select);
			}
		?>
		<div style="font-family:'Arial'; font-size: 44px;text-align: center;">
			<span>Visit us again <?php echo $name; ?> !</span>
			<li><a href="vieworder.php" style="float:center;">View Your Order Details</a></li>
		</div>
	</div>
</body>
</html>
<?php
include('footer.php');
?>