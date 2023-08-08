<!DOCTYPE html>
<html lang="zxx">
<head>
	<?php include_once 'head.php'; ?>
</head>

<body>
	<?php include_once('header.php');?>
	<?php include_once('menu.php');?>
	
	<div class="page-head_agile_info_w3l"></div>
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
					<li>Courier Details</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- Terms of use-section -->
	<section class="terms-of-use">
		<!-- terms -->
		<div class="terms">
			<div class="container">
				<h3><b>PLEASE READ THE TERMS AND CONDITIONS CAREFULLY .</b></h3>
				<br>
				<h4>Courier Information</h4><br>
				<?php 
				include_once('connection.php');
				$select="SELECT * FROM courier";
				$result=mysqli_query($connection,$select) or die(mysqli_error($connection));
				$row=mysqli_num_rows($result);
				if($row)
				{
					$i = 0;
				 	while($str=mysqli_fetch_array($result))
				 	{ 
				 		$supplier_id = $str['courier_id'];
						$supplier_name = $str['courier_name'];
						$address = $str['courier_address'];
						$mobile_no = $str['phone_no'];
						$email_id = $str['email_id'];
				?>
				<ol start="1">
					<li>Courier Name :-<?php echo $supplier_name; ?></li>
					<li>Courier Address :-<?php echo $address; ?></li>
					<li>Courier Mo/No :-<?php echo $mobile_no; ?></li>
					<li>Courier Email Id :-<?php echo $email_id; ?></li>
				</ol>
				<?php
					echo "============================================";
					}
				}
				?>
			</div>
		</div>
		<!-- /terms -->
	</section>
	<?php include_once 'footer.php';?>
</body>
</html>