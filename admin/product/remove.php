<?php 
	require_once '../../library/db.php';
	$cateId = $_GET['id'];
	$sql = "select * from products where id = $cateId";
	$product = getQr($sql);

	if (!$product) {
		header('location: ' . ADMIN_URL . 'product');
		die();
	}


	$sql = "delete from products where id = $cateId";
	getQr($sql);

	header('location: ' . ADMIN_URL . "product");
	die();
 ?>