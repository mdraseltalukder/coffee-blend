<?php 
include_once('../includes/header.php');
include_once('../config/config.php');

if(!isset($_SESSION['user'])){
	header("Location:". APIURL ."");
}


if(isset($_POST['place-order'])){
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $state = trim($_POST['state']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $pincode = trim($_POST['pincode']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
	$user_id= $_SESSION['user']['id'];
    $total_price = $_SESSION['total'] ?? 0;

  
    if(empty($fname)){
        $_SESSION['error'] = "First name is required";
     
    }
    else if(empty($lname)){
        $_SESSION['error'] = "Last name is required";
        
    }
    else if(empty($state)){
        $_SESSION['error'] = "State is required";
       
    }
    else if(empty($address)){
        $_SESSION['error'] = "Address is required";
      
    }
    else if(empty($city)){
        $_SESSION['error'] = "City is required";
 
    }
    else if(empty($pincode)){
        $_SESSION['error'] = "Pincode is required";
      
    }
    else if(empty($phone)){
        $_SESSION['error'] = "Phone number is required";
        
    }
    else if(empty($email)){
        $_SESSION['error'] = "Email is required";
       
    }else{

    $insert = "INSERT INTO orders(fname, lname, state, address, city, pincode, phone, email, total_price)
               VALUES('$fname', '$lname', '$state', '$address', '$city', '$pincode', '$phone', '$email', '$total_price')";
    
    $result = $conn->query($insert);

    if($result){
        header("Location: pay.php");
        exit();
    } else {
        $_SESSION['error'] = "Order not placed due to database error.";
        header("Location: " . APIURL . "/products/checkout.php");
        exit();
    }
}
}












?>

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?= APIURL ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="align-items-center justify-content-center row slider-text">

            <div class="text-center col-md-7 col-sm-12 ftco-animate">
            	<h1 class="mt-5 mb-3 bread">Checkout</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="<?= APIURL ?>">Home</a></span> <span>Checout</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
						<form action="" method="POST" class="ftco-bg-dark p-3 p-md-5 billing-form">
							<h3 class="mb-4 billing-heading">Billing Details</h3>
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
	          	<div class="align-items-end row">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Firt Name</label>
	                  <input type="text" class="form-control" name="fname" value="<?= $fname ?? "" ?>" placeholder="">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" class="form-control" placeholder=""  value="<?= $lname ?? "" ?>" name="lname">
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">State / Country</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="state"   id="" class="form-control">
		                  	<option value="France">France</option>
		                    <option value="Italy">Italy</option>
		                    <option value="Philippines">Philippines</option>
		                    <option value="South Korea">South Korea</option>
		                    <option value="Hongkong">Hongkong</option>
		                    <option value="Japan">Japan</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" class="form-control" placeholder="House number and street name" name="address"  value="<?= $address ?? "" ?>">
	                </div>
		            </div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" class="form-control" placeholder="" name="city"  value="<?= $city ?? "" ?>">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" class="form-control" placeholder="" name="pincode"  value="<?= $pincode ?? "" ?>">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="number" class="form-control" placeholder="" name="phone"  value="<?= $phone ?? "" ?>">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="email" class="form-control" placeholder="" name="email"  value="<?= $email ?? "" ?>">
					  <!-- hudden input total  -->
	                  <input type="hidden" class="form-control" placeholder="" name=""  value="<?= $_SESSION['total'] ?>">
	                </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
                      <button class="px-4 py-3 btn btn-primary" type="submit" name="place-order">Place an order</button>

										</div>
									</div>
                </div>
	            </div>
	          </form><!-- END -->


<!-- 
	          <div class="d-flex mt-5 pt-3 row">
	          	<div class="d-flex col-md-6">
	          		<div class="ftco-bg-dark p-3 p-md-4 cart-detail cart-total">
	          			<h3 class="mb-4 billing-heading">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$20.60</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>$17.60</span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="ftco-bg-dark p-3 p-md-4 cart-detail">
	          			<h3 class="mb-4 billing-heading">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
								</div>
	          	</div>
	          </div> -->
          </div> <!-- .col-md-8 -->

           
          </div>

        </div>
      </div>
    </section> <!-- .section -->

   <?php 
 include_once('../includes/footer.php');  
   ?>