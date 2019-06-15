<?php 
session_start();
$idProduct = $_GET['id'];
unset($_SESSION['cart'][$idProduct]);
header('location: cart.php#detailInv');
die();
 ?>