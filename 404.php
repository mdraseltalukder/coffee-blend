<?php 
include_once('includes/header.php');
include_once('config/config.php');
define("APPURL", "http://localhost/dashboard/Projects/Udemi/coffee-blend/");
echo APPURL;
?>
<style>
    body {
      background-color: #f8f9fa;
    }
    .error-container {
      height: 100vh;
    }
    .error-code {
      font-size: 8rem;
      font-weight: 700;
      color: #0d6efd;
    }
    .error-message {
      font-size: 1.5rem;
      color: #6c757d;
    }
    .btn-custom {
      margin-top: 20px;
    }
  </style>


  <div class="d-flex flex-column align-items-center justify-content-center text-center container error-container">
    <div class="error-code">404</div>
    <div class="mb-3 error-message">Oops! The page you're looking for doesn't exist.</div>
    <a href="<?php echo APPURL ?>" class="btn btn-primary btn-custom">Go to Homepage</a>
  </div>
<?php 
include_once('includes/footer.php');




?>