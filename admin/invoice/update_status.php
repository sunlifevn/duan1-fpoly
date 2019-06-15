<?php
$path = "../";
require_once $path.$path.'library/db.php';
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: ' . ADMIN_URL . 'invoice');
		die();
	}
$id = $_POST['id']; 
$status = $_POST['status'];
$sql = "update invoices set status = '$status' where id = $id";
getQr($sql);
header('location: ' . ADMIN_URL . 'invoice');
die();
?>