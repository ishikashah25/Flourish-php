<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Flourish Pure Food</title>
<?php include_once 'head.php'; ?>
</head>
<body>
<?php include_once 'topheader.php'; ?>
<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<!-- banner-2 -->
<div class="page-head_agile_info_w3l page-head_agile_info_w3l-2">
</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<?php 
			include_once('connection.php');
			$subcategoryname=$_GET['subcategory_name'];
			$subcategoryid=$_GET['subcategory_id']; 
			$select = "SELECT * FROM category";
			$result=mysqli_query($connection,$select);
			while ($row=mysqli_fetch_assoc($result)) {
			$id=$row['category_id'];
			$name=$row['category_name'];
		?>
		<?php
			$select1 = "SELECT * FROM subcategory WHERE category_id = '$id' ";
			$result1=mysqli_query($connection,$select1);
			while($row1=mysqli_fetch_assoc($result1))
			{
				$subcatname=$row1['subcategory_name']; 
		?>
		<?php } } ?>
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="index.php">Home</a>
					<i>|</i>
				</li>
				<li><?php echo $subcategoryname; ?></li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<!-- top Products -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
		<div class="ads-grid py-sm-5 py-4">
			<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
				<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
					<span style=" text-transform: uppercase;"><?php echo $subcategoryname; ?></span></h3>
				<!-- //tittle heading -->
				<div class="row">
					<!-- product left -->
					<div class="agileinfo-ads-display col-lg-12">
						<div class="wrapper">
							<!-- first section -->
							<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
								<div class="row">
									<?php 
									include_once('connection.php');
									$select = "SELECT * from product where subcategory_id= '$subcategoryid' ";
									$result=mysqli_query($connection,$select);
									$row=mysqli_num_rows($result);
									while ($row=mysqli_fetch_assoc($result)) {
									$id=$row['product_id'];
									$product_name = $row['product_name'];
									$image=$row['product_image'];
									$description=$row['product_description'];
									$price = $row['product_price'];
									$special_price=$row['product_special_price'];
								?>
									<div class="col-md-4 product-men">
										<div class="men-pro-item simpleCart_shelfItem">
											<div class="men-thumb-item text-center">
												<img src="admin/productimages/convert/TH<?php echo $image; ?>" alt="" height="200px" width="200px">
												<div class="men-cart-pro">
													<div class="inner-men-cart-pro">
														<a href="product.php?product_id=<?php echo $id; ?>" class="link-product-add-cart">Quick View</a>
													</div>
												</div>
											</div>
											<div class="item-info-product text-center border-top mt-4">
												<h4 class="pt-1">
													<a href="product.php?product_id=<?php echo $id; ?>"> <?php echo $product_name ?> </a>
												</h4>
												<div class="info-product-price my-2">
													<span class="item_price"> &#8377;<?php
													echo $special_price
													 ?></span>
													<del>&#8377;<?php echo $price; ?> </del>
												</div>
												<div class="snipcart-details top_brand_home_details item_add">
													<a href="product.php?product_id=<?php echo $id; ?>" class="link-product-add-cart">&nbsp; View Product &nbsp;</a>
												</div>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							<!-- //first section -->
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<?php include_once 'footer.php'; ?>	
</body>
</html>