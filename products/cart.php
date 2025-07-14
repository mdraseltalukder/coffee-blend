<?php 
include_once('../includes/header.php');
include_once('../config/config.php');

// if(user exists)
if(!isset($_SESSION['user'])){
  header("Location:". APIURL ."/auth/login.php");
  exit();
}


$selectProduct= "SELECT * FROM cart WHERE user_id=" . intval($_SESSION['user']['id']);
$result = $conn->query($selectProduct);
if($result && $result->num_rows > 0){
$products = $result->fetch_all(MYSQLI_ASSOC);
}else{
  $products = [];
}



// subtotal price

$subtotalquery="SELECT SUM( `quantity`*`price`) AS total FROM `cart` WHERE user_id=" . intval($_SESSION['user']['id']);
$run= $conn->query($subtotalquery);
if($run && $run->num_rows > 0){
  $subtotal = $run->fetch_assoc();
}else{
  $subtotal = [];
}

// delete

if(isset($_POST['delete'])){
	$id= $_POST['id'];
	$deleteQuery = "DELETE FROM cart WHERE pro_id = '$id'";
	$run = $conn->query($deleteQuery);
	if($run){
		$_SESSION['success'] = "Product deleted from cart";
		header("Location:". APIURL ."/products/cart.php");
		exit();
	}else{
		$_SESSION['error'] = "Product not deleted from cart";
		header("Location:". APIURL ."/products/cart.php");
		exit();
	}
}


	if(isset($_POST['checkout'])){
	
 $_SESSION['total'] = $_POST['total'];
 

header("Location:". APIURL ."/products/checkout.php");
		
	}
	







?>

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?= APIURL ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="align-items-center justify-content-center row slider-text">

            <div class="text-center col-md-7 col-sm-12 ftco-animate">
            	<h1 class="mt-5 mb-3 bread">Cart</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="<?= APIURL ?>">Home</a></span> <span>Cart</span></p>
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
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
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
								<?php if(empty($products)):?>
									<p>Your cart is empty</p>
								<?php endif; ?>

								<?php foreach ($products as $product) {
									$quantity = (int)$product['quantity'];
$price = (float)$product['price']; 

$total = $quantity * $price;

									?>
						      <tr class="text-center">
						       <td class="product-remove">
        <form action="" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?= $product['pro_id'] ?>">
            <button class="close" name="delete" type="submit"><span class="icon-close"></span></button>
        </form>
    </td>

						        
						        <td class="image-prod"><div class="img" style="background-image:url(<?= APIURL ?>/images/<?= $product['image'] ?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?= $product['name'] ?></h3>
						        	<p><?= substr($product['description'],0,100) ?></p>
						        </td>
						        
						        <td class="price">$<?= $product['price'] ?></td>
						        
						        <td>
									<div class="input-group mb-3">
										<input disabled type="text" name="quantity" class="quantity form-control input-number" value="<?= $product['quantity'] ?>" min="1" max="100">
									 </div>
					            </td>
						     
					<td class="total">$
    <?= number_format($total, 2) ?>
</td>
						      </tr>
							     <?php }?>
							  <!-- END TR-->

						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="justify-content-end row">
    			<div class="mt-5 col col-lg-3 col-md-6 cart-wrap ftco-animate">
    				<div class="mb-3 cart-total">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>$<?= number_format($subtotal['total'] , 2) ?></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$10.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>$3.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
							<?php if($subtotal['total']>0){?>
    						<span>$<?= number_format($subtotal['total'] , 2)+10-3 ?></span>
							<?php }else{?><span>$0.00</span><?php }?>
    					</p>
    				</div>
					<!-- hidden total -->
					<form action="" method="POST">
				<input type="hidden" name="total" value="<?= number_format($subtotal['total'] , 2)+10-3 ?>">
				
<?php if($subtotal['total']>0){?>
    				<button class="btn btn-primary" name="checkout">
						<span  class="px-4 py-3 btn btn-primary">Proceed to Checkout</span>
					</button>
				<?php }?>
					
				</form>
    			</div>
    		</div>
			</div>
		</section>

    <!-- <section class="ftco-section">
    	<div class="container">
    		<div class="justify-content-center mb-5 pb-3 row">
          <div class="text-center col-md-7 heading-section ftco-animate">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Related products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-3">
        		<div class="menu-entry">
    					<a href="#" class="img" style="background-image: url(<?= APIURL ?>/images/menu-1.jpg);"></a>
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
    					<a href="#" class="img" style="background-image: url(<?= APIURL ?>/images/menu-2.jpg);"></a>
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
    					<a href="#" class="img" style="background-image: url(<?= APIURL ?>/images/menu-3.jpg);"></a>
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
    					<a href="#" class="img" style="background-image: url(<?= APIURL ?>/images/menu-4.jpg);"></a>
    					<div class="pt-4 text-center text">
    						<h3><a href="#">Coffee Capuccino</a></h3>
    						<p>A small river named Duden flows by their place and supplies</p>
    						<p class="price"><span>$5.90</span></p>
    						<p><a href="#" class="btn-outline-primary btn btn-primary">Add to Cart</a></p>
    					</div>
    				</div>
        	</div>
        </div>
    	</div>
    </section> -->

  
   <?php 
 include_once('../includes/footer.php');  
   ?>
   <?php ob_end_flush(); 
  

  ?>