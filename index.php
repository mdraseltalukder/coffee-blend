<?php
include_once('includes/header.php');
include_once('config/config.php');


$select= "SELECT * FROM products";
$result = $conn->query($select);
$products = $result->fetch_all(MYSQLI_ASSOC);

$reviewsQuery= "SELECT * FROM reviews";
$run= $conn->query($reviewsQuery);
$reviews= $run->fetch_all(MYSQLI_ASSOC);



?>

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="align-items-center justify-content-center row slider-text" data-scrollax-parent="true">

            <div class="text-center col-md-8 col-sm-12 ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">The Best Coffee Testing Experience</h1>
              <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <p><a href="#" class="p-3 px-xl-4 py-xl-3 btn btn-primary">Order Now</a> <a href="menu.php" class="p-3 px-xl-4 py-xl-3 btn-outline-white btn btn-white">View Menu</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="align-items-center justify-content-center row slider-text" data-scrollax-parent="true">

            <div class="text-center col-md-8 col-sm-12 ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
              <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <p><a href="#" class="p-3 px-xl-4 py-xl-3 btn btn-primary">Order Now</a> <a href="#" class="p-3 px-xl-4 py-xl-3 btn-outline-white btn btn-white">View Menu</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="align-items-center justify-content-center row slider-text" data-scrollax-parent="true">

            <div class="text-center col-md-8 col-sm-12 ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
              <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <p><a href="#" class="p-3 px-xl-4 py-xl-3 btn btn-primary">Order Now</a> <a href="#" class="p-3 px-xl-4 py-xl-3 btn-outline-white btn btn-white">View Menu</a></p>
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
		              <input type="submit" value="Book a table" class="px-4 py-3 btn btn-white" name="book">
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

    <section class="d-md-flex ftco-about">
    	<div class="one-half img" style="background-image: url(images/about.jpg);"></div>
    	<div class="one-half ftco-animate">
    		<div class="overlap">
	        <div class="heading-section ftco-animate">
	        	<span class="subheading">Discover</span>
	          <h2 class="mb-4">Our Story</h2>
	        </div>
	        <div>
	  				<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
	  			</div>
  			</div>
    	</div>
    </section>

    <section class="ftco-section ftco-services">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="block-6 d-block text-center media services">
              <div class="d-flex align-items-center justify-content-center mb-5 icon">
              	<span class="flaticon-choices"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Easy to Order</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="block-6 d-block text-center media services">
              <div class="d-flex align-items-center justify-content-center mb-5 icon">
              	<span class="flaticon-delivery-truck"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Fastest Delivery</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="block-6 d-block text-center media services">
              <div class="d-flex align-items-center justify-content-center mb-5 icon">
              	<span class="flaticon-coffee-bean"></span></div>
              <div class="media-body">
                <h3 class="heading">Quality Coffee</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>    
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="align-items-center row">
    			<div class="pr-md-5 col-md-6">
    				<div class="text-md-right heading-section ftco-animate">
	          	<span class="subheading">Discover</span>
	            <h2 class="mb-4">Our Menu</h2>
	            <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
	            <p><a href="menu.php" class="px-4 py-3 btn-outline-primary btn btn-primary">View Full Menu</a></p>
	          </div>
    			</div>
    			<div class="col-md-6">
    				<div class="row">
    					<div class="col-md-6">
    						<div class="menu-entry">
		    					<a href="#" class="img" style="background-image: url(images/menu-1.jpg);"></a>
		    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="mt-lg-4 menu-entry">
		    					<a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
		    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry">
		    					<a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
		    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="mt-lg-4 menu-entry">
		    					<a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
		    				</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-bg-dark ftco-counter img" id="section-counter" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="justify-content-center row">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="d-flex justify-content-center col-md-6 col-lg-3 counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="100">0</strong>
		              	<span>Coffee Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="d-flex justify-content-center col-md-6 col-lg-3 counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="85">0</strong>
		              	<span>Number of Awards</span>
		              </div>
		            </div>
		          </div>
		          <div class="d-flex justify-content-center col-md-6 col-lg-3 counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="10567">0</strong>
		              	<span>Happy Customer</span>
		              </div>
		            </div>
		          </div>
		          <div class="d-flex justify-content-center col-md-6 col-lg-3 counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="900">0</strong>
		              	<span>Staff</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="justify-content-center mb-5 pb-3 row">
          <div class="text-center col-md-7 heading-section ftco-animate">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Best Coffee Sellers</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
		<?php 
		foreach($products as $product){ 
			$name= $product['name'];
			$image= $product['image'];
			$description= $product['description'];
			$price= $product['price'];
			$id= $product['id'];

			?>
			<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="products/product-single.php?id=<?= $id ?>" class="img" style="background-image: url('<?= APIURL ?>/images/<?= $image ?>');"></a>
    					<div class="pt-4 text-center text">
    						<h3><a href="products/product-single.php?id=<?= $id ?>"><?= $name ?></a></h3>
    						<p><?= substr($description, 0, 100) ?>...</p>
    						<p class="price"><span>$<?= $price ?></span></p>
    						<p><a href="products/product-single.php?id=<?= $id ?>" class="btn-outline-primary btn btn-primary">View More</a>
</p>
    					</div>
    				</div>
        	</div>
		<?php }
		?>	

        	
        	<!-- <div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url(images/menu-2.jpg);"></a>
    					<div class="pt-4 text-center text">
    						<h3><a href="#">Coffee Capuccino</a></h3>
    						<p>A small river named Duden flows by their place and supplies</p>
    						<p class="price"><span>$5.90</span></p>
    						<p><a href="#" class="btn-outline-primary btn btn-primary">Add to Cart</a></p>
    					</div>
    				</div>
        	</div>
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url(images/menu-3.jpg);"></a>
    					<div class="pt-4 text-center text">
    						<h3><a href="#">Coffee Capuccino</a></h3>
    						<p>A small river named Duden flows by their place and supplies</p>
    						<p class="price"><span>$5.90</span></p>
    						<p><a href="#" class="btn-outline-primary btn btn-primary">Add to Cart</a></p>
    					</div>
    				</div>
        	</div>
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url(images/menu-4.jpg);"></a>
    					<div class="pt-4 text-center text">
    						<h3><a href="#">Coffee Capuccino</a></h3>
    						<p>A small river named Duden flows by their place and supplies</p>
    						<p class="price"><span>$5.90</span></p>
    						<p><a href="#" class="btn-outline-primary btn btn-primary">Add to Cart</a></p>
    					</div>
    				</div>
        	</div> -->
        </div>
    	</div>
    </section>

    <section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="d-flex align-items-center gallery img" style="background-image: url(images/gallery-1.jpg);">
							<div class="d-flex align-items-center justify-content-center mb-4 icon">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="d-flex align-items-center gallery img" style="background-image: url(images/gallery-3.jpg);">
							<div class="d-flex align-items-center justify-content-center mb-4 icon">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="d-flex align-items-center gallery img" style="background-image: url(images/gallery-3.jpg);">
							<div class="d-flex align-items-center justify-content-center mb-4 icon">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="gallery.html" class="d-flex align-items-center gallery img" style="background-image: url(images/gallery-4.jpg);">
							<div class="d-flex align-items-center justify-content-center mb-4 icon">
    						<span class="icon-search"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>

    

    <section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);"  data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
	    <div class="container">
	      <div class="justify-content-center mb-5 row">
	        <div class="text-center col-md-7 heading-section ftco-animate">
	        	<span class="subheading">Testimony</span>
	          <h2 class="mb-4">Customers Says</h2>
	          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	        </div>
	      </div>
	    </div>
	    <div class="container-wrap">
	      <div class="d-flex row no-gutters">
			<?php foreach($reviews as $review){?>
	        <div class="align-self-sm-end col-lg ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;<?= $review['review'] ?>&rdquo;</p>
	              </blockquote>
	              <div class="d-flex mt-4 author">
	               
	                <div class="align-self-center name"><?= $review['username'] ?></div>
	              </div>
	          </div>
	        </div>
			<?php }?>
	        <!-- <div class="align-self-sm-end col-lg">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
	              </blockquote>
	              <div class="d-flex mt-4 author">
	                <div class="align-self-center mr-3 image">
	                  <img src="images/person_2.jpg" alt="">
	                </div>
	                <div class="align-self-center name">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="align-self-sm-end col-lg ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small  line of blind text by the name. &rdquo;</p>
	              </blockquote>
	              <div class="d-flex mt-4 author">
	                <div class="align-self-center mr-3 image">
	                  <img src="images/person_3.jpg" alt="">
	                </div>
	                <div class="align-self-center name">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="align-self-sm-end col-lg">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however.&rdquo;</p>
	              </blockquote>
	              <div class="d-flex mt-4 author">
	                <div class="align-self-center mr-3 image">
	                  <img src="images/person_2.jpg" alt="">
	                </div>
	                <div class="align-self-center name">Louise Kelly <span class="position">Illustrator Designer</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="align-self-sm-end col-lg ftco-animate">
	          <div class="testimony">
	            <blockquote>
	              <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small  line of blind text by the name. &rdquo;</p>
	            </blockquote>
	            <div class="d-flex mt-4 author">
	              <div class="align-self-center mr-3 image">
	                <img src="images/person_3.jpg" alt="">
	              </div>
	              <div class="align-self-center name">Louise Kelly <span class="position">Illustrator Designer</span></div>
	            </div>
	          </div>
	        </div> -->
	      </div>
	    </div>
	  </section>

   
<?php include_once('includes/footer.php');?>
		
	
