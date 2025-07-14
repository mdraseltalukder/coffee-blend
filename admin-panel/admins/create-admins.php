
<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');

// insert admins
if(isset($_POST['create'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  if(empty($username)){
    $_SESSION['error'] = "username is required";
  }elseif(empty($email)){
    $_SESSION['error'] = "email is required";
  }elseif(empty($password)){
    $_SESSION['error'] = "password is required";
  }else{
    $pass=password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO admins (username, email, password) VALUES ('$username', '$email', '$pass')";
    $result = $conn->query($sql);
    if ($result) {
      $_SESSION['success'] = "Registration successful";
      header('Location:'. ADMINURL .'/admins/admins.php');
      exit();
    } else {
      $_SESSION['error'] = "Registration failed";
    }
  }


}
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="d-inline mb-5 card-title">Create Admins</h5>
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


          <form method="POST" action="" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="mt-4 mb-4 form-outline">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                 
                </div>

                <div class="mb-4 form-outline">
                  <input type="text" name="username" id="form2Example1" class="form-control" placeholder="username" />
                </div>
                <div class="mb-4 form-outline">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                </div>
                <!-- Submit button -->
                <button type="submit" name="create" class="mb-4 text-center btn btn-primary">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
<script type="text/javascript">

</script>
</body>
</html>