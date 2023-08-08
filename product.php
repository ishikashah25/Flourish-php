<html>
<head>
	<title>Flourish Pure Food</title>
	<?php include_once 'head.php'; ?>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(function(){
	    	var minimized_elements = $('p.minimize');
	    	minimized_elements.each(function(){    
	        	var t = $(this).text();        
	        	if(t.length < 100) return;
	        
	       	 jQuery(this).html(
	        	    t.slice(0,100)+'<span>... </span><a href="#" class="more">More</a>'+
	            	'<span style="display:none;">'+ t.slice(100,t.length)+' <a href="#" class="less">Less</a></span>');
	      		}); 
	    	jQuery('a.more', minimized_elements).click(function(event){
	       	 event.preventDefault();
	        	jQuery(this).hide().prev().hide();
	        	jQuery(this).next().show();        
	   	 });
	    	jQuery('a.less', minimized_elements).click(function(event){
	        	event.preventDefault();
	        	jQuery(this).parent().hide().prev().show().prev().show();    
	    	});
	   	});
	</script>
</head>
<body>
<?php include_once 'topheader.php';?>
<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Product Details Page</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>P</span>roduct 
				<span>D</span>etails
				<span>P</span>age</h3>
			<!-- //tittle heading -->
			<?php $product_id=$_GET['product_id']; ?>
			<table align="center" cellpadding="2" cellspacing="0" >
			    <?php
			    if(isset($_GET['product_id']) && $_GET['product_id'] == $product_id){
			    ?>
			      <tr align="center">
			        <td class="suc" colspan="2"><b>Product Added successfully</b></td>
			      </tr>
			      <?php 
			    	}
			    	?>
			</table>
			<br/>
			<div class="row">
				<?php 
					$product_id=$_GET['product_id'];
					include_once('connection.php');
					$select = "SELECT * from product where product_id= '$product_id' ";
					$result=mysqli_query($connection,$select);
					$row=mysqli_num_rows($result);
					while ($row=mysqli_fetch_assoc($result)) {
					$id = $row['product_id'];
					$product_name = $row['product_name'];
					$sku = $row['product_sku'];
					$image = $row['product_image'];
					$description = $row['product_description'];
					$price = $row['product_price'];
					$special_price = $row['product_special_price'];
					$product_description = $row['product_description'];
				?>
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li style="list-style-type:none" data-thumb="images/si1.jpg">
									<div class="thumb-image">
										<img src="admin/productimages/convert/TH<?php echo $image; ?>"data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $product_name; ?></h3>
					<h6 class="mb-3">SKU:- <?php echo $sku; ?></h6>
					<p class="mb-3">
						<span class="item_price">&#8377;<?php echo $special_price; ?></span>
						<del class="mx-2 font-weight-light">&#8377;<?php echo $price; ?></del>
					</p>
					<h6 class="minimize">Product Details:-<?php echo $product_description; ?></h6>
					<h6 class="my-sm-4 my-3">
						<i class="fas fa-retweet mr-3"></i>Cash on delivery available on this product.
					</h6>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="insertcart.php" method="post">
								<li style="list-style-type:none">Quantity : &nbsp;
									<select name="quantity" class="form-control">
						      			<option value="1">1</option>
						      			<option value="2">2</option>
						   			    <option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
						                <option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
						            </select>
						        </li>
						        <br/>
								<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<fieldset>
										<input type="hidden" name="product_id" value="<?php echo $id; ?>" />
										<input type="hidden" name="product_name" value="<?php echo $product_name; ?>" />
										<input type="hidden" name="special_price" value="<?php echo $special_price; ?>" />
										<input type="hidden" name="product_image" value="<?php echo $image; ?>" />
										<input type="hidden" name="return" value=" ">
										<input type="hidden" name="cancel_return" value=" ">
										<input type="submit" name="submit" value="Add to cart" class="button"><br/><br/>
										<input type="submit" name="buynow" value="Buy Now" class="button">
									</fieldset>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php include_once 'footer.php'; ?>
</body>
</html>
