
<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');

if(isset($_POST['create'])){

  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  $type = $_POST['type'];

  $image = $_FILES['image'];
  $imageName=$_FILES['image']['name'];
  $tmpName = $_FILES['image']['tmp_name'];




$dir="images/" . basename($imageName);
if(move_uploaded_file($tmpName,$dir)){

  $insert = "INSERT INTO products(name,image,description,type,price) VALUES('$name','$imageName','$description','$type','$price')";
  $run = $conn->query($insert);
  $conn->close();
  header("location: ". ADMINURL ."/products-admins/show-products.php");
}



}



?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="d-inline mb-5 card-title">Create Product</h5>
          <form method="POST" action="" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="mt-4 mb-4 form-outline">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="mt-4 mb-4 form-outline">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                 
                </div>
                <div class="mt-4 mb-4 form-outline">
                  <input type="file" name="image" id="form2Example1" class="form-control"  />
                 
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                </div>
               
                <div class="mt-4 mb-4 form-outline">

                  <select name="type" class="form-select form-control" name="type" aria-label="Default select example">
                    <option selected>Choose Type</option>
                    <option value="drink">drink</option>
                    <option value="dessert">dessert</option>
                  </select>
                </div>

                <br>
              

      
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