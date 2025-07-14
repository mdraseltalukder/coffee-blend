<?php 
include_once('../includes/header.php');
include_once('../config/config.php');

$isAdded = false;
$id = $_GET['id'] ?? null;

if ($id) {
    // প্রোডাক্ট ডাটা নিয়ে আসা
    $select= "SELECT * FROM products WHERE id=" . intval($id);
    $result = $conn->query($select);

    if($result && $result->num_rows > 0){
        $products = $result->fetch_assoc();

        $relatedProductQuery = "SELECT * FROM products WHERE type='" . $conn->real_escape_string($products['type']) . "' AND id!=" . intval($id);
        $relatedProduct = $conn->query($relatedProductQuery);
        if($relatedProduct && $relatedProduct->num_rows > 0){
            $relatedSingleProduct = $relatedProduct->fetch_all(MYSQLI_ASSOC);
        } else {
            $relatedSingleProduct = [];
        }

        $name = $products['name'];
        $image = $products['image'];
        $price = $products['price'];
        $description = $products['description'];

    } else {
        echo "Product not found";
        exit;
    }

    // কার্টে আগেই আছে কিনা চেক (পেজ লোডেই)
    if(isset($_SESSION['user']['id'])){
        $user_id = $_SESSION['user']['id'];
        $checkCartQuery = "SELECT * FROM cart WHERE user_id = '$user_id' AND pro_id = '$id'";
        $checkResult = $conn->query($checkCartQuery);

        if($checkResult && $checkResult->num_rows > 0){
            $isAdded = true;
        }
    }

    // ফর্ম সাবমিট হলে প্রোডাক্ট কার্টে যোগ করা
    if(isset($_POST['add-to-cart'])){
        // আবার চেক করো কার্টে আছে কিনা, ডুপ্লিকেট এন্ট্রি থেকে বাঁচার জন্য
        $checkCartQuery = "SELECT * FROM cart WHERE user_id = '$user_id' AND pro_id = '$id'";
        $checkResult = $conn->query($checkCartQuery);

        if($checkResult && $checkResult->num_rows == 0){
            $quantity = intval($_POST['quantity']);
            $insertQuery = "INSERT INTO cart(name, image, price, description, quantity, user_id, pro_id)
                            VALUES('".$conn->real_escape_string($name)."',
                                   '".$conn->real_escape_string($image)."',
                                   '".$price."',
                                   '".$conn->real_escape_string($description)."',
                                   $quantity,
                                   '$user_id',
                                   '$id')";
            $run = $conn->query($insertQuery);

            if($run){
                $_SESSION['success'] = "Product added to cart";
                $isAdded = true;
            } else {
                $_SESSION['error'] = "Product not added to cart";
            }
        } else {
            $_SESSION['error'] = "Product already in cart";
            $isAdded = true;
        }
    }

} else {
    echo "Invalid product ID";
    header("Location: " . APIURL . "index.php");
    exit;
}

?>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(<?= APIURL ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="align-items-center justify-content-center row slider-text">
        <div class="text-center col-md-7 col-sm-12 ftco-animate">
          <h1 class="mt-5 mb-3 bread">Product Detail</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="<?= APIURL ?>">Home</a></span> <span>Product Detail</span></p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="mb-5 col-lg-6 ftco-animate">
        <a href="<?= APIURL ?>/images/<?= htmlspecialchars($image) ?>" class="image-popup">
          <img src="<?= APIURL ?>/images/<?= htmlspecialchars($image) ?>" class="img-fluid" alt="<?= htmlspecialchars($name) ?>">
        </a>
      </div>
      <div class="pl-md-5 col-lg-6 product-details ftco-animate">
        <h3><?= htmlspecialchars($name) ?></h3>
        <p class="price"><span>$<?= htmlspecialchars($price) ?></span></p>
        <p><?= htmlspecialchars($description) ?></p>

        <div class="mt-4 row">
          <div class="col-md-6">
            <div class="form-group d-flex">
              <div class="select-wrap">
                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                <select name="" id="" class="form-control">
                  <option value="">Small</option>
                  <option value="">Medium</option>
                  <option value="">Large</option>
                  <option value="">Extra Large</option>
                </select>
              </div>
            </div>
          </div>
          <div class="w-100"></div>

          <!-- form add to cart -->
          <form action="" method="POST">
            <div class="input-group d-flex mb-3 col-md-6">
              <span class="input-group-btn mr-2">
                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                  <i class="icon-minus"></i>
                </button>
              </span>
              <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
              <span class="input-group-btn ml-2">
                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                  <i class="icon-plus"></i>
                </button>
              </span>
            </div>

            <input type="hidden" name="name" value="<?= htmlspecialchars($name) ?>" >
            <input type="hidden" name="image" value="<?= htmlspecialchars($image) ?>" >
            <input type="hidden" name="price" value="<?= htmlspecialchars($price) ?>" >
            <input type="hidden" name="description" value="<?= htmlspecialchars($description) ?>" >

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


<?php if(isset($_SESSION['user'])){?>
            <?php if($isAdded){ ?>
              <input value="Added to Cart" class="px-5 py-3 btn btn-primary" type="submit" name="add-to-cart" disabled>
            <?php } else { ?>
              <input value="Add to Cart" class="px-5 py-3 btn btn-primary" type="submit" name="add-to-cart">
            <?php } ?>
            <?php }else{?>
<p>Login First To add-to-cart Products</p>
              <?php }?>
          </form>

      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="justify-content-center mb-5 pb-3 row">
      <div class="text-center col-md-7 heading-section ftco-animate">
        <span class="subheading">Discover</span>
        <h2 class="mb-4">Related products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>
    <div class="row">
    <?php 
    if (!empty($relatedSingleProduct)) {
        foreach($relatedSingleProduct as $product){
    ?>
        <div class="col-md-3">
            <div class="menu-entry">
                <a href="<?= APIURL ?>/products/product-single.php?id=<?= htmlspecialchars($product['id']) ?>" class="img" style="background-image: url(../images/<?= htmlspecialchars($product['image']) ?>);"></a>
                <div class="pt-4 text-center text">
                    <h3><a href="<?= APIURL ?>/products/product-single.php?id=<?= htmlspecialchars($product['id']) ?>"><?= htmlspecialchars($product['name']) ?></a></h3>
                    <p><?= htmlspecialchars(substr($product['description'], 0, 100)) ?>...</p>
                    <p class="price"><span><?= htmlspecialchars($product['price']) ?></span></p>
                    <p><a href="<?= APIURL ?>/products/product-single.php?id=<?= htmlspecialchars($product['id']) ?>" class="btn-outline-primary btn btn-primary">Show Product</a></p>
                </div>
            </div>
        </div>
    <?php 
        }
    } else {
        echo "<p class='text-center'>No related product found</p>";
    }
    ?>
    </div>
  </div>
</section>

<?php 
include_once('../includes/footer.php');  
?>
