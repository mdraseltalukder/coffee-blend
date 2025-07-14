<?php 
include_once('../includes/header.php');
include_once('../config/config.php');

if(!isset($_SESSION['user'])){
	header("Location:". APIURL ."");
}

if(isset($_POST['write_review'])){

$review= $_POST['review'];
$username= $_SESSION['user']['username'];

$insert= "INSERT INTO reviews (username, review) VALUES ('$username', '$review')";
$run= $conn->query($insert);

if($run){
    $_SESSION['success'] = "Review added successfully";
    header("Location:". APIURL ."/reviews/write-review.php");
    exit();
}else{
    $_SESSION['error'] = "Review not added";
    header("Location:". APIURL ."/reviews/write-review.php");
    exit();


}
}













?>

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?= APIURL ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="align-items-center justify-content-center row slider-text">

            <div class="text-center col-md-7 col-sm-12 ftco-animate">
            	<h1 class="mt-5 mb-3 bread">Write Review</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="<?= APIURL ?>">Home</a></span> <span>Write Review</span></p>
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
							<h3 class="mb-4 billing-heading">Write Review</h3>
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
	          		<div class="col-md-12">
	                <div class="form-group">
                       
	                	<label for="review">Review</label>
	                  <input type="text" id="review" class="form-control" name="review" value="<?= $review ?? "" ?>" placeholder="">
	                </div>
	             
		            
		            
                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
                      <button class="px-4 py-3 btn btn-primary" type="submit" name="write_review">Place an order</button>

										</div>
									</div>
                </div>
	            </div>
	          </form><!-- END -->


          </div> <!-- .col-md-8 -->

           
          </div>

        </div>
      </div>
    </section> <!-- .section -->

   <?php 
 include_once('../includes/footer.php');  
   ?>