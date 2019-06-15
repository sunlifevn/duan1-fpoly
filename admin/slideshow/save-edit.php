<?php 
require_once '../../library/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('location: ' . ADMIN_URL . 'slideshow');
	die();
}
	$id = trim($_POST['id']);
	$status = $_POST['status'];
	$title = trim($_POST['title']);
	$link = trim($_POST['linkurl']);
	$content = trim($_POST['content']);
	$order = trim($_POST['order']);
	$image = $_FILES['image'];


$sql = "update sliders
		set
			title = :title,
			link_url = :linkurl,
			content = :content,
			status = :status,
			order_number = :order_number
			";
 	if($image['size'] > 0){
	$path = $image['name'];
	$ext = pathinfo($path, PATHINFO_EXTENSION);
	// 2. tao filename moi
	$imageName = "images/slider/" . uniqid() . "." . $ext;
	// 3. luu file vao thu muc
	move_uploaded_file($image['tmp_name'], '../../' . $imageName);
	$sql .= ", image_url = :image";
}
$sql .= " where id = :id";

$sta = $pdo->prepare($sql);
$sta->bindParam(':title', $title);
$sta->bindParam(':linkurl', $link);
$sta->bindParam(':content', $content);
$sta->bindParam(':status', $status);
$sta->bindParam(':order_number', $order);
$sta->bindParam(':id', $id);

if ($image['size'] != 0) {
	$sta->bindParam(':image', $imageName);
}
$sta->execute();
header('location: ' . ADMIN_URL . 'slideshow');
die();
?>
