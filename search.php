<!DOCTYPE html>
<html>
<head>
	<title>Flourish pure food</title>
	<!--/tags -->
	<?php include_once 'head.php'; ?>
</head>
<body>
<?php 
	include_once('connection.php');
	include_once 'topheader.php';
	include_once('header.php');
	include_once('menu.php');
?>
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
	<div class="container">
		<!-- <h3>Search Product List</h3> -->
	</div>
</div>
<div class="row">
		<!-- product left -->

<div class="agileinfo-ads-display col-lg-12">
<div class="wrapper">
	<div class="product-sec1 px-sm-4 px-3 py-sm-5 py-5 mb-4">
		<h3 class="text-center">Search Product List</h3>
		<div class="clearfix"></div>
		<div class="row">
			<?php 
			include_once('connection.php');
			$search = $_POST['search']; 
			$select = "SELECT * from `product` where (`product_name` LIKE '%".$search."%') ";
			$result=mysqli_query($connection,$select);
			$row=mysqli_num_rows($result);
			while ($row=mysqli_fetch_assoc($result)) {
				$id=$row['product_id'];
				$product_name = $row['product_name'];
				$product_image=$row['product_image'];
				$description=$row['product_description'];
				$price = $row['product_price'];
				$special_price=$row['product_special_price'];
			?>
			<div class="col-md-4 product-men mt-5">
				<div class="men-pro-item simpleCart_shelfItem">
					<div class="men-thumb-item text-center">
						<img src="admin/productimages/convert/TH<?php echo $product_image; ?>" width='250px'; height='250px'; alt="">
						<div class="men-cart-pro">
							<div class="inner-men-cart-pro">
								<a href="product.php?product_id=<?php echo $id; ?>" class="link-product-add-cart">Quick View</a>
							</div>
						</div>
					</div>
					<div class="item-info-product text-center border-top mt-4">
						<h4 class="pt-1">
							<a href="product.php"><?php echo $product_name; ?></a>
						</h4>
						<div class="info-product-price my-2">
							<span class="item_price"><?php echo $special_price; ?> Rs.</span>
							<del><?php echo $price; ?> Rs</del>
						</div>
						<div class="snipcart-details top_brand_home_details item_add product-item hvr-outline-out">
							<form action="insertcart.php" method="post">
								<fieldset>
									<input type="hidden" name="product_id" value="<?php echo $id; ?>" />
								   <input type="hidden" name="product_name" value="<?php echo $product_name; ?>" />
								   <input type="hidden" name="special_price" value="<?php echo $special_price; ?>" />
								   <input type="hidden" name="product_image" value="<?php echo $product_image; ?>" />
								   <input type="hidden" name="quantity" value="1" />
								   <input type="submit" name="submit" value="Add to cart" class="button" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>	
</div>
</div>
<?php include_once('footer.php');?>
</body>
</html>
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //js -->
<script src="js/responsiveslides.min.js"></script>
<script>
		// You can also use "$(window).load(function() {"
		$(function () {
		 // Slideshow 4
		$("#slider3").responsiveSlides({
			auto: true,
			pager: true,
			nav: false,
			speed: 500,
			namespace: "callbacks",
			before: function () {
		$('.events').append("<li>before event fired.</li>");
		},
		after: function () {
			$('.events').append("<li>after event fired.</li>");
			}
			});
		});
</script>
