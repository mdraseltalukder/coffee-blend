<?php 
session_start();
define("ADMINURL", "http://localhost/dashboard/Projects/Udemi/coffee-blend/admin-panel");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?=ADMINURL ?>/styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="header-top fixed-top bg-dark navbar navbar-expand-lg navbar-dark">
      <div class="container">
      <a class="navbar-brand" href="<?=ADMINURL ?>">CB PANEL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <?php 
          if(isset($_SESSION['admin'])){ ?>
          
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link" style="margin-left: 20px;" href="<?=ADMINURL ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=ADMINURL ?>/admins/admins.php" style="margin-left: 20px;">Admins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=ADMINURL ?>/orders-admins/show-orders.php" style="margin-left: 20px;">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=ADMINURL ?>/products-admins/show-products.php" style="margin-left: 20px;">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=ADMINURL ?>/bookings-admins/show-bookings.php" style="margin-left: 20px;">Bookings</a>
          </li>
        </ul>
        <?php }?>
        <ul class="d-md-flex ml-md-auto navbar-nav">
          <?php 
          if(isset($_SESSION['admin'])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=ADMINURL ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php }else{?>
          <li class="nav-item">
            <a class="nav-link" href="<?=ADMINURL ?>/admins/login-admins.php">login
            </a>
          </li>
          <?php }?>
          <?php 
          if(isset($_SESSION['admin'])){ ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php 
          if(isset($_SESSION['admin'])){ 
           echo $_SESSION['admin']['username'];
          }else{
          echo "username";
          }?>
 
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?=ADMINURL ?>/admins/logout.php">Logout</a>
              
          </li>
          <?php }?>
                          
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container-fluid">
        