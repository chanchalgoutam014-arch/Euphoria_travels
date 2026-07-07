<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: ../adminLogin.php?msg=Login First");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="../favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">



	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<link rel="stylesheet" href="../css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="../fonts/icomoon/style.css">
	<link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="../css/daterangepicker.css">
	<link rel="stylesheet" href="../css/aos.css">
	<link rel="stylesheet" href="../css/style.css">

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
				<a href="index.html" class="logo m-0"><img src="../images/passport.png" alt="icon" style="height: 36px;"></i>𝑬𝒖𝒑𝒉𝒐𝒓𝒊𝒂 𝑻𝒓𝒂𝒗𝒆𝒍𝒔<span class="text-primary"></span></a>

				<ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
					<li class="active"><a href="./admin_dashboard.php">Dashboard</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Destination
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./addDestinations.php">Add new destination</a>
							<a class="dropdown-item" href="./manage_destination.php">Manage destination</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Packages
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./add_packages.php">Add new packages</a>
							<a class="dropdown-item" href="./manage_packages.php">Mange Packages</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Bookings
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./manage_bookings.php">Manage Bookings</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Enquiries
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="./manage_enquiry.php">Manage Enquiries</a>
						</div>
					</li>
					<?php
					if (isset($_SESSION["email"])) {
						echo "<li class='active'><a href='../adminLogout.php'>Logout</a></li>";
					} else {
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