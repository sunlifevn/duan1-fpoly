<?php 
	require_once '../../library/db.php';

	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: ' . ADMIN_URL . 'partner');
		die();
	}
	$name = trim($_POST['name']);
	$siteUrl = trim($_POST['siteUrl']);
	$image = $_FILES['image'];
	// kiểm tra tên có bị trùng hay ko
	$sql = "select * from partner where name = '$name'";
	$rs = getQr($sql);

	if ($rs != false) {
		header('location: ' . ADMIN_URL . 'partner/add.php?errName=Tên đối tác đã tồn tại, vui lòng chọn tên khác');
		die();
	}

	//lưu file vào thư mục trên server
	//lấy đuôi file
	$path = $image['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	//tạo file mới
	$imageName = "images/partner/" . uniqid() . "." . $ext;

	//Lưu file vào thư mục
	move_uploaded_file($image['tmp_name'], '../../' . $imageName);
	$sql = "insert into partner values (null, '$name', '$imageName', '$siteUrl', null)";
	getQr($sql);
        
	header('location: ' . ADMIN_URL . 'partner?success=true');
	die();

 ?>