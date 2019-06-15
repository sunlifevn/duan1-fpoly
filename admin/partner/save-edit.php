<?php 
require_once '../../library/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('location: ' . ADMIN_URL . 'partner');
	die();
}
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$siteUrl = trim($_POST['siteUrl']);
$image = $_FILES['image'];
	// kiểm tra tên có bị trùng hay ko
$sql = "select * from partner where name = '$name'and id != $id";
$rs = getQr($sql);

if ($rs != false) {
	header('location: ' . ADMIN_URL . 'partner/edit.php?id='.$id.'&errName=Tên đối tác đã tồn tại, vui lòng chọn tên khác');
	die();
}

$sql = "update partner
		set
			name = :name,
			site_url = :site_url
			";
 	if($image['size'] > 0){
	$path = $image['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	// 2. tao filename moi
	$imageName = "images/partner/" . uniqid() . "." . $ext;
	// 3. luu file vao thu muc
	move_uploaded_file($image['tmp_name'], '../../' . $imageName);
	$sql .= ", image_url = :image";
}
$sql .= " where id = :id";

$sta = $pdo->prepare($sql);
$sta->bindParam(':name', $name);
$sta->bindParam(':site_url', $siteUrl);
$sta->bindParam(':id', $id);

if ($image['size'] != 0) {
	$sta->bindParam(':image', $imageName);
}
$sta->execute();
header('location: ' . ADMIN_URL . 'partner');
die();
?>
