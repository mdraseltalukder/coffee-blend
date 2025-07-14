<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');
// show products 

$select= "SELECT * FROM products";
$result = $conn->query($select);
$products = $result->fetch_all(MYSQLI_ASSOC);




?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="d-inline mb-4 card-title">Foods</h5>
              <a  href="create-products.php" class="float-right mb-4 text-center btn btn-primary">Create Products</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">description</th>
                    <th scope="col">price</th>
                    <th scope="col">type</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
<?php foreach($products as $product){?>

                  <tr>
                     <th scope="row"><?php echo $product['id']; ?></th>
                     <td><?php echo $product['name']; ?></td>
                     <td><img src="images/<?php echo $product['image']; ?>" alt="<?= $product['name'] ?>" style="width: 60px; height: 60px;"></td>
                     <td><?php echo substr($product['description'],0,50); ?>...</td>
                     <td>$<?php echo $product['price']; ?></td>
                     <td><?php echo $product['type']; ?></td>
                     <td><a href="delete-products.php?id=<?= $product['id'] ?>" class="text-center btn btn-danger">delete</a></td>
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