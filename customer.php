<?php
session_start();
require_once './library/db.php'; 

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$email2 = trim($_POST['email2']);
$address = trim($_POST['address']);
$note = trim($_POST['note']);
$created_date = date('d-m-Y H:i:s');
$partten = "/^[A-Za-z0-9_\.]{4,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";


if (empty($name) || empty($phone) || empty($email2) || empty($address)) {
	echo '* Không được để trống';
	die();
}
if(!preg_match($partten ,$email2, $matchs)){
   echo '* Mail bạn vừa nhập không đúng định dạng';
   die();
}
if(!is_numeric($phone)){
   echo '* Số điện thoại phải là số';
   die();
}
$sql = "select max(id) from invoices";
$maxId = getQr($sql);
$id = $maxId['max(id)']+1;
if (isset($_SESSION['login'])) {
	$userId = $_SESSION['login']['id'];
	$sql = "insert into invoices values ('$id', '$name', '$phone', '$email', '$address', '$total', '$note', '$created_date', '0', '$userId')";
	getQr($sql);
}
$sql = "insert into invoices values ('$id', '$name', '$phone', '$email', '$address', '$total', '$note', '$created_date', '0', '0')";
getQr($sql);
foreach ($_SESSION['cart'] as $idProduct => $quanlity) {
	$sql2 = "select price from products where id= $idProduct";
	$pr = getQr($sql2);
	$pr2 = $pr['price'];
	$sql = "insert into order_details values ('$id', '$idProduct', '$quanlity','$pr2')";
	getQr($sql);
}

unset($_SESSION['cart']);
 ?>
 <script>
 	window.location.href="<?php SITE_URL ?>index.php?success=true";
 </script>