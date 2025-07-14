
<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');


$select= "SELECT * FROM `status`";
$run= $conn->query($select);
$status= $run->fetch_all(MYSQLI_ASSOC);

// insert admins
if(isset($_POST['submit'])){
    $update = $_POST['update'];

    $update= "UPDATE orders SET status='$update' WHERE id=" . intval($_GET['id']);
    $run= $conn->query($update);
    $conn->close();
    header("location:show-orders.php");

  



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


          <form method="POST" action="" enctype="">
                <!-- select input -->
          <div class="mt-4 mb-4 form-outline">

                <select name="update" class="form-select form-control" aria-label="Default select example">

  <?php foreach ($status as $stat): ?>
    <option value="<?= $stat['status_title']; ?>"><?= $stat['status_title']; ?></option>
  <?php endforeach; ?>
</select>

                </div>
                

                
                <!-- Submit button -->
                <button type="submit" name="submit" class="mb-4 text-center btn btn-primary">Update</button>

          
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