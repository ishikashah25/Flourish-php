<!DOCTYPE html>
<php lang="zxx">

<head>
	<title>Flourish pure food</title>
	<!--/tags -->
	<?php include_once 'head.php'; ?>
</head>

<body>
<?php 
	include_once 'topheader.php';
	include_once('connection.php');
	include_once('header.php');
	?>
	<br/>
	<?php
	include_once('menu.php');
	$userid = $_SESSION['sessionid'];
	if(isset($_SESSION['sessionid']))
	{
	 	$sessionid = $_SESSION['sessionid'];
	}
?>
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
				<li>Checkout</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy">
	<div class="container">
		<!-- tittle heading -->
		
		<!-- //tittle heading -->
		<table align="center" cellpadding="5" cellspacing="0" >
		    <?php
		    if(isset($_GET['delete']) && $_GET['delete'] == "suc"){
		    ?>
		    	<tr align="center">
		        	<td class="suc" colspan="3">Your data is successfully deleted..!!</td>
		      	</tr>
		    <?php 
		    }
		    else if(isset($_GET['update']) && $_GET['update'] == "suc"){
		    ?>
				<tr align="center">
		        	<td class="suc" colspan="3">Your data is successfully update..!!</td>
		      	</tr>
		    <?php 
		    }
		    ?>
		</table>
		<div class="checkout-right">
			<h4>Your shopping cart contains:
				<span>Products</span>
			</h4>
			<br/>
			<div class="table-responsive">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>
							<th>Product Image</th>
							<th>Quantity</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Total Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<?php
  				 		$seesion = "SELECT * FROM session WHERE session_key = '$sessionid'";
				   		$seres = mysqli_query($connection,$seesion) or die(mysqli_error());
				    	$row=mysqli_fetch_array($seres);
				  		$id = $row['session_id'];
				 		  $select="SELECT * FROM add_to_cart WHERE sessionkey = '$sessionid' AND active = 1";
				    	$result = mysqli_query($connection,$select) or die(mysqli_error());
				      $num = mysqli_num_rows($result);
				    	if($num == 0){
				    ?>
				    <tr>
				    	<td colspan="8" align="center">Your Shopping Cart is Empty. &nbsp; &nbsp;
				      	<a href="index.php"> Continue Shopping </a> </td>
				    </tr>
					<?php
				   		} else { 
			   			$i = 0;
			    		$totalprice = 0;
			    		$subtotal = 0;
			    	   	while($row = mysqli_fetch_array($result)){
		    		   	$i++; 
				      	$cid=$row['cart_id'];
				      	$productid=$row['product_id'];
				      	$productimg=$row['product_image'];
				      	$ProductName = $row['product_name'];
				      	$ProductPrice = $row['product_price'];
				      	$qty=$row['product_quantity'];
				    ?>
					<tbody>
						<tr class="rem1">
							<td class="invert"><?php echo $cid; ?></td>
							<td class="invert-image">
								<a href="single2.php">
									<img src="admin/productimages/convert/TH<?php echo $productimg; ?>" alt=" " class="img-responsive">
								</a>
							</td>
							<td class="invert">
								<?php echo $qty; ?>
							</td>
							<td class="invert"><?php echo $ProductName; ?></td>
							<td class="invert">&#8377;<?php echo $ProductPrice; ?></td>
							<td class="invert">
								&#8377;<?php  
									if($qty){ 
										$subtotal = $qty * $ProductPrice;
							          	$totalprice = $totalprice+$subtotal;  
							        } else { 
							        	$subtotal = $ProductPrice;
							          	$totalprice = $totalprice+$subtotal;
							        }
							        echo  $subtotal; 
							    ?>
							</td>
							<td class="invert">
								<a href="javascript:void(0);" onClick="return confirmdata('<?php echo $cid;?>');">
									<div class="rem">
										<div class="close1"></div>
									</div>
								</a> 
							</td>
						</tr>
					</tbody>
					<?php 
					   }
					?>
				</table>
				<br/>
				<table align="right" border="1px solid black" width="50%">
					<tr colspan="5" align="center">
						<td>Sub Total :</td>
						<td>&#8377;<?php if($num == 0){ echo '0'; } else { echo $totalprice; }?></td>
					</tr>
					<tr colspan="7" align="center">
						<td>Grand Total :</td>
						<td>&#8377;<?php echo $totalprice; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<?php } ?>
		<?php if($num != 0) { ?>
		<div class="checkout-left">
			<div class="address_form_agile">
				<h4>Add Billing Details</h4>
				<br/>
				<form action="insertbilling.php" method="post" class="creditly-card-form agileinfo_form">
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls">
									<input class="billing-address-name" type="text" name="name" placeholder="Full Name" pattern="[a-zA-Z'-'\s]*" title="Only Character" required="">
									
									<input class="billing-address-name" type="text" name="address" placeholder="Address" required="">

									<input class="billing-address-name" type="text" name="city" placeholder="City" required="">

									<input class="billing-address-name" type="text" name="state" placeholder="State" required="">

									<input class="billing-address-name" type="text" name="country" placeholder="Country" required="">

									<input class="billing-address-name" type="number" name="pincode" placeholder="Pincode" required="">

								</div>
								<div class="w3_agileits_card_number_grids">
									<div class="w3_agileits_card_number_grid_left">
										<div class="controls">
											<input type="text" id="phone" pattern="[6789][0-9]{9}" placeholder="Mobile Number"  title="Enter correct Mobile Number" maxlength="10" minlength="10" name="phone_number" required=""  >
										</div>
									</div>
									<input class="billing-address-name" type="email" name="email_id" placeholder="E-mail" required="">
								</div>
								<div class="clear"> </div>
							</div>
							<input type="submit" name="billing_submite" value="Make A Payment" class="button">
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
		&nbsp;
		<form>
			<input type="checkbox" name="shippingform" onclick="showMe('div1')" checked="checked">Shipping Address Same As Billing
		</form>
		<div class="checkout-left" id="div1" style="display:none">
			<div class="address_form_agile">
				<h4>Add Shipping Details</h4>
				<form action="insertbilling.php" method="post" class="creditly-card-form agileinfo_form">
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls">
									<input class="billing-address-name" type="text" name="shipping_name" placeholder="Full Name" required="">
									
									<input class="billing-address-name" type="text" name="shipping_address" placeholder="Address" required="">

									<input class="billing-address-name" type="text" name="shipping_city" placeholder="City" required="">

									<input class="billing-address-name" type="text" name="shipping_state" placeholder="State" required="">

									<input class="billing-address-name" type="text" name="shipping_country" placeholder="Country" required="">

									<input class="billing-address-name" type="text" name="shipping_pincode" placeholder="Pincode" required="">

								</div>
								<div class="w3_agileits_card_number_grids">
									<div class="w3_agileits_card_number_grid_left">
										<div class="controls">
											<input type="text" placeholder="Mobile Number" name="shipping_phone_number" required="">
										</div>
									</div>
									<input class="billing-address-name" type="text" name="shipping_email_id" placeholder="E-mail" required="">
								</div>
								<div class="clear"> </div>
							</div>
							<input type="submit" name="shipping_submit" value="Make A Payment" class="button">
						</div>
					</div>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php } ?>
	</div>
</div>
<!-- //checkout page -->
<?php if($num != 0) { ?>
<?php include_once 'footer.php';?>
<?php } ?>
</body>
</html>
<script>
  function confirmdata(id)
  {
    var ans = confirm('Are you sure want to delete ?');
    if(ans == false) {
      return false;
    } else {
      window.location = 'deletecart.php?cart_id='+id; 
    }
  }
</script>
<script type="text/javascript">
	function showMe (box) {
        var chboxs = document.getElementsByName("shippingform");
        var vis = "none";
        for(var i=0;i<chboxs.length;i++) { 
            if(chboxs[i].checked){
             
                break;
            }else{
            vis = "block";
            }
        }
        document.getElementById(box).style.display = vis;
    }
</script>