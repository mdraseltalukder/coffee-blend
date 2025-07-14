
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
ob_start(); // Output buffering শুরু
?>
<?php 





define("APIURL","http://localhost/dashboard/Projects/Udemi/coffee-blend")
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="<?= APIURL ?>/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= APIURL ?>/css/animate.css">
    
    <link rel="stylesheet" href="<?= APIURL ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= APIURL ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= APIURL ?>/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= APIURL ?>/css/aos.css">

    <link rel="stylesheet" href="<?= APIURL ?>/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= APIURL ?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= APIURL ?>/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?= APIURL ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?= APIURL ?>/css/icomoon.css">
    <link rel="stylesheet" href="<?= APIURL ?>/css/style.css">
  </head>
  <body>
  	<nav class="bg-dark navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?= APIURL ?>/index.php">Coffee<small>Blend</small></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
          
	        <ul class="ml-auto navbar-nav">
	          <li class="nav-item active"><a href="<?= APIURL ?>/index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="<?= APIURL ?>/menu.php" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="<?= APIURL ?>/services.php" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="<?= APIURL ?>/about.php" class="nav-link">About</a></li>
	         
	          <li class="nav-item"><a href="<?= APIURL ?>/contact.php" class="nav-link">Contact</a></li>
            <?php 
            if(isset($_SESSION['user'])){ ?>
             
            
	          <li class="nav-item cart"><a href="<?= APIURL ?>/products/cart.php" class="nav-link"><span class="icon icon-shopping_cart"></span></a>
            </li>
            <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['user']['username']?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= APIURL ?>/users/bookings.php">Bookings</a></li>
            <li><a class="dropdown-item" href="<?= APIURL ?>/users/orders.php">Orders</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= APIURL ?>/auth/logout.php">Logout</a></li>
          </ul>
        </li>
            <?php } else{?>
			  <li class="nav-item"><a href="<?= APIURL ?>/auth/login.php" class="nav-link">login</a></li>
			  <li class="nav-item"><a href="<?= APIURL ?>/auth/register.php" class="nav-link">register</a></li>
<?php }?>
	        </ul>
	      </div>
		</div>
	  </nav>
    <!-- END nav -->