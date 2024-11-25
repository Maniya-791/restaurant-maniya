
<?php

session_start(); 
			if (isset($_GET["link"])) {
				if ($_GET["link"]=="home") {
					$title="Home Page";
					$home="active";
				}elseif ($_GET["link"]=="about") {
					$title="About Page";
					$about="active";
				}elseif($_GET["link"]=="contact"){
					$title="Contact Page";
					$contact="active";
				}
				elseif($_GET["link"]=="chef"){
					$title="Chef Page";
					$chef="active";
				}
				elseif($_GET["link"]=="menu"){
					$title="Menu Page";
					$menu="active";
				}
				elseif($_GET["link"]=="reservation"){
					$title="Reservation Page";
					$reservation="active";
				}
				elseif($_GET["link"]=="blog"){
					$title="Blog Page";
					$blog="active";
				}else{
					header("Location: http://localhost/cooking/");
					$title="Home Page";
				}
			}else{
				 $home="active";
			}
			?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title ?> - Cooking Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<style>
	.loginbtn{
		background-color: red;
		color: white !important;
		transition: .5s ease;
	}
	.loginbtn:hover{
		background-color: maroon;
		color: white !important;
	}
</style>
<body>

	<div class="wrap">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-12 col-md d-flex align-items-center">
					<p class="mb-0 phone"><span class="mailus">Phone no:</span> <a href="#">+00 1234 567</a> or <span class="mailus">email us:</span> <a href="#">emailsample@email.com</a></p>
				</div>
				<div class="col-12 col-md d-flex justify-content-md-end">
					<p class="mb-0">Mon - Fri / 9:00-21:00, Sat - Sun / 10:00-20:00</p>
					<div class="social-media">
						<p class="mb-0 d-flex">
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
							<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.html">Taste.<span>it</span></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
			
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?php echo $home ?>"><a href="index.php?link=home" class="nav-link">Home</a></li>
					<li class="nav-item <?php echo $about ?>"><a href="about.php?link=about" class="nav-link">About</a></li>
					<li class="nav-item <?php echo $chef ?>"><a href="chef.php?link=chef" class="nav-link">Chef</a></li>
					<li class="nav-item <?php echo $menu ?>"><a href="menu.php?link=menu" class="nav-link">Menu</a></li>
					<li class="nav-item <?php echo $reservation ?>"><a href="reservation.php?link=reservation" class="nav-link">Reservation</a></li>
					<li class="nav-item <?php echo $blog ?>"><a href="blog.php?link=blog" class="nav-link">Blog</a></li>
					<li class="nav-item <?php echo $contact ?>"><a href="contact.php?link=contact" class="nav-link">Contact</a></li>
					<?php
					
					if (!isset($_SESSION["status"])) {
						echo '<li class="nav-item  <?php echo $contact ?>"><a href="admin/" class="nav-link loginbtn">Login</a></li>';
					}else{
						echo '<li class="nav-item  <?php echo $contact ?>"><p class="nav-link bg-danger"> <i class="fa fa-user mx-2 "  style="font-size: 18px;"  aria-hidden="true"></i>'.$_SESSION["name"].'</p></li>';

					}
					?>
					
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->