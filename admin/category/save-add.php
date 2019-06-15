<?php 
require_once '../../library/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('location: ' . ADMIN_URL . 'category');
	die();
}
$name = trim($_POST['name']);
$slug = trim($_POST['slug']);
//$parent_id = $_POST['parent_id'];
$desc = trim($_POST['desc']);

	// kiểm tra tên có bị trùng hay ko
$sql = "select * from categories where cate_name = '$name'";
$rs = getQr($sql);

if ($rs != false) {
		header('location: ' . ADMIN_URL . 'category/add.php?errName=Tên danh mục đã tồn tại, vui lòng chọn tên khác');
	die();
}

$sql = "insert into categories values (null, '$name', '$slug', '$parent_id', '$desc')";
getQr($sql);

header('location: ' . ADMIN_URL . 'category?success=true');
die();
?>
