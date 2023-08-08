<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Flourish Pure Food</title>
	<!--/tags -->
	<?php include_once 'head.php';?>
</head>

<body>
	<?php 
	include_once 'topheader.php';
	include_once 'header.php';
	include_once 'menu.php'
	;?>
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
					<li>Payment</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- payment page-->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<!-- //tittle heading -->
			<div class="checkout-right">
				<!--Horizontal Tab-->
				<div id="parentHorizontalTab">
					<!-- <ul class="resp-tabs-list hor_1">
						<li>Cash on delivery (COD)</li>
					</ul> -->
					<!--<div class="resp-tabs-container hor_1">-->

						<div>
							<div class="vertical_post check_box_agile">
								<br/>
								<h5>COD</h5>
								<form action="insertpayment.php" method="post" class="cashon_delivery">
									<div class="checkbox">
										<div class="check_box_one cashon_delivery">
											<label class="anim">
												<input type="checkbox" class="checkbox" name="cash" value="Cash on Delivery" required="">
												<span> We also accept Credit/Debit card on delivery. Please Check with the agent.</span>
											</label>
										</div>
									</div>
									<br>
									<button class="submit">
										<span>Make a payment </span>
									</button>
								</form>
							</div>
						</div>
					<!--</div>-->
				</div>
				<!--Plug-in Initialisation-->
			</div>
		</div>
	</div>
	<!-- //payment page -->

	&nbsp;
	<!-- footer -->
	<?php include_once 'footer.php'; ?>
	
	<!-- js-files -->


	<!-- easy-responsive-tabs -->
	<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
	<script src="js/easyResponsiveTabs.js"></script>

	<script>
		$(document).ready(function () {
			//Horizontal Tab
			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
		});
	</script>
	<!-- //easy-responsive-tabs -->

	<!-- credit-card -->
	<script src="js/creditly.js"></script>
	<link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />

	<script>
		$(function () {
			var creditly = Creditly.initialize(
				'.creditly-wrapper .expiration-month-and-year',
				'.creditly-wrapper .credit-card-number',
				'.creditly-wrapper .security-code',
				'.creditly-wrapper .card-type');

			$(".creditly-card-form .submit").click(function (e) {
				e.preventDefault();
				var output = creditly.validate();
				if (output) {
					// Your validated credit card output
					console.log(output);
				}
			});
		});
	</script>
	<!-- //credit-card -->

</body>
</html>