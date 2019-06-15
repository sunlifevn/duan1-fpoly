<?php 
require_once '../../library/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('location: ' . ADMIN_URL . 'setting');
	die();
}
$logo = trim($_POST['logo']);
$name = trim($_POST['name']);
$info = trim($_POST['info']);
$phone = trim($_POST['phone']);
$hotline = trim($_POST['hotline']);
$map = trim($_POST['map']);
$map = htmlspecialchars($map);
$email1 = trim($_POST['email1']);
$email2 = trim($_POST['email2']);
$address = trim($_POST['address']);
$fb = trim($_POST['fb']);
$tt  = trim($_POST['tt']);
$ins = trim($_POST['ins']);

$sql = "update web_settings set web_name = '$name', web_info = '$info',
		logo = '$logo', phone_number = '$phone', hotline = '$hotline',
		email1 = '$email1', email2 = '$email2', address = '$address', fb_url = '$fb',
		twitter_url = '$tt', instagram_url = '$ins', map_embed = '$map' where id = 1
		 ";
getQr($sql);
header('location: ' . ADMIN_URL . 'setting');
die();
?>
