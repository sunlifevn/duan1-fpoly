<?php 
session_start();
require_once './library/db.php';
$idProduct = $_POST['idProduct'];
if (isset($_SESSION['cart'][$idProduct])) {
	$quanlity = $_SESSION['cart'][$idProduct];
} else {
$quanlity = 1;
}
$_SESSION['cart'][$idProduct] = $quanlity;
 if (!isset($_SESSION['cart'])) {
                  $flag = false;
                } else {
                  foreach ($_SESSION['cart'] as $idProduct => $quanlity) {
                    if(isset($idProduct)){
                    $flag = true;
                    } else {
                    $flag = false;
                    }
                  }
                  
                }
            if ($flag==false) {
              echo '<a href="gio-hang#detailInv" class="cart-total"><i class="fa fa-shopping-cart"></i> <span class="cart-quanlity">0</span></a>';
            } else {
              $cart = $_SESSION['cart'];
               echo '<a href="gio-hang#detailInv" class="cart-total"><i class="fa fa-shopping-cart"></i> <span class="cart-quanlity">' . count($cart) . '</span></a>';
            }
 ?>