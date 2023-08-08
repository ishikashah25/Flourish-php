<!-- top-header -->
<div class="agile-main-top">
	<div class="container-fluid">
		<div class="row main-top-w3l py-2">
			<div class="col-lg-12 header-right mt-lg-0 mt-2">
				<!-- header lists -->
				<ul>
					<li class="text-center border-right text-white">
						<i class="fas fa-phone mr-2"></i> +91 91380 03600
					</li>
					<?php
					session_start();
					if (isset($_SESSION['sessionid'])) {
						$sessionid = $_SESSION['sessionid'];
					?>
					<li class="text-center border-right text-white">
						Welcome <?php echo $sessionid; ?>
					</li>
					<li class="text-center border-right text-white">
						<a class="text-center text-white" href="mydashboard.php">My dashboard</a>
					</li>
					<li class="text-center border-right text-white">
						<a class="text-center text-white" href="logout.php">Logout</a>
					</li>
					<?php } else {?>
					<li class="text-center border-right text-white">
						<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
							<i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
					</li>
					<li class="text-center text-white">
						<a href="#" data-toggle="modal" data-target="#exampleModal2" class="text-white">
							<i class="fas fa-sign-out-alt mr-2"></i>Register </a>
					</li>
				<?php } ?>
				</ul>
				<!-- //header lists -->
			</div>
		</div>
	</div>
</div>
<!-- //shop locator (popup) -->

<!-- modals -->
<!-- log in -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center">Log In</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="checklogin.php" method="post">
					<div class="form-group">
						<label class="col-form-label">Username</label>
						<input type="email" name="username" class="form-control" placeholder=" " name="Name" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Password</label>
						<input type="password" name="password" class="form-control" placeholder=" " name="Password" required="">
					</div>
					<div class="right-w3l">
						<input type="submit" class="form-control" value="Log in">
					</div>
					<!-- <div class="sub-w3l">
						<div class="custom-control custom-checkbox mr-sm-2">
							<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
							<label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
						</div>
					</div> -->
					<p class="text-center dont-do mt-3">Don't have an account?
						<a href="#" data-toggle="modal" data-target="#exampleModal2">
							Register Now</a>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- register -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Register</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="insertregistration.php" method="post">
					<div class="form-group">
						<label class="col-form-label">First Name</label>
						<input type="text" class="form-control" placeholder=" " name="firstname" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Last Name</label>
						<input type="text" class="form-control" placeholder=" " name="lastname" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Phone number</label>
						<input type="text" class="form-control" placeholder=" " name="phonenumber" required="">
					</div><div class="form-group">
						<label class="col-form-label">Email id</label>
						<input type="email" class="form-control" placeholder=" " name="emailid" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Address</label>
						<input type="text" class="form-control" placeholder=" " name="address" required="">
					</div>

					<div class="form-group">
						<label class="col-form-label">City</label>
						<input type="text" class="form-control" placeholder=" " name="city" required="">
					</div>

					<div class="form-group">
						<label class="col-form-label">State</label>
						<input type="text" class="form-control" placeholder=" " name="state" required="">
					</div>

					<div class="form-group">
						<label class="col-form-label">Country</label>
						<input type="text" class="form-control" placeholder=" " name="country" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Password</label>
						<input type="password" class="form-control" placeholder=" " name="password" id="password1" required="">
					</div>
					<div class="form-group">
						<label class="col-form-label">Confirm Password</label>
						<input type="password" class="form-control" placeholder=" " name="confirmpassword" id="password2" required="">
					</div>
					<div class="right-w3l">
						<input type="submit" name="submit" class="form-control" value="Register">
					</div>
					<div class="sub-w3l">
						<div class="custom-control custom-checkbox mr-sm-2">
							<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
							<label class="custom-control-label" for="customControlAutosizing2">I Accept to the Terms & Conditions</label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- //modal -->
<!-- //top-header -->	