<?php 
	require_once '../../library/db.php';
	$cateId = $_GET['id'];
	$sql = "select * from categories where id = $cateId";
	$cate = getQr($sql);

	if (!$cate) {
		header('location: ' . ADMIN_URL . 'category');
		die();
	}

	$sql = "delete from products where cate_id = $cateId";
	getQr($sql);
	$sql = "delete from categories where id = $cateId";
	getQr($sql);

	header('location: ' . ADMIN_URL . "category");
	die();
 ?>