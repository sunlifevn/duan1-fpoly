<?php
	$path = "./";
  require_once $path.'../library/db.php';
    $id = $_POST['id']; 
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
$sql = "select password from users where id = $id";
$password = getQr($sql);

if(!$password || password_verify($pass, $password['password']) == false){
	echo "<i>Mật khẩu cũ không chính xác!</i>";
	die;
} else if(empty($pass2)) {
	echo "<i>Bạn chưa nhập mật khẩu mới</i>";
	die();
} else {
	$prPass = password_hash($pass2, PASSWORD_BCRYPT);
	$sql = "update users set password = '$prPass' where id = $id";
	getQr($sql);
	$_SESSION['login']['password'] = $prPass;
	echo "<span class='text-success'><i>Thay đổi mật khẩu thành công!</i></span>";	
}



 ?>