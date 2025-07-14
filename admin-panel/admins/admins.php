
<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');

$select= "SELECT * FROM admins";
$run= $conn->query($select);
$admins =$run ->fetch_all(MYSQLI_ASSOC);


?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="d-inline mb-4 card-title">Admins</h5>
             <a  href="create-admins.php" class="float-right mb-4 text-center btn btn-primary">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($admins as $admin){?>
                  <tr>
                    <th scope="row"><?= $admin['id'] ?></th>
                    <td><?= $admin['username'] ?></td>
                    <td><?= $admin['email'] ?></td>
                   
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