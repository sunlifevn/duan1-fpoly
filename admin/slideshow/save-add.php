<?php 
	require_once '../../library/db.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: ' . ADMIN_URL . 'slideshow');
		die();
	}
	$status = $_POST['status'];
	$title = trim($_POST['title']);
	$link = trim($_POST['linkurl']);
	$content = trim($_POST['content']);
	$order = trim($_POST['order']);
	$image = $_FILES['image'];

	//lưu file vào thư mục trên server
	//lấy đuôi file
	$path = $image['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	//tạo file mới
	$imageName = "images/slider/" . uniqid() . "." . $ext;

	//Lưu file vào thư mục
	move_uploaded_file($image['tmp_name'], '../../' . $imageName);
	$sql = "insert into sliders values (null, '$imageName', '$title', '$link', '$content', $order, null, $status)";
	getQr($sql);
        
	header('location: ' . ADMIN_URL . 'slideshow?success=true');
	die();

 ?>