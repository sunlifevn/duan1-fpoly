<?php 
$path = "./";
  require_once $path.'../library/db.php';
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: ' . SITE_URL);
		die();
	}
$id = $_POST['id'];
$image = $_FILES['image'];
$path = $image['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	//tạo file mới
	$imageName = "images/avatar/" . uniqid() . "." . $ext;
	//Lưu file vào thư mục
	move_uploaded_file($image['tmp_name'], '../' . $imageName);
	$sql = "update users set avatar ='$imageName' where id = $id";
	getQr($sql);
	header('location: ' .SITE_URL . 'user/index.php?success=true');
	die();
 ?>