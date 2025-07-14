<?php
include_once('includes/header.php');
include_once('config/config.php');

// desserts
$select= "SELECT * FROM products WHERE type='dessert'" ;
$run= $conn->query($select);
$desserts = $run->fetch_all(MYSQLI_ASSOC); 

// drinks
$select= "SELECT * FROM products WHERE type='drink'" ;
$run= $conn->query($select);
$drinks = $run->fetch_all(MYSQLI_ASSOC);



?>

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="align-items-center justify-content-center row slider-text">

            <div class="text-center col-md-7 col-sm-12 ftco-animate">
            	<h1 class="mt-5 mb-3 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="<?= APIURL ?>">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="d-md-flex align-items-xl-end wrap">
	    		<div class="info">
	    			<div class="row no-gutters">
	    				<div class="d-flex col-md-4 ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
	    						<h3>000 (123) 456 7890</h3>
	    						<p>A small river named Duden flows by their place and supplies.</p>
	    					</div>
	    				</div>
	    				<div class="d-flex col-md-4 ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
	    						<h3>198 West 21th Street</h3>
	    						<p>	203 Fake St. Mountain View, San Francisco, California, USA</p>
	    					</div>
	    				</div>
	    				<div class="d-flex col-md-4 ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Open Monday-Friday</h3>
	    						<p>8:00am - 9:00pm</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="p-4 book">
	    			<h3>Book a Table</h3>
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
	    			<form action="booking/book.php" method="POST" class="appointment-form">
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" class="form-control" name="fname" placeholder="First Name" value="<?= $fname ?? '' ?>">
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?= $lname ?? '' ?>">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-md-calendar"></span></div>
		            		<input type="text" class="form-control appointment_date" placeholder="Date" name="date" value="<?= $date ?? '' ?>">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<div class="input-wrap">
		            		<div class="icon"><span class="ion-ios-clock"></span></div>
		            		<input type="text" class="form-control appointment_time" placeholder="Time" name="time" value="<?= $time ?? '' ?>">
	            		</div>
		    				</div>
		    				<div class="form-group ml-md-4">
		    					<input type="text" class="form-control" placeholder="Phone"  name="phone" value="<?= $phone ?? '' ?>">
		    				</div>
	    				</div>
	    				<div class="d-md-flex">
	    					<div class="form-group">
		              <textarea  id="" cols="30" rows="2" class="form-control" placeholder="Message" name="message"><?= $massage ?? '' ?></textarea>
		            </div>
					<?php if(isset($_SESSION['user'])){
					?>
		            <div class="form-group ml-md-4">
		              <input type="submit" value="Book a Table" class="px-4 py-3 btn btn-white" name="book">
		            </div>
					<?php }else{?>
						<p class="text-white">Login to book a table</p>
						<?php }?>
	    				</div>
	    			</form>
	    		</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
        <div class="row">
        
        	
        	<div class="col-md-6">
        		<h3 class="mb-5 heading-pricing ftco-animate">Desserts</h3>
				<?php foreach ($desserts as $dessert) { ?>
        		<div class="d-flex pricing-entry ftco-animate">
        		<a href="products/product-single.php?id=<?= $dessert['id'] ?>" class="img" style="background-image: url('<?= APIURL ?>/images/<?= $dessert['image'] ?>');"></a>
        			<div class="pl-3 desc">
	        			<div class="d-flex align-items-center text">
	        				<h3><a href="products/product-single.php?id=<?= $dessert['id']	 ?>"><?= $dessert['name'] ?></a></h3>
	        				<span class="price">$<?= $dessert['price'] ?></span>
	        			</div>
	        			<div class="d-block">
	        				<p><?= substr($dessert['description'],0,100) ?></p>
	        			</div>
        			</div>
        		</div>
        		<?php }?>
        	</div>

        	<div class="col-md-6">
        		<h3 class="mb-5 heading-pricing ftco-animate">Drinks</h3>
<?php foreach ($drinks as $drink) {?>

        		<div class="d-flex pricing-entry ftco-animate">
        			<a href="products/product-single.php?id=<?= $drink['id'] ?>" class="img" style="background-image: url('<?= APIURL ?>/images/<?= $drink['image'] ?>');"></a>
        			<div class="pl-3 desc">
	        			<div class="d-flex align-items-center text">
	        				<h3><a href="products/product-single.php?id=<?= $drink['id']	 ?>"><?= $drink['name'] ?></a></h3>
	        				<span class="price">$<?= $drink['price'] ?></span>
	        			</div>
	        			<div class="d-block">
	        				<p><?=substr( $drink['description'],0,100) ?></p>
	        			</div>
	        		</div>
        		</div>
				<?php }?>
        		
        		</div>
 
        </div>
    	</div>
    </section>

    <section class="mb-5 pb-5 ftco-menu">
    	<div class="container">
    		<div class="justify-content-center mb-5 row">
          <div class="text-center col-md-7 heading-section ftco-animate">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    		<div class="d-md-flex row">
	    		<div class="p-md-5 col-lg-12 ftco-animate">
		    		<div class="row">
		          <div class="mb-5 col-md-12 nav-link-wrap">
		            <div class="justify-content-center nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

		              <a class="nav-link active" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>
		            </div>
		          </div>
		          <div class="d-flex align-items-center col-md-12">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              

		              <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">
								<?php foreach ($drinks as $drink) { ?>
		              		<div class="text-center col-md-4">
		              			<div class="menu-wrap">
		              			<a href="products/product-single.php?id=<?= $drink['id'] ?>" class="mb-4 img menu-img" style="background-image: url('<?= APIURL ?>/images/<?= $drink['image'] ?>');"></a>
		              				<div class="text">
		              					<h3><a href="products/product-single.php?id=<?= $drink['id'] ?>"><?= $drink['name'] ?></a></h3>
		              					<p><?= substr($drink['description'],0,100) ?></p>
		              					<p class="price"><span>$<?= $drink['price'] ?></span></p>
		              					<p><a href="products/product-single.php?id=<?= $drink['id'] ?>" class="btn-outline-primary btn btn-primary">View More</a></p>
		              				</div>
		              			</div>
		              		</div>
							<?php }?>
		              		
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
		              		<?php foreach ($desserts as $dessert) { ?>
		              		<div class="text-center col-md-4">
		              			<div class="menu-wrap">
		              			<a href="products/product-single.php?id=<?= $dessert['id'] ?>" class="mb-4 img menu-img" style="background-image: url('<?= APIURL ?>/images/<?= $dessert['image'] ?>');"></a>
		              				<div class="text">
		              					<h3><a href="products/product-single.php?id=<?= $dessert['id'] ?>"><?= $dessert['name'] ?></a></h3>
		              					<p><?= substr($dessert['description'],0,100) ?></p>
		              					<p class="price"><span>$<?= $dessert['price'] ?></span></p>
		              					<p><a href="products/product-single.php?id=<?= $dessert['id'] ?>" class="btn-outline-primary btn btn-primary">View More</a></p>
		              				</div>
		              			</div>
		              		</div>
							<?php }?>
		              		
		              	</div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>

  <?php include_once('includes/footer.php');
 ?>