<!-- navigation -->
<div class="navbar-inner">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto text-center mr-xl-5">
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="index.php">Home
						</a>
					</li>
					<?php 
						include_once 'connection.php';
						$query = "SELECT * FROM `category`";
						$result = mysqli_query($connection,$query);
						while ($row = mysqli_fetch_assoc($result)) {
						 	$id = $row['category_id'];
						 	$name = $row['category_name'];
					?>
					
					<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $name; ?>
						</a>
						<div class="dropdown-menu">
							<div class="agile_inner_drop_nav_info p-4">
								<div class="row">
									<div class="col-sm-6 multi-gd-img">
										<ul class="multi-column-dropdown">
											<?php 
												include_once 'connection.php';
												$query1 = "SELECT * FROM `subcategory` WHERE `category_id` = '$id'";
												$result1 = mysqli_query($connection,$query1);
												while ($row1 = mysqli_fetch_assoc($result1)) {
												 	$subid = $row1['subcategory_id'];
												 	$subname = $row1['subcategory_name'];
											?>
											<li>
												<a href="productlisting.php?subcategory_id=<?php echo $subid; ?>&subcategory_name=<?php echo $subname; ?>"><?php echo $subname;?></a>
											</li>
										<?php }	?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>
					<?php } ?>
					<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link" href="about.php">About Us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact Us</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!-- //navigation -->