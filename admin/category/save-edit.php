<?php 
require_once '../../library/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('location: ' . ADMIN_URL . 'category');
	die();
}
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$slug = trim($_POST['slug']);
$parent_id = $_POST['parent_id'];
$description = $_POST['desc'];


	// kiểm tra tên có bị trùng hay ko
$sql = "select * from categories where cate_name = '$name' and id != $id";
$rs = getQr($sql);

if ($rs != false) {
	header('location: ' . ADMIN_URL . 'category/edit.php?id='.$id.'&errName=Tên danh mục đã tòn tại, vui lòng chọn tên khác');
	die();
}

$sql = "update categories
		set
			cate_name = :name,
			slug = :slug,
			parent_id = :parent_id,
			detail_cate = :description
		where id = :id";
$sta = $pdo->prepare($sql);
$sta->bindParam(':name', $name);
$sta->bindParam(':slug', $slug);
$sta->bindParam(':parent_id', $parent_id);
$sta->bindParam(':description', $description);
$sta->bindParam(':id', $id);
$sta->execute();

header('location: ' . ADMIN_URL . 'category');
die();
?>
