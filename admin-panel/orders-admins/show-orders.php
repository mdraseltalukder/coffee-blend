<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');
// show orders 

$select= "SELECT * FROM orders";
$run= $conn->query($select);
$orders =$run ->fetch_all(MYSQLI_ASSOC);






?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="d-inline mb-4 card-title">Orders</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">first_name</th>
                    
                    <th scope="col">town</th>
                    <th scope="col">state</th>
                    <th scope="col">zip_code</th>
                    <th scope="col">phone</th>
                    <th scope="col">street_address</th>
                    <th scope="col">total_price</th>
                    <th scope="col">status</th>
                    <th scope="col">Update Status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($orders as $order){?>
                  <tr>
                    <th scope="row"><?= $order['id'] ?></th>
                    <td><?= $order['fname'] ?></td>
                    
                    <td><?= $order['city'] ?></td>
                    <td><?= $order['state'] ?></td>
                    <td>
                        <?= $order['pincode'] ?>
                    </td>
                    <td><?= $order['phone'] ?></td>
                    
                    <td><?= $order['address'] ?></td>
                    <td>$<?= $order['total_price'] ?></td>

                    <td><?= $order['status'] ?></td>
                    <td><a href="update-orders.php?id=<?= $order['id'] ?>" class="text-center btn btn-success">Update</a></td>
                    <td><a href="delete-orders.php?id=<?= $order['id'] ?>" class="text-center btn btn-danger">delete</a></td>
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