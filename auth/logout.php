<?php 
session_start();
define("APIURL", "http://localhost/dashboard/Projects/Udemi/coffee-blend");
session_unset();
session_destroy();
header("Location:". APIURL ."/auth/login.php");
exit();
?>