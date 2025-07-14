    
<?php 
include_once('layouts/header.php');
include_once('../config/config.php');

if(!isset($_SESSION['admin'])){
   header("Location: ". ADMINURL ."/admins/login-admins.php");
  exit();
}
// products
$select= "SELECT COUNT(*) as count FROM products";
$run= $conn->query($select);
$productCount = $run->fetch_assoc();
// orders 
$select= "SELECT COUNT(*) as count FROM orders";
$run= $conn->query($select);
$orderCount = $run->fetch_assoc();
// bookings 
$select= "SELECT COUNT(*) as count FROM booking";
$run= $conn->query($select);
$bookingCount = $run->fetch_assoc();
// admins 
$select= "SELECT COUNT(*) as count FROM admins";
$run= $conn->query($select);
$adminsCount = $run->fetch_assoc();



?>

      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <!-- <h6 class="mb-2 text-muted card-subtitle">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of products: <?= $productCount['count'] ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Orders</h5>
              
              <p class="card-text">number of orders: <?= $orderCount['count'] ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              
              <p class="card-text">number of bookings: <?= $bookingCount['count'] ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?= $adminsCount['count'] ?></p>
              
            </div>
          </div>
        </div>
      </div>
     <!--  <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->
           
<?php 
include_once 'layouts/footer.php';?>