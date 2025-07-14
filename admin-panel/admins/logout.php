<?php 
session_start();
define("ADMINURL", "http://localhost/dashboard/Projects/Udemi/coffee-blend/admin-panel");
session_unset();
session_destroy();
header("Location:". ADMINURL ."/admins/login-admins.php");
exit();
?>