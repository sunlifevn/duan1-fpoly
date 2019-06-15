<?php 
	require_once '../../library/db.php';
	$cateId = $_GET['id'];
	$sql = "select * from products where id = $cateId and page = 1";
	$page = getQr($sql);

	if (!$page) {
		header('location: ' . ADMIN_URL . 'page');
		die();
	}


	$sql = "delete from products where id = $cateId and page = 1";
	getQr($sql);

	header('location: ' . ADMIN_URL . "page");
	die();
 ?>