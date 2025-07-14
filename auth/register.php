<?php include_once('../includes/header.php');

include('../config/config.php');

// if(user exists)
if(isset($_SESSION['user'])){
  header("Location:". APIURL ."");
  exit();
}

if(isset($_POST['submit'])){
  if(empty($_POST['username'])){
    $_SESSION['error'] = "Username is required";
  }else if(empty($_POST['email'])){
    $_SESSION['error'] = "Email is required";
  }else if(empty($_POST['password'])){
    $_SESSION['error'] = "Password is required";
  }else{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass=password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$pass')";
  $result = $conn->query($sql);
  if ($result) {
    $_SESSION['success'] = "Registration successful";
    header('Location: login.php');
    exit();
  } else {
    $_SESSION['error'] = "Registration failed";
  }
}
}

?>

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?= APIURL ?>/images/bg_2.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="align-items-center justify-content-center row slider-text">

            <div class="text-center col-md-7 col-sm-12 ftco-animate">
            	<h1 class="mt-5 mb-3 bread">Register</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Register</span></p>
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
				<h3 class="mb-4 billing-heading">Register</h3>
	          	<div class="align-items-end row">
                 <div class="col-md-12">
                        <div class="form-group">
                            <label for="Username">Username</label>
                          <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                 </div>
	          	  <div class="col-md-12">
	                <div class="form-group">
	                	<label for="Email">Email</label>
	                  <input type="text" class="form-control" placeholder="Email" name="email">
	                </div>
	              </div>
                 
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="Password">Password</label>
	                    <input type="password" class="form-control" placeholder="Password" name="password">
	                </div>

                </div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
							<div class="radio">
                <?php 
                // show session message
              if (isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
    unset($_SESSION['success']);
}
                ?>
                                <button class="px-4 py-3 btn btn-primary" name="submit" type="submit">Register</button>
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