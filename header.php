<?php

session_start();

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="./favicon.png" style="color: white;">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="fonts/icomoon/style.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="css/daterangepicker.css">
	<link rel="stylesheet" href="css/aos.css">
	<link rel="stylesheet" href="css/style.css">

	<title>Euphoria Travels</title>
</head>

<body>


	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
		<div class="container">
			<div class="site-navigation">
				<a href="index.php" class="logo m-0" style="font-size: 25px;"><img src="./images/passport.png" alt="icon" style="height: 36px;"></i>𝑬𝒖𝒑𝒉𝒐𝒓𝒊𝒂 𝑻𝒓𝒂𝒗𝒆𝒍𝒔<span class="text-primary"></span></a>

				<ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
					<li class="active"><a href="index.php">Home</a></li>
					<li class="active"><a href="destinations.php">Destinations</a></li>
					<li class="active"><a href="tour_packages.php">Packages</a></li>
					<li class="active"><a href="services.php">Services</a></li>
					<li class="active"><a href="about.php">About</a></li>
					<li class="active"><a href="contact.php">Contact Us</a></li>
					<?php
					if (isset($_SESSION["email"])) {
						echo "<li class='active'><a href='userprofile.php'>My Profile</a></li>";
						echo "<li class='active'><a href='logout.php'>Logout</a></li>";
					} else {
						echo "<li class='active'><a href='login.php'>Login</a></li>";
						echo "<li class='active'><a href='register.php'>Register</a></li>";
						echo "<li class='active'><a href='adminLogin.php'>Admin Login</a></li>";
					}
					?>
				</ul>

				<a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
					<span></span>
				</a>

			</div>
		</div>
	</nav>