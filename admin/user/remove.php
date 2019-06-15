<?php 
	require_once '../../library/db.php';
	$userId = $_GET['id'];
	$sql = "select * from users where id = $userId";
	$user = getQr($sql);

	if (!$user) {
		header('location: ' . ADMIN_URL . 'user');
		die();
	}

	$sql = "delete from users where id = $userId";
	getQr($sql);

	header('location: ' . ADMIN_URL . "user");
	die();
 ?>