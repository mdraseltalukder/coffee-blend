<?php 
 include_once('../includes/header.php');
 include_once('../config/config.php');
 
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


 $delete= "DELETE FROM cart WHERE user_id=" . intval($_SESSION['user']['id']);
$run= $conn->query($delete);

header("location: ". APIURL ."/paypal-payment//success.php");

 


 ?>







