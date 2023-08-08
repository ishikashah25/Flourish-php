<!DOCTYPE html>
<php lang="zxx">

<head>
  <title>Flourish Pure Food</title>
  <?php include_once('head.php'); ?>
  <style type="text/css">
    a:link {
      color: black;
    }
  </style>
</head>
<body>
<?php 
	include_once 'topheader.php';
	include_once('connection.php');
	include_once('header.php');
	include_once('menu.php');
	$userid = $_SESSION['sessionid'];
	if(isset($_SESSION['sessionid']))
	{
	 	$sessionid = $_SESSION['sessionid'];
	}
?>

<div class="row" style="margin-top: 10px; margin-left: 10px;">
	<div class="col-lg-3 col-md-3 col-sm-12">
      <ul class="list-group">
            <li class="list-group-item"><a class="nav-link active" href="mydashboard.php">My Account Details</a></li>
            <li class="list-group-item"><a class="nav-link" href="vieworder.php">My Order</a></li>
            <li class="list-group-item"><a class="nav-link" href="viewaddress.php">View Address</a></li>
      </ul>
  	</div>
  	<div class="col-lg-9 col-md-9 col-sm-12">
  		<table class="table table-bordered">
  			<thead>
  				<tr>
							<th>Order Number.</th>
							<th>Product Image</th>
							<th>Product Name</th>
							<th>Order Status</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Courier Name</th>
							<th>Date And Time</th>
							<th>Return Order</th>
							<th>Cancel Order</th>
						</tr>
  			</thead>
  			<tbody>
  			<?php
				  		$getustid = "SELECT registration_id FROM registration WHERE email_id = '".$_SESSION['sessionid']."'";
						$result = mysqli_query($connection,$getustid) or die(mysqli_error($connection)); 
						$rowcustid = mysqli_fetch_array($result);
						$regid = $rowcustid['registration_id'];

				 		$select = "SELECT A.`product_image`, A.`product_name`, A.`product_quantity`, A.`product_price`, A.`active`, POD.`order_id`, POD.`total_amount`, POD.`TotalItem`, POD.`date_time`,POD.`order_status`,POD.`courier_name`  FROM `add_to_cart` as A LEFT JOIN `ordertbl` AS POD ON A.`cart_id` = POD.`cart_id` WHERE A.`active` = 0 AND A.`registration_id` = '$regid'";
				    	$result = mysqli_query($connection,$select) or die(mysqli_error($connection));
				      	$num = mysqli_num_rows($result);
				    	if($num == 0){
			?>
  			
			<tr>
		    	<td colspan="10" align="center">Your Not Place any order. &nbsp; &nbsp;
		      	<a href="index.php" class="btn btn-primary"> Continue Shopping </a> </td>
		    </tr>
		    <?php
				   		} else { 
			   			$i = 0;
			    		$totalprice = 0;
			    		$subtotal = 0;
			    	   	while($row = mysqli_fetch_array($result)){
		    		   	$i++; 
				      	$order_id=$row['order_id'];
				      	$order_status=$row['order_status'];
				      	$product_image=$row['product_image'];
				      	$product_name=$row['product_name'];
				      	$quantity = $row['product_quantity'];
				      	$price = $row['product_price'];
				      	$dateandtime=$row['date_time'];
				      	$TotalAmount = $row['total_amount'];
				      	$TotalItem = $row['TotalItem'];
				      	$courier_name = $row['courier_name'];
				    ?>
				    <tr class="rem1">
							<td class="invert"><?php echo $order_id; ?></td>
							<td class="invert-image">
								<a href="index.php">
									<img src="admin/productimages/convert/TH<?php echo $product_image; ?>" width='50px' height='50px' alt=" " class="img-responsive">
								</a>
							</td>
							<td class="invert"><?php echo $product_name; ?></td>
							<td class="invert"><?php echo $order_status; ?></td>
							<td class="invert"><?php echo $quantity; ?></td>
							<td class="invert"><?php echo $price; ?></td>
							<?php if ($order_status == 'Cancelled' || $order_status == 'Return' || $order_status == NULL || $order_status == 'Processing') { ?>
							<td class="invert"><h5>Your Order Under Progress, Courier Assigne Soon.</h5></td>
							<?php } else { ?>
							<td class="invert"><?php echo $courier_name; ?><br/><a href="courierdetails.php">More deatils click here</a></td>
							<?php }  ?>
							<td class="invert"><?php echo $dateandtime; ?></td>
							<?php if ($order_status == 'Cancelled' || $order_status == 'Return' || $order_status == NULL) { ?>
							<td class="invert">
								<h5>Order is not procced to return.</h5> 
							</td>
							<?php } else { ?>
								<?php if ($order_status == 'Cancelled' || $order_status == 'Return' || $order_status == NULL || $order_status == 'Processing') { ?>
								<td class="invert">
									<a href="javascript:void(0);" onClick="return confirmdata1('<?php echo $order_id;?>');">
									Return Order
									</a> 
								</td>
								<?php } else {  ?>
									<td class="invert">
										Can't return.
									</td>
								<?php } ?>
							<?php }  ?>
							<?php if ($order_status == 'Return' || $order_status == NULL) { ?>
							<td class="invert">
								<h5>You do not proceed to delete this order.</h5>
							</td>
							<?php } else { ?>
								<?php if ($order_status == 'Pending' || $order_status == 'Processing') { ?>
									<td class="invert">
										<a href="javascript:void(0);" onClick="return confirmdata('<?php echo $order_id;?>');">
											<div class="rem">
												<div class="close1"></div>
											</div>
										</a> 
									</td>
								<?php } else {  ?>
									<td class="invert">
										Can't cancel.
									</td>
								<?php }  ?>
							<?php } ?>
						</tr>
						<?php 
					   }
					?>
  			</tbody>
  		</table>
  		<?php } ?>
  	</div>
</div>
<!-- //checkout page -->
<?php if($num != 0) {  ?>
<?php include_once 'footer.php';?>
<?php } ?>	
</body>
</html>
<script>
  function confirmdata(id)
  {
    var ans = confirm('Are you sure want to cancel this order ?');
    if(ans == false) {
      return false;
    } else {
      window.location = 'deleteorder.php?order_id='+id; 
    }
  }
</script>
<script>
  function confirmdata1(id)
  {
    var ans = confirm('Are you sure want to return this order ?');
    if(ans == false) {
      return false;
    } else {
      window.location = 'purchasereturn.php?order_id='+id; 
    }
  }
</script>