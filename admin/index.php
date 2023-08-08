<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Flourish Pure Food</title>
	<!-- Meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Style -->
	<link rel="stylesheet" href="css/login.css" type="text/css" media="all" />
</head>
<body>
	<!-- login form -->
	<section class="w3l-login">
		<div class="overlay">
			<div class="wrapper">
				<div class="logo">
					<a class="brand-logo" href="index.php">Flourish Pure Food</a>
				</div>
				<div class="form-section">
					<h3>Login</h3>
					<h6>To continue with Us</h6>
					<form action="authentication.php" method="POST" class="signin-form">
						<div class="form-input">
							<input type="text" name="username" placeholder="Username" required="" autofocus>
						</div>
						<div class="form-input">
							<input type="password" name="password" placeholder="Password" required="">
						</div>
						<div class="new-signup">
							<a href="#reload" class="signuplink">Forgot username or password?</a>
						</div>
						<button type="submit" name="login" class="btn btn-primary theme-button mt-4">Log in</button>
					</form>
				</div>
			</div>
		</div>
		<div id='stars'></div>
		<!-- copyright -->
		<div class="copy-right">
			<p>&copy; 2022 Flourish Pure Food Form. All rights reserved. </p>
		</div>
		<!-- //copyright -->
	</section>
	<!-- /login form -->
</body>
</html>