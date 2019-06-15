<?php 
require_once './library/db.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. SITE_URL);
	die;
}
$email = $_POST['email'];
$password = $_POST['password'];
$prPass = password_hash($password, PASSWORD_BCRYPT);
$fullname = $_POST['fullname'];
$role = 1;
$partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
if (empty($email) || empty($password) || empty($fullname)) {
	echo '<span class="text-danger">Không được để trống</span>';
	die();
}
if(!preg_match($partten ,$email, $matchs)){
   echo  "Mail bạn vừa nhập không đúng định dạng ";
   die();
}

$sql = "select * from users where email = '$email'";
$rs = getQr($sql);
if($rs != false){
echo '<span class="text-danger">Email đã tồn tại!</span>';
die();
}
$sql = "insert into users values (null, '$email', '$prPass', null, null, null, '$fullname', '1')
			";
getQr($sql);
 	echo '<span class="text-success">Bạn đã tạo tài khoản thành công, xin mời đăng nhập!</span>';
	die();



 ?>

