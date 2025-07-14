<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');


// delete

$delete= "DELETE FROM orders WHERE id=" . intval($_GET['id']);
$run= $conn->query($delete);
$conn->close();
header("location: ". ADMINURL ."/orders-admins/show-orders.php");



?>