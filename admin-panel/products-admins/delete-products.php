<?php 
include_once('../layouts/header.php');
include_once('../../config/config.php');


$select= "SELECT * FROM products WHERE id=" . intval($_GET['id']);
$result = $conn->query($select);
$products = $result->fetch_assoc();

unlink("images/" . $products['image']);

$deleteQuery= "DELETE FROM products WHERE id=" . intval($_GET['id']);
$run= $conn->query($deleteQuery);
header("location: ". ADMINURL ."/products-admins/show-products.php");




?>