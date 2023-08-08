<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<!-- //tittle heading -->
		<div class="row">
			<!-- product left -->
			<div class="agileinfo-ads-display col-lg-12">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
						<h3 class="heading-tittle text-center font-italic">Our New Products</h3>
						<div class="row">
							<?php
								include_once 'connection.php';
								$query = "SELECT * FROM `product` WHERE new_arrival='Y'";
								$result = mysqli_query($connection,$query);
								$row = mysqli_num_rows($result);
								if($row) {
									$i=0;
									while($str=mysqli_fetch_array($result)) {
										$id = $str['product_id'];
										$name = $str['product_name'];
										$price = $str['product_price'];
										$speprice = $str['product_special_price'];
										$image = $str['product_image'];
							?>
							<div class="col-md-4 product-men mt-5">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item text-center">
										<img src="admin/productimages/convert/TH<?php echo $image;?>" width='250px' height='250px' alt="">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="product.php?product_id=<?php echo $id; ?>" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
									</div>
									<div class="item-info-product text-center border-top mt-4">
										<h4 class="pt-1">
											<a href="product.php"><?php echo $name;?></a>
										</h4>
										<div class="info-product-price my-2">
											<span class="item_price">&#8377;<?php echo $speprice;?></span>
											<del><?php echo $price;?></del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											<form action="insercart.php" method="post">
												<fieldset>
													<input type="hidden" name="product_id" value="<?php echo $id;?>" />
													<input type="hidden" name="product_name" value="<?php echo $name;?>" />
													<input type="hidden" name="product_price" value="<?php echo $price;?>" />
													<input type="hidden" name="product_special_price" value="<?php echo $speprice;?>" />
													<input type="hidden" name="product_image" value="<?php echo $image;?>" />
													<input type="hidden" name="qty" value="1" />
													<a href="product.php?product_id=<?php echo $id;?>">View Product</a>
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
							<?php 
							} 
						}
					?>
						</div>
					</div>
					<!-- //first section -->
					<!-- second section -->
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
						<h3 class="heading-tittle text-center font-italic">Popular Product</h3>
						<div class="row">
							<?php
								include_once 'connection.php';
								$query = "SELECT * FROM `product` WHERE popular_product='Y'";
								$result = mysqli_query($connection,$query);
								$row = mysqli_num_rows($result);
								if($row) {
									$i=0;
									while($str=mysqli_fetch_array($result)) {
										$id = $str['product_id'];
										$name = $str['product_name'];
										$price = $str['product_price'];
										$speprice = $str['product_special_price'];
										$image = $str['product_image'];
							?>
							<div class="col-md-4 product-men mt-5">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item text-center">
										<img src="admin/productimages/convert/TH<?php echo $image;?>" width='250px' height='250px' alt="">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="product.php" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
									</div>
									<div class="item-info-product text-center border-top mt-4">
										<h4 class="pt-1">
											<a href="product.php"><?php echo $name;?></a>
										</h4>
										<div class="info-product-price my-2">
											<span class="item_price"><?php echo $speprice;?>Rs</span>
											<del><?php echo $price;?>Rs</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											<form action="insertcart.php" method="post">
												<fieldset>
													<input type="hidden" name="product_id" value="<?php echo $id;?>" />
													<input type="hidden" name="product_name" value="<?php echo $name;?>" />
													<input type="hidden" name="product_price" value="<?php echo $price;?>" />
													<input type="hidden" name="product_special_price" value="<?php echo $speprice;?>" />
													<input type="hidden" name="product_image" value="<?php echo $image;?>" />
													<input type="hidden" name="qty" value="1" />
													<a href="product.php?product_id=<?php echo $id;?>">View Product</a>
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
							<?php
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //top products -->