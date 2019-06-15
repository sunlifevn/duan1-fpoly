<?php 
session_start();
$path = "./";
  require_once $path.'../library/db.php';
  if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. SITE_URL);
	die;
}
$id = $_POST['id'];
$fullname = trim($_POST['name']);
$phone = trim($_POST['phone']);
$address = trim($_POST['address']);
$sql = "update users set full_name = '$fullname', phone = '$phone', address = '$address' where id = $id";
getQr($sql);
$_SESSION['login']['full_name'] = $fullname;
$_SESSION['login']['phone'] = $phone;
$_SESSION['login']['address'] = $address;
header('location: index.php?success=true');
die();
 ?>