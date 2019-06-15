<?php 
require_once '../../library/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('location: ' . ADMIN_URL . 'page');
	die();
}
$name = trim($_POST['name']);
$slug = trim($_POST['slug']);
$image = $_FILES['image'];
$page = 1;
$desc = trim($_POST['desc']);
$created_date = date('d-m-Y H:i:s');
$view = 0;
$status = 1;
	// kiểm tra tên có bị trùng hay ko
$sql = "select * from products where product_name = '$name'";
	$rs = getQr($sql);

	if ($rs != false) {
		header('location: ' . ADMIN_URL . 'product/add.php?errName=Tên tiêu đề đã tồn tại, vui lòng chọn tên khác');
		die();
	}
	//lưu file vào thư mục trên server
	//lấy đuôi file
	$path = $image['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	//tạo file mới
	$imageName = "images/pages/" . uniqid() . "." . $ext;
	//Lưu file vào thư mục
	move_uploaded_file($image['tmp_name'], '../../' . $imageName);

$sql = "insert into products (product_name, slug, thumbnail, detail_info, created_date, views, page, status
			) values (?,?,?,?,?,?,?,?)";

		$param = array($name, $slug, $imageName, $desc, $created_date, $view, $page, $status);
	$sta = $pdo->prepare($sql);
	$sta->execute($param);
        
	header('location: ' . ADMIN_URL . 'page?success=true');
	die();
?>
