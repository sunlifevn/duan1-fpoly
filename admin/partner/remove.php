<?php 
	require_once '../../library/db.php';
	$brandId = $_GET['id'];
	$sql = "select * from partner where id = $brandId";
	$brand = getQr($sql);

	if (!$brand) {
		header('location: ' . ADMIN_URL . 'partner');
		die();
	}

	
	$sql = "delete from partner where id = $brandId";
	getQr($sql);

	header('location: ' . ADMIN_URL . "partner");
	die();
 ?>