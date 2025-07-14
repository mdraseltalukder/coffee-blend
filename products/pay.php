
<!-- chatgpt style -->
 <?php include '../paypal-payment/config.php'; 
 include_once('../includes/header.php');
 include_once('../config/config.php');
 define("APPURL", "http://localhost/dashboard/Projects/Udemi/coffee-blend/");


// kew url e type kore ei page e asle index e redirect kore dibe
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('Location: http://localhost/dashboard/Projects/Udemi/coffee-blend');
    exit;
}

// if(user exists)
if(!isset($_SESSION['user'])){
  header("Location:". APIURL ."/auth/login.php");
  exit();
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <title>PayPal Payment</title>
</head>
<body>

<h2 class="mt-5 pt-5">Product: Basic Web Development Service</h2>
<p>Price: $<?=$_SESSION['total'] ?> USD</p>

<!-- Load PayPal SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $paypalConfig['client_id']; ?>&currency=USD"></script>

<!-- PayPal Button -->
<div id="paypal-button-container"></div>

<script>
      const priceValue = "<?php echo number_format($_SESSION['total'], 2, '.', ''); ?>";
  console.log("PayPal price value:", priceValue);
paypal.Buttons({
    style: {
        shape: "rect",
        layout: "vertical",
        color: "blue",
        label: "paypal"
    },
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: priceValue
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            // Redirect after success
window.location.href = "<?php echo APPURL; ?>/paypal-payment/delete.php?name=" + details.payer.name.given_name;

            // window.location.href = "<?php echo APPURL; ?>/paypal-payment/success.php?name=" + details.payer.name.given_name;
        });
    },
    onCancel: function(data) {
        // Redirect if cancelled
        window.location.href = "<?php echo APPURL; ?>/paypal-payment/cancel.php";
    }
}).render('#paypal-button-container');
</script>


</body>
</html>












<!-- udemy style -->
<!-- <!doctype html>
<html lang="en">
  <head>
  // Required meta tags 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    // Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>
    <title>Pay Page</title>
  </head>
  <body>

    <nav class="bg-dark navbar navbar-expand-lg navbar-light" >
    <div class="container" style="margin-top: none">
        <a class="text-white navbar-brand" href="#">Pay Page</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
        </div>
    </div>
    </nav>

    <div class="container">  
                    // Replace "test" with your own sandbox Business account app client ID 
                    <script src="https://www.paypal.com/sdk/js?client-id=AZtDtDnkvhoqWazzGd5HmmQPu2aHwvYhZE8lK9jpMxy0oTRgQdzfljv4_HwbJAPxByucoF8T0-4TtwI_&currency=USD"></script>
                
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: '300' 
                                }
                                // Can also reference a variable or function 
                            }]
                            });
                        },
                       
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='delete.php';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>
        </div>


    <body>
</html> -->