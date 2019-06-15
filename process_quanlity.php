<?php 
	session_start();
	// $i= 0;
	// $dem = count($_SESSION['cart']);
		$newQuanlity = $_POST['newQuanlity'];
	$idProduct = $_POST['idProduct'];
	$price = $_POST['price'];
	$_SESSION['cart'][$idProduct] = $newQuanlity;
	$totals = $newQuanlity*$price;
	echo number_format($totals);

	

 ?>