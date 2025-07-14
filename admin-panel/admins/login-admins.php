<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');

?>
<?php 
if(isset($_SESSION['admin'])){
  header("Location: " . ADMINURL);
exit();
}

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email)){
  $_SESSION['error'] = "Email is required";
}else if(empty($password)){
  $_SESSION['error'] = "Password is required";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $_SESSION['error'] = "Invalid email format";
}else{
  $sql = "SELECT * FROM admins WHERE email = '$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();
    if (password_verify($password, $admin['password'])) {
    $_SESSION['admin'] = $admin;
   header("Location: " . ADMINURL);
exit();
    } else {
    $_SESSION['error'] = "Invalid password";
    }
    } else {
    $_SESSION['error'] = "Invalid Admin";

}
}
}






?>






      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="mt-5 card-title">Login</h5>
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
              <form method="POST" class="p-auto" >
                  <!-- Email input -->
                  <div class="mb-4 form-outline">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="mb-4 form-outline">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="login" class="mb-4 text-center btn btn-primary">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
    </div>
</div>