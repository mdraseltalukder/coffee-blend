<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');
// show orders 

$select= "SELECT * FROM booking";
$run= $conn->query($select);
$bookings =$run ->fetch_all(MYSQLI_ASSOC);






?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="d-inline mb-4 card-title">Bookings</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">first_name</th>
                    <th scope="col">last_name</th>
                    <th scope="col">date</th>
                    <th scope="col">time</th>
                    <th scope="col">phone</th>
                    <th scope="col">message</th>
                    <th scope="col">status</th>
                    <th scope="col">change status</th>
                    <th scope="col">created_at</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($bookings as $booking) {?>
                  <tr>
                    <th scope="row"><?= $booking['id'] ?></th>
                    <td><?= $booking['fname'] ?></td>
                    <td><?= $booking['lname'] ?></td>
                    <td><?= $booking['date'] ?></td>
                    <td><?= $booking['time'] ?></td>
                    <td><?= $booking['phone'] ?></td>
                    <td><?= substr($booking['massage'],0,50) ?>...</td>
                    <td><?= $booking['status'] ?></td>

                     <td><a href="change-status.php?id=<?= $booking['id'] ?>" class="text-center btn btn-success">change status</a></td>

                    <td><?= $booking['created_at'] ?></td>
                     <td><a href="delete-bookings.php?id=<?= $booking['id'] ?>" class="text-center btn btn-danger">delete</a></td>
                  </tr>
              <?php }?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



  </div>
<script type="text/javascript">

</script>
</body>
</html>