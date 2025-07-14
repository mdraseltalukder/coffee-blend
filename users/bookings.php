<?php 
include_once('../includes/header.php');
include_once('../config/config.php');

if(!isset($_SESSION['user'])){
    header("Location:". APIURL ."/auth/login.php");
    exit();
}

$select= "SELECT * FROM booking WHERE user_id=" . intval($_SESSION['user']['id']);
$run= $conn->query($select);
$bookings= $run->fetch_all(MYSQLI_ASSOC);


?>

 <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?= APIURL ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="align-items-center justify-content-center row slider-text">

            <div class="text-center col-md-7 col-sm-12 ftco-animate">
            	<h1 class="mt-5 mb-3 bread">Your Bookings</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="<?= APIURL ?>">Home</a></span> <span>Your Bookings</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    	<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>First Name</th>
						        <th>Last Name</th>
						        <th>Date</th>
						        <th>Time</th>
						        <th>Phone</th>
						        <th>Massage</th>
						        <th>Status</th>
						      </tr>
						    </thead>
						    <tbody>
								  <?php 
            if(isset($_SESSION['error'])){
                echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
                echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
                unset($_SESSION['success']);
            }
            ?>
								<?php if(empty($bookings)):?>
									<p>Your Booking is empty</p>
								<?php endif; ?>

								<?php foreach ($bookings as $booking) {
							

									?>
						      <tr class="text-center">
				

						        
						       
						        
						        <td class="product-name">
						        	<p><?= $booking['fname'] ?></p>
						        	
						        </td>
						        <td class="product-name">
						        	<p><?= $booking['lname'] ?></p>
						        	
						        </td>
						        <td class="product-name">
						        	<p><?= $booking['date'] ?></p>
						        	
						        </td>
						        <td class="product-name">
						        	<p><?= $booking['time'] ?></p>
						        	
						        </td>
						        <td class="product-name">
						        	<p><?= $booking['phone'] ?></p>
						        	
						        </td>
						        <td class="product-name">
						        	<p><?= $booking['massage'] ?></p>
						        	
						        </td>
						        <td class="product-name">
						        	<h3><?= $booking['status'] ?></h3>
						        	
						        </td>
						     
						        	
						        </td>
						        
						     
						        
						       


						      </tr>
							     <?php }?>
							  <!-- END TR-->

						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    	
			</div>
		</section>


<?php 
include_once('../includes/footer.php');
?>