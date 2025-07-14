<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');


// delete

$delete= "DELETE FROM booking WHERE id=" . intval($_GET['id']);
$run= $conn->query($delete);
$conn->close();
header("location:show-bookings.php");



?>