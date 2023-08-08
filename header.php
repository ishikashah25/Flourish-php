<!-- header-bottom-->
<div class="header-bot">
	<div class="container">
		<div class="row header-bot_inner_wthreeinfo_header_mid">
			<!-- logo -->
			<div class="col-md-3">
				<h1 class="text-center">
					<a href="index.php" class="font-weight-bold font-italic">
						<img src="images/logo.png" alt=" " class="img-fluid">
					</a>
				</h1>
			</div>
			<!-- //logo -->
			<!-- header-bot -->
			<div class="col-md-9 header mt-4 mb-md-0 mb-4">
				<div class="row">
					<!-- search -->
					<div class="col-10 agileits_search">
						<form class="form-inline" action="search.php" method="post">
							<input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search" required>
							<button class="btn my-2 my-sm-0" type="submit">Search</button>
						</form>
					</div>
					<!-- //search -->
					<!-- cart details -->
					<?php
					if (isset($_SESSION['sessionid'])) {
						$sessionid = $_SESSION['sessionid'];
					?>
					<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
						<div class="wthreecartaits wthreecartaits2 cart cart box_1">
							<form action="viewcart.php" method="post" class="last">
								<button class="btn w3view-cart" type="submit" name="submit" value="">
									<i class="fas fa-cart-arrow-down"></i>
								</button>
							</form>
						</div>
					</div>
					<?php } ?>
					<!-- //cart details -->
				</div>
			</div>
		</div>
	</div>
</div>
