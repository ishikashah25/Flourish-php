<!-- footer -->
<footer>
	<div class="footer-top-first">
		<div class="container py-md-5 py-sm-4 py-3">
			<!-- footer first section -->
			<h2 class="footer-top-head-w3l font-weight-bold mb-2">Flourish Pure Food </h2>
			<p class="footer-main mb-4">
				Flourish Purefoods is an inspired and responsible company with strong values founded on the need to support the subject of Nutrition. These values guide our business and underpin the interconnected 
relationships we have with each other and with the natural world that sustains and 
flourishes our well-being.
			</p>
			<!-- //footer first section -->
			<!-- footer second section -->
			<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
				<div class="col-md-4 offer-footer">
					<div class="row">
						<div class="col-4 icon-fot">
							<i class="fas fa-dolly"></i>
						</div>
						<div class="col-8 text-form-footer">
							<h3>Free Shipping</h3>
						</div>
					</div>
				</div>
				<div class="col-md-4 offer-footer my-md-0 my-4">
					<div class="row">
						<div class="col-4 icon-fot">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="col-8 text-form-footer">
							<h3>Fast Delivery</h3>
						</div>
					</div>
				</div>
				<div class="col-md-4 offer-footer">
					<div class="row">
						<div class="col-4 icon-fot">
							<i class="far fa-thumbs-up"></i>
						</div>
						<div class="col-8 text-form-footer">
							<h3>Big Choice</h3>
							<p>of Products</p>
						</div>
					</div>
				</div>
			</div>
			<!-- //footer second section -->
		</div>
	</div>
	<!-- footer third section -->
	<div class="w3l-middlefooter-sec">
		<div class="container py-md-5 py-sm-4 py-3">
			<div class="row footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-md-3 col-sm-6 footer-grids">
					<h3 class="text-white font-weight-bold mb-3">Categories</h3>
					<ul>
						<?php 
							include_once 'connection.php';
							$result = mysqli_query($connection,"SELECT * FROM `subcategory`");
							while($row = mysqli_fetch_array($result)){

						?>
						<li class="mb-3">
							<a href="productlisting.php?subcategory_id=<?php echo $row['subcategory_id'] ?>&subcategory_name=<?php echo $row['subcategory_name'] ?>"><?php echo $row['subcategory_name'] ?></a>
						</li>
					<?php } ?>
					</ul>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
					<h3 class="text-white font-weight-bold mb-3">Quick Links</h3>
					<ul>
						<li class="mb-3">
							<a href="about.php">About Us</a>
						</li>
						<li class="mb-3">
							<a href="contact.php">Contact Us</a>
						</li>
						<li class="mb-3">
							<a href="help.php">Help</a>
						</li>
						<li class="mb-3">
							<a href="faqs.php">Faqs</a>
						</li>
						<li class="mb-3">
							<a href="terms.php">Terms of use</a>
						</li>
						<li>
							<a href="privacy.php">Privacy Policy</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
					<h3 class="text-white font-weight-bold mb-3">Get in Touch</h3>
					<ul>
						<li class="mb-3">
							<i class="fas fa-map-marker"></i> Flourish Purefoods Pvt. Ltd.
Claris HQ, Opposite Doctor House, Nr Parimal Garden, Ellisbridge,
Ahmedabad-380006, Gujarat, INDIA</li>
						<li class="mb-3">
							<i class="fas fa-mobile"></i> +91-079-66092101 </li>
						<li class="mb-3">
							<i class="fas fa-phone"></i> +91 91380 03600 </li>
						<li class="mb-3">
							<i class="fas fa-envelope-open"></i>
							<a href="mailto:flourish@mail.com"> info@flourishpurefoods.com</a>
						</li>
						<li>
							<i class="fas fa-envelope-open"></i>
							<a href="mailto:flourish@mail.com"> careers@flourishpurefoods.com</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
					<!-- social icons -->
					<div class="footer-grids  w3l-socialmk mt-3">
						<h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
						<div class="social">
							<ul>
								<li>
									<a class="icon fb" href="https://facebook.com" target="_blank">
										<i class="fab fa-facebook-f"></i>
									</a>
								</li>
								<li>
									<a class="icon tw" href="https://twitter.com/?lang=en-in">
										<i class="fab fa-twitter"></i>
									</a>
								</li>
								<li>
									<a class="icon gp" href="https://www.google.com">
										<i class="fab fa-google-plus-g"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- //social icons -->
				</div>
			</div>
			<!-- //quick links -->
		</div>
	</div>
	<!-- //footer third section -->
</footer>
<!-- //footer -->
<!-- copyright -->
<div class="copy-right py-3">
	<div class="container">
		<p class="text-center text-white">© 2022 Flourish Pure Food. All rights reserved 
		</p>
	</div>
</div>
<!-- //copyright -->

<!-- js-files -->
<!-- jquery -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- //jquery -->

<!-- nav smooth scroll -->
<script>
	$(document).ready(function () {
		$(".dropdown").hover(
			function () {
				$('.dropdown-menu', this).stop(true, true).slideDown("fast");
				$(this).toggleClass('open');
			},
			function () {
				$('.dropdown-menu', this).stop(true, true).slideUp("fast");
				$(this).toggleClass('open');
			}
		);
	});
</script>
<!-- //nav smooth scroll -->

<!-- popup modal (for location)-->
<script src="js/jquery.magnific-popup.js"></script>
<script>
	$(document).ready(function () {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',
			fixedContentPos: false,
			fixedBgPos: true,
			overflowY: 'auto',
			closeBtnInside: true,
			preloader: false,
			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});

	});
</script>
<!-- //popup modal (for location)-->

<!-- cart-js -->
<script src="js/minicart.js"></script>
<script>
	paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

	paypals.minicarts.cart.on('checkout', function (evt) {
		var items = this.items(),
			len = items.length,
			total = 0,
			i;

		// Count the number of each item in the cart
		for (i = 0; i < len; i++) {
			total += items[i].get('quantity');
		}

		if (total < 3) {
			alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
			evt.preventDefault();
		}
	});
</script>
<!-- //cart-js -->

<!-- password-script -->
<script>
	window.onload = function () {
		document.getElementById("password1").onchange = validatePassword;
		document.getElementById("password2").onchange = validatePassword;
	}

	function validatePassword() {
		var pass2 = document.getElementById("password2").value;
		var pass1 = document.getElementById("password1").value;
		if (pass1 != pass2)
			document.getElementById("password2").setCustomValidity("Passwords Don't Match");
		else
			document.getElementById("password2").setCustomValidity('');
		//empty string means no validation error
	}
</script>
<!-- //password-script -->

<!-- scroll seller -->
<script src="js/scroll.js"></script>
<!-- //scroll seller -->

<!-- smoothscroll -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
	jQuery(document).ready(function ($) {
		$(".scroll").click(function (event) {
			event.preventDefault();

			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
			}, 1000);
		});
	});
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
<script>
	$(document).ready(function () {
		/*
		var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
		};
		*/
		$().UItoTop({
			easingType: 'easeOutQuart'
		});

	});
</script>
<!-- //smooth-scrolling-of-move-up -->

<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- //js-files -->