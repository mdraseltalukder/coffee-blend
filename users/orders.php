<?php 
include_once('../includes/header.php');
include_once('../config/config.php');

if(!isset($_SESSION['user'])){
    header("Location:". APIURL ."/auth/login.php");
    exit();
}

$select= "SELECT * FROM orders WHERE user_id=" . intval($_SESSION['user']['id']);
$run= $conn->query($select);
$orders= $run->fetch_all(MYSQLI_ASSOC);


?>

 <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?= APIURL ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="align-items-center justify-content-center row slider-text">

            <div class="text-center col-md-7 col-sm-12 ftco-animate">
            	<h1 class="mt-5 mb-3 bread">Your orderss</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="<?= APIURL ?>">Home</a></span> <span>Your orderss</span></p>
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
						        <th>email</th>
						        <th>Phone</th>
						        <th>address</th>
						        <th>total_price</th>
						        <th>Status</th>
						        <th>Write Reviews</th>
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
								<?php if(empty($orders)):?>
									<p>Your Orders is empty</p>
								<?php endif; ?>

								<?php foreach ($orders as $order) {
							

									?>
						      <tr class="text-center">

						        <td class="product-name">
						        	<p><?= $order['fname'] ?></p>
						        	
						        </td>
						        <td class="product-name">
						        	<p><?= $order['lname'] ?></p>
						        	
						        </td>
						        <td class="product-name">
						        	<p><?= $order['email'] ?></p>
						        	
						        </td>
						      
						        <td class="product-name">
						        	<p><?= $order['phone'] ?></p>
						        	
						        </td>
						        <td class="product-name">
						        	<p><?= $order['address'] ?></p>
						        	
						        </td>
                                 <td class="product-name">
						        	<h3>$<?= $order['total_price'] ?></h3>
						        	
						        </td>
						        <td class="product-name">
						        	<h3><?= $order['status'] ?></h3>
						        	
						        </td>
                                <?php if($order['status'] == 'confirmed') {?>
						        <td class="product-name">
						        	<a href="<?= APIURL ?>/reviews/write-review.php?user_id=<?= $_SESSION['user']['id'] ?>" class="px-4 py-3 btn btn-primary" type="submit" name="place-order">Write Review</a>
						        	
						        </td>
						     <?php }?>
						        	
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